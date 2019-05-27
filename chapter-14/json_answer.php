<?php
$arr = json_decode($_POST['json'], true);
$name = trim(implode(" ", $arr));

$result = "Здравствуйте";

if (!empty($name)) {
    $result .= ", $name";
}

$result .= "!";

echo htmlspecialchars($result);