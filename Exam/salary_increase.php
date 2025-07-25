<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "company";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update most recent employee's salary by 17.5%
$sql_recent = "UPDATE employee SET salary = salary * 1.175 WHERE hire_date = (SELECT MAX(hire_date) FROM employee)";
$conn->query($sql_recent);

// Update most senior employee's salary by 21.5%
$sql_senior = "UPDATE employee SET salary = salary * 1.215 WHERE hire_date = (SELECT MIN(hire_date) FROM employee)";
$conn->query($sql_senior);

// Display the updated table
$sql_display = "SELECT * FROM employee ORDER BY hire_date";
$result = $conn->query($sql_display);

if ($result->num_rows > 0) {
    echo "<h2>Updated Employee Table</h2>";
    echo "<table border='1' cellpadding='8'>";
    echo "<tr><th>Email</th><th>Phone Number</th><th>Hire Date</th><th>Job ID</th><th>Salary</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["phone_number"] . "</td>";
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
