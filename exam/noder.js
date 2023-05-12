// Import required modules
const express = require('express');
const mysql = require('mysql');


// Create a MySQL connection
const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'examacc',
});

// Connect to the database
connection.connect();

// Create an Express.js app
const app = express();

// Define a route to fetch data and generate HTML table
app.get('/data', (req, res) => {
  // Fetch data from the database
  connection.query('SELECT * FROM applicants', (error, results) => {
    if (error) throw error;

    // Generate the HTML table
    let html = '<table id="example" class="myTable display nowrap" style="width:100%">';
    html += '<thead><tr><th>ID</th><th>Name of Applicant</th><th>Contact No.</th><th>Address</th><th>Applying Position</th><th>Applied Date</th><th>Action</th></tr></thead>';
    results.forEach((row) => {
      html += `<tr><td>${row.id}</td><td>${row.name}</td><td>${row.contactno}</td><td>${row.address}</td><td>${row.applying_position}</td>`;

      const dateFromDatabase = new Date(`${row.applied_date}`);
      const formattedDate = dateFromDatabase.toLocaleDateString();`${row.applied_date}</td></tr>`;

      html += `<td>${formattedDate}</td><td><button class="btn btn-success m-1" onclick="window.location.href='update.php?id=${row.id}'">UPDATE</button><button class="btn btn-danger m-1" onclick="window.location.href='actions/delete.php?id=${row.id}'">REMOVE</button></td></tr>`;
    });
    html += '</table>';

    // Send the HTML table as a response
    res.send(html);
  });
});

// Start the server
app.listen(3000, () => {
  console.log('Server is running on port 3000');
});


