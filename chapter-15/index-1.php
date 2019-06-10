<?php
$ourFile = fopen("files/largetextfile.txt", "r");
for ($i = 0; $s = fgets($ourFile, 10000); $i++) {
    if (mt_rand(0, $i) == 0) $line = $s;
}

echo $line;
echo "<br />";
echo "Последовательность случайных чисел <br/>";
mt_srand(123);
for ($i = 0; $i < 5; $i++) {
    echo mt_rand() . " ";
}

echo "<br />";
mt_srand(123);
for ($i = 0; $i < 5; $i++) {
    echo mt_rand() . " ";
}
echo "<br />";

// Начиная с PHP 7, доступна еще одна реализация генератора псевдослучайных чисел с хорошей равномерностью
echo random_int(-100, 0);
echo "<br />";
echo random_int(0, 100);