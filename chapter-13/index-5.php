<?php
// Функция strtr()
// Примечание: данная функция не совместима с UTF-8 и работает только с однобайтными кодировками. В расширении mbstring аналог для нее не предусмотрен.
// Транслитерация строк
function transliterateNoUTF8($st) {
    $st = strtr($st, 
      "абвгдежзийклмнопрстуфыэАБВГДЕЖЗИЙКЛМНОПРСТУФЫЭ",
      "abvgdegziyklmnoprstufyeABVGDEGZIYKLMNOPRSTUFYE"
    );

    $st = strtr($st, array(
        'ё'=>"yo",    'х'=>"h",  'ц'=>"ts",  'ч'=>"ch", 'ш'=>"sh",
        'щ'=>"shch",  'ъ'=>'',   'ь'=>'',    'ю'=>"yu", 'я'=>"ya",
        'Ё'=>"Yo",    'Х'=>"H",  'Ц'=>"Ts",  'Ч'=>"Ch", 'Ш'=>"Sh",
        'Щ'=>"Shch",  'Ъ'=>'',   'Ь'=>'',    'Ю'=>"Yu", 'Я'=>"Ya",
      ));

      return $st;
}

echo transliterateNoUTF8("В лесу родилась ёлочка");
echo "<br/>";echo "<br/>";
function transliterateForUTF8($st) {
    $pattern = ['а', 'б', 'в', 'г', 'д', 'е', 'ё',
                'ж', 'з', 'и', 'й', 'к', 'л', 'м',
                'н', 'о', 'п', 'р', 'с', 'т', 'у',
                'ф', 'х', 'ч', 'ц', 'ш', 'щ', 'ъ',
                'ы', 'ь', 'э', 'ю', 'я',
                'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё',
                'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М',
                'Н', 'О', 'П', 'Р', 'С', 'Т', 'У',
                'Ф', 'Х', 'Ч', 'Ц', 'Ш', 'Щ', 'Ъ',
                'Ы', 'Ь', 'Э', 'Ю', 'Я'];
    $replace = ['a', 'b', 'v', 'g', 'd', 'e', 'yo',
                'zh', 'z', 'i', 'y', 'k', 'l', 'm',
                'n', 'o', 'p', 'r', 's', 't', 'u',
                'f', 'h', 'ch', 'ts', 'sh', 'shch', '\'',
                'y', '', 'e', 'yu', 'ya',
                'A', 'B', 'V', 'G', 'D', 'E', 'Yo',
                'Zh', 'Z', 'I', 'Y', 'K', 'L', 'M',
                'N', 'O', 'P', 'R', 'S', 'T', 'U',
                'F', 'H', 'CH', 'Ts', 'Sh', 'Shch', '\'',
                'Y', '', 'E', 'Yu', 'Ya'];
    return str_replace($pattern, $replace, $st);
  }
echo "<br/>";echo "<br/>";
echo transliterateForUTF8("В лесу родилась ёлочка");