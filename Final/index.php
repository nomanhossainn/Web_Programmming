<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="text">
        <button>Send</button>
    </form>
    <?php
    $x = $_POST['text'];

    for ($i = 1; $i <= 10; $i++) {
        echo "$i x $x =" . $i * $x . "<br>";
    }
    ?>

</body>

</html>
