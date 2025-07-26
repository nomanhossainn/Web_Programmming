<!DOCTYPE html>
<html>

<head>
    <title>Electricity Bill Calculator</title>
</head>

<body>
    <h2>Electricity Bill Calculator</h2>
    <form action="" method="post">
        <label>Location:</label>
        <select name="location" required>
            <option value="Dhaka">Dhaka</option>
            <option value="Chittagong">Chittagong</option>
        </select><br><br>

        <label>Area:</label>
        <input type="radio" name="area" value="Urban" required> Urban
        <input type="radio" name="area" value="Rural"> Rural<br><br>

        <label>Unit Consumed:</label>
        <input type="number" name="unit" required><br><br>

        <input type="submit" value="Calculate Bill">
    </form>

    <?php
    $servername = "localhost";
    $username = "root"; // your DB username
    $password = "";     // your DB password
    $dbname = "electricity_bill";

    // Get input from form
    $location = $_POST['location'];
    $area = $_POST['area'];
    $unit = $_POST['unit'];

    // Connect to DB
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get rate info
    $sql = "SELECT * FROM bill_info WHERE location='$location' AND area='$area'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $rate_0_75 = $row['rate_0_75'];
        $rate_76_200 = $row['rate_76_200'];
        $rate_201_above = $row['rate_201_above'];

        // Calculate bill
        $bill = 0;
        if ($unit <= 75) {
            $bill = $unit * $rate_0_75;
        } elseif ($unit <= 200) {
            $bill = (75 * $rate_0_75) + (($unit - 75) * $rate_76_200);
        } else {
            $bill = (75 * $rate_0_75) + (125 * $rate_76_200) + (($unit - 200) * $rate_201_above);
        }

        // Apply tax
        if ($location == "Dhaka") {
            $tax = 0.20;
        } else {
            $tax = 0.15;
        }

        $total = $bill + ($bill * $tax);

        // Show result
        echo "<h2>Your Bill</h2>";
        echo "Your location: $location<br>";
        echo "Your area: $area<br>";
        echo "Unit consumed: $unit<br>";
        echo "<strong>Total bill: " . number_format($total, 2) . " BDT</strong>";
    } else {
        echo "No rate information found for the given location and area.";
    }

    $conn->close();
    ?>

</body>

</html>