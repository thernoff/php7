<?php
/**
 * При штатной работе с PHAR-архивом не требуется извлечение его содержимого с последующим сохранением на жестком диске.
 * Однако в целях изучения содержимого стороннего PHAR-архива такая возможность может быть полезна.
 * public function Phar::extractTo(
 *    string $pathto [,
 *    string|array $files [,
 *      bool $overwrite = false]
 *    ]
 * );
 */

 ## Извлечение содержимого PHAR-архива
 try {
     $phar = new Phar('autopager.phar');
     $phar->extractTo('extract');
 } catch (Exception $e) {
     echo "Невозможно открыть PHAR-архив: ", $e;
 }