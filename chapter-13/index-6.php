<?php
// Преобразование символов
$userData = "a b 12";
echo "<a href='/script.php?param=". urlencode($userData) . "'>Link</a>" . "<br>";

// Использование htmlspecialchars
$example = <<<EXAMPLE
    <?php
        echo "Hello, world!";
    ?>
EXAMPLE;

echo htmlspecialchars($example);
echo "<br/>";

// addslashes()
$str = addslashes("I'm Jonh. Slash - \ ");
echo $str;
echo "<br/>";