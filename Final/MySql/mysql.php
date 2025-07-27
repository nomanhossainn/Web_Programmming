<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM student";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border= 1>";
    echo "<th>SL</th><th>ID</th><th>Name</th><th>Dept</th><th>Age</th><th>CGPA</th>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>$row[sl]</td><td>$row[st_id]</td><td>$row[st_name]</td><td>$row[st_dept]</td><td>$row[st_age]</td><td>$row[st_cgpa]</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
