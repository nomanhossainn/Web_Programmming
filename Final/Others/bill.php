<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "electricity_bill";

$l = $_POST['loc'];
$a = $_POST['area'];
$u = $_POST['unit'];

$conn = new mysqli(
    $servername,
    $username,
    $password,
    $dbname
);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM bill_info";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $rate1 = $row['rate_0_75'];
    $rate2 = $row['rate_76_200'];
    $rate3 = $row['rate_201_above'];

    $bill = 0;
    if ($l == "Dhaka" && $a == "Urban") {
        if ($u <= 75) {
            $bill = $u * 4.19;
        } else if ($u <= 200) {
            $bill = (75 * 4.19) + (($u - 75) * 5.72);
        } else if ($u >= 201) {
            $bill = (75 * 4.19) + (125 * 5.72) + (($u - 200) * 6.00);
        }
    } else if ($l == "Dhaka" && $a == "Rural") {
        if ($u <= 75) {
            $bill = $u * 3.19;
        } else if ($u <= 200) {
            $bill = (75 * 3.19) + (($u - 75) * 4.72);
        } else if ($u >= 201) {
            $bill = (75 * 3.19) + (125 * 4.72) + (($u - 200) * 5.00);
        }
    } else if ($l == "Chittagong" && $a == "Urban") {
        if ($u <= 75) {
            $bill = $u * 3.50;
        } else if ($u <= 200) {
            $bill = (75 * 3.50) + (($u - 75) * 4.80);
        } else if ($u >= 201) {
            $bill = (75 * 3.50) + (125 * 4.80) + (($u - 200) * 5.23);
        }
    } else if ($l == "Chittagong" && $a == "Rural") {
        if ($u <= 75) {
            $bill = $u * 2.50;
        } else if ($u <= 200) {
            $bill = (75 * 2.50) + (($u - 75) * 3.80);
        } else if ($u >= 201) {
            $bill = (75 * 2.50) + (125 * 3.80) + (($u - 200) * 4.23);
        }
    }


    if ($l == "Dhaka") {
        $bill += $bill * 0.20;
    } else if ($l == "Chittagong") {
        $bill += $bill * 0.15;
    }
    echo "Your Location: " . $l . "<br>";
    echo "Your Area: " . $a . "<br>";
    echo "Unit consumed: " . $u . "<br>";
    echo "Total Bill: " . $bill . "<br>";
}

