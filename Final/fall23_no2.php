<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Multiplication Table</title>
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
        Enter the value of n:
        <input type="number" name="n" min="1" required>
        <button>Generate Table</button>
    </form>

    <br>

    <?php
    //if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['n'])) {
        //$num = intval($_POST['n']);
        $num = $_POST['n'];
        echo "<table>";
        for ($row = 1; $row <= $num; $row++) {
            echo "<tr>";
            for ($col = 1; $col <= $num; $col++) {
                echo "<td>" . ($row * $col) . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    //}
    ?>
</body>

</html>