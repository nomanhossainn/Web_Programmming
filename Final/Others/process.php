<?php
$x = $_POST['text'];

for ($i = 1; $i <= 10; $i++) {
    echo "$i x $x =" . $i * $x . "<br>";
}
