<?php
namespace PHP7;

function strlen($str) {
  echo "Это PHP7\strlen" . "<br/>";
  return count(str_split($str));
}

// Это PHP7\strlen
echo strlen("Hello world!") . "<br/>";
// Это стандартная функция strlen()
echo "Это стандартная функция strlen()" . "<br/>";
echo \strlen("Hello world!") . "<br/>";