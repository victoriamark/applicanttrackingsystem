<?php
require_once __DIR__ . '/vendor/autoload.php'; // Include mpdf library
require_once 'database/config.php';

// Fetch data from the database
$sql = "SELECT * FROM applicants";
$result = $conn->query($sql);

// Prepare the data array
$data = array();

// Check if there are results
if ($result->num_rows > 0) {
    // Loop through the results and store them in the data array
    while ($row = $result->fetch_assoc()) {
        $data[] = array_values($row);
    }
}

// Close the database connection
$conn->close();

// Generate HTML table
$html = '
<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
  background-color: #f7f7f7;
  font-family: Arial, sans-serif;
}

table th, table td {
  padding: 12px;
  text-align: left;
}

table th {
  background-color: #333;
  color: #fff;
}

table td {
  background-color: #fff;
  color: #333;
}

table tr:nth-child(even) td {
  background-color: #f2f2f2;
}

table tr:hover td {
  background-color: #e0e0e0;
}

table th, table td {
  border-bottom: 1px solid #ccc;
}

</style>
</head>
<body>
<h2>List of Applicants</h2>
<p><strong>DATE: </strong>'.date('m-d-Y').'</p>
<table>';
$html .= '<thead>
			<tr>
				<th>ID</th>
				<th>APPLICANT NAME</th>
				<th>CONTACT NO.</th>
				<th>ADDRESS</th>
				<th>APPLYING POSITION</th>
				<th>APPLIED DATE</th>
			</tr>
		  </thead>';

$html .= '<tbody>';
for ($i = 0; $i < count($data); $i++) {
    $html .= '<tr>';
    foreach ($data[$i] as $cell) {
        $html .= '<td>' . $cell . '</td>';
    }
    $html .= '</tr>';
}
$html .= '</tbody>';

$html .= '</table>';

$mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);

// Write HTML content to PDF
$mpdf->WriteHTML($html);

// Output the PDF as a file or show in browser
$mpdf->Output('backup-'.date('mdY').'.pdf', 'D');
?>
