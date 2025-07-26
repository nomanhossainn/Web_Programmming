<?php

//Question: Show the table in php Update the table. 
//Decrease salary by 10% where salary is greater than 10000, 
//increase salary by 10% where salary is less than or equal to 10000.

$servername = "localhost";
$username = "root"; // Change this if necessary
$password = "";     // Change this if necessary
$dbname = "company";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Decrease salary by 10% where salary > 10000
$sql_decrease = "UPDATE employee SET salary = salary * 0.90 WHERE salary > 10000";
$conn->query($sql_decrease);

// Increase salary by 10% where salary <= 10000
$sql_increase = "UPDATE employee SET salary = salary * 1.10 WHERE salary <= 10000";
$conn->query($sql_increase);

// Fetch updated table
$sql_display = "SELECT * FROM employee ORDER BY hire_date";
$result = $conn->query($sql_display);

// Display results
if ($result->num_rows > 0) {
    echo "<h2>Updated Employee Table (After 10% Salary Adjustment)</h2>";
    echo "<table border='1' cellpadding='8'>";
    echo "<tr><th>Email</th><th>Phone Number</th><th>Hire Date</th><th>Job ID</th><th>Salary</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["phone"] . "</td>";
        echo "<td>" . $row["hire_date"] . "</td>";
        echo "<td>" . $row["job_id"] . "</td>";
        echo "<td>" . number_format($row["salary"], 2) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}

$conn->close();
