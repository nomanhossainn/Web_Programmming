<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        Enter the number of pineapple: <input type="text" name="pineapple"><br>
        Home Delivery: <select name="delivery">
            <option value="yes">Yes</option>
            <option value="no">NO</option>
        </select><br>
        Tip: <input type="text" name="tip"><br>
        Locatio: <select name="location"><br>
            <option value="dhk">Dhaka</option>
            <option value="ctg">Chittgong</option>
        </select><br>
        <button>Submit</button>
    </form>
    <?php
    $p = $_POST['pineapple'];
    $d = $_POST['delivery'];
    $t = $_POST['tip'];
    $loc = $_POST['location'];


    //$x = 12.5 * $p;
    if ($p <= 9 && $p >= 1) {
        $x = $p * 12.5 * 0.95;
    } else if ($p >= 10 && $p <= 19) {
        $x = $p * 12.5 * 0.90;
    } else if ($p >= 20) {
        $x = $p * 12.5 * 0.85;
    }
    if ($d == "yes") {
        $x = $x + 40;
    }
    $x = $x + $t;
    if ($loc == "dhk") {
        $x = $x * 1.20;
    } else if ($loc == "ctg") {
        $x = $x * 1.15;
    }
    echo "Total amount: " . $x . " Taka";
    ?>

</body>

</html>