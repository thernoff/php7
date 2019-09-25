<?php
/**
 * Отправка писем со встроенными изображениями
 * При отправки писем в HTML-формате часто возникает задача отправки дополнительных изображений, которые встраивались в HTML-код, однако не прикреплялись бы
 * в виде вложения.
 */

## Отправка встроенных изображений
function htmlimgmail($mail_to, $thema, $html, $path) {
  $EOL = "\n";
  $boundary = "--" . md5(uniqid(time()));
  $headers = "MIME-Version: 1.0;$EOL";
  $headers .= "From: somebody@local.local$EOL";
  $headers .= "Content-Type: multipart/related; " . "boundary=\"$boundary\"$EOL";

  $multipart = "--{$boundary}$EOL";
  $multipart .= "Content-Type: text/html; charset=koi8-r$EOL";
  $multipart .= "Content-Transfer-Encoding: 8bit$EOL";
  $multipart .= $EOL;

  if ($EOL == "\n") {
    $multipart .= str_replace("\r\n", $EOL, $html);
  }
  $multipart .= $EOL;

  if (!empty($path)) {
    for ($i = 0; $i < count($path); $i++) {
      $file = file_get_contents($path[$i]);
      $name = basename($path[$i]);
      $multipart .= "$EOL--$boundary$EOL";
      $multipart .= "Content-Type: image/jpeg; name=\"$name\"$EOL";
      $multipart .= "Content-Transfer-Encoding: base64$EOL";
      $multipart .= "Content-ID: <" . md5($name) . ">$EOL";
      $multipart .= $EOL;
      $multipart .= chunk_split(base64_encode($file), 76, $EOL);
      $multipart .= "$EOL--$boundary--$EOL";

      if (!is_array($mail_to)) {
        // Письмо отправляется одному адресату
        if (!mail($mail_to, $thema, $multipart, $headers)) {
          return false;
        } else {
          return true;
        }
        exit;
      } else {
        // Письмо отправляется на несколько адресов
        foreach ($mail_to as $mail) {
          mail($mail, $thema, $multipart, $headers);
        }
      }
    }
  }
}

## Пример использования функции htmlimgmail()
$pictures = ["s_001.jpg", "s_002.jpg"];
$mail_to = "somebody@local.local";
$thm = "Тема сообщений";
// Из HTML-кода ссылаться на встроенные изображения можно при помощи префикса cid, после которого следует уникальный хэш изображения,
// задаваемый в почтовом заголовке Content-ID. Данный хэш вычисляется из названия файла при помощи функции md5().
$html = "<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">"
        . "<html><head><title>Почтовая рассылка</title>"
        . "</head><body><img src='cid:'" . md5($pictures[0]) . "' border='0'>Тело сообщения<br/><br/>"
        ."<img src='cid:" . md5($pictures[1]) ."' border='0'></body></html>";

if (htmlimgmail($mail_to, $thm, $html, $pictures)) {
  echo "Успех " . date("d.m.Y H:i:");
} else {
  echo "Не отправлено";
}