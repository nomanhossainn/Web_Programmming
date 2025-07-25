<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
            padding: 5px;
        }

        input[type=number] {
            width: 60px;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        Enter the value of n:<input type="text" name="n">
        <button id="btn">Generate Table</button>
    </form><br><br>

    <?php
    $num = $_POST['n'];
    echo "<table border='1'>";
    for ($row = 1; $row <= $num; $row++) {
        echo "<tr>";
        for ($j = 1; $j <= $num; $j++) {
            echo "<td>" . ($row * $j) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>

</html>