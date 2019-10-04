<?php
/*
  Пользовательская фильтрация данных
  Функции filter_var() и filter_var_array() допускают создание собственных механизмов проверки. В качестве фильтра следует использовать
  FILTER_CALLBACK. В параметрах options следует передать имя функции, которая будет выполнять фильтрацию.
*/

## Пользовательская фильтрация данных
function filterTags($value) {
  return strip_tags($value);
}

$str = <<<MARKER
<h1>Заголовок</h1>
<p>Первый параграф, посвященный "проверке"</p>
MARKER;

echo "<pre>";
echo filter_var($str, FILTER_CALLBACK, ['options' => 'filterTags']);
echo "</pre>";

// вместо имени функции, можно использовать анонимную функцию
echo "<pre>";
echo filter_var($str, FILTER_CALLBACK,
['options' => function ($value) {
  return strip_tags($value);
}]);
echo "</pre>";