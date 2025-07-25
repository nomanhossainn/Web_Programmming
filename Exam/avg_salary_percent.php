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

// Calculate total salary
$sql_total = "SELECT SUM(salary) AS total_salary FROM employee";
$result_total = $conn->query($sql_total);
$row_total = $result_total->fetch_assoc();
$total_salary = $row_total['total_salary'];

// Fetch all employee data
$sql_display = "SELECT * FROM employee ORDER BY hire_date";
$result = $conn->query($sql_display);



if ($result->num_rows > 0) {
    echo "<h2>Employee Salary Percentage Table</h2>";
    echo "<table border='1' cellpadding='8'>";
    echo "<tr><th>Email</th><th>Phone Number</th><th>Hire Date</th><th>Job ID</th><th>Percentage</th></tr>";

    while ($row = $result->fetch_assoc()) {
        $percentage = ($row["salary"] / $total_salary) * 100;
        echo "<tr>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["phone_number"] . "</td>";
        echo "<td>" . $row["hire_date"] . "</td>";
        echo "<td>" . $row["job_id"] . "</td>";
        echo "<td>" . number_format($percentage, 2) . "%</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}

$conn->close();
