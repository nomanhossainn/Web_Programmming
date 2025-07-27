<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "company";

    $con = mysqli_connect("localhost", "root", "", "company");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // 2. Update Salaries

    // a. Most recent employee (latest hire date)
    mysqli_query($con, "
        UPDATE employee
        SET SALARY = SALARY + (SALARY * 17.5 / 100)
        WHERE HIRE_DATE = (SELECT MAX(HIRE_DATE) FROM employee)
    ");

    // b. Most senior employee (earliest hire date)
    mysqli_query($con, "
        UPDATE employee
        SET SALARY = SALARY + (SALARY * 21.5 / 100)
        WHERE HIRE_DATE = (SELECT MIN(HIRE_DATE) FROM employee)
    ");

    // c. Decrease 10% where salary > 10000
    mysqli_query($con, "
        UPDATE employee
        SET SALARY = SALARY - (SALARY * 10 / 100)
        WHERE SALARY > 10000
    ");

    // d. Increase 10% where salary <= 10000
    mysqli_query($con, "
        UPDATE employee
        SET SALARY = SALARY + (SALARY * 10 / 100)
        WHERE SALARY <= 10000
    ");
    // 3. Show Percentage Table
    $result = mysqli_query($con, "SELECT SUM(SALARY) AS total FROM employee");
    $row = mysqli_fetch_assoc($result);
    $totalSalary = $row['total'];

    // Get employee data
    $result = mysqli_query($con, "SELECT EMAIL, SALARY FROM employee");

    // Display HTML table
    echo "<h2>Employee Salary Percentages</h2>";
    echo "<table border='1' cellpadding='10'>
    <tr>
        <th>Email</th>
        <th>Percentage (%)</th>
    </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        $percentage = ($row['SALARY'] / $totalSalary) * 100;
        echo "<tr>
                <td>{$row['EMAIL']}</td>
                <td>" . round($percentage, 2) . "%</td>
            </tr>";
    }

    echo "</table>";

    mysqli_close($con);
    ?>

</body>

</html>