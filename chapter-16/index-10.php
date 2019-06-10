<?php
$arr = parse_ini_file("./files/test.ini", true, INI_SCANNER_RAW);
echo "<pre>";
print_r($arr);
echo "</pre>";

echo $arr['second_section']['path'];