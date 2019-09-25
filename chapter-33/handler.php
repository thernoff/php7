<?php
## Обработчик HTML-формы
if (empty($_POST["mail_to"])) exit("Введите адрес получателя");
// Проверяем правильность заполнения с помощью регулярного выражения
$pattern = "/^[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,6}$/i";
if (!preg_match($pattern, $_POST["mail_to"])) {
  exit("Введите адрес в виде somebody@server.com");
}

$_POST['mail_to'] = htmlspecialchars( stripslashes($_POST['mail_to']) );
$_POST['mail_subject'] = htmlspecialchars( stripslashes($_POST['mail_subject']) );
$_POST['mail_msg'] = htmlspecialchars( stripslashes($_POST['mail_msg']) );
$picture = "";

// Если поле вложения не пустое, то закачиваем его на сервер
if (!empty($_FILES['mail_file']['tmp_name'])) {
  // Загружаем файл
  $path = $_FILES['mail_file']['name'];
  if (copy($_FILES['mail_file']['tmp_name'], $path)) {
    $picture = $path;
  }
}

$thm = $_POST['mail_subject'];
$msg = $_POST['mail_msg'];
$mail_to = $_POST['mail_to'];

// Отправляем почтовое сообщение
if (empty($picture)) {
  mail($mail_to, $thm, $msg);
} else {
  send_mail($mail_to, $thm, $msg, $picture);
}

// Вспомогательная функция для отправки почтового сообщения с вложением
function send_mail($to, $thm, $html, $path) {
  $fp = fopen($path, "r");
  if (!$fp) {
    print "Файл не может быть прочитан";
    exit();
  }

  $file = fread($fp, filesize($path));
  fclose($fp);

  $headers = '';
  $multipart = '';

  $boundary = "--" . md5(uniqid(time())); // генерируем разделитель
  /**
   * Поле версии MIME (MIME-Version)
   * Поле версии указывается в заголовке почтового сообщения и позволяет определить программе рассылки почты, что сообщение подготовлено в стандарте MIME.
   */
  $headers .= "MIME-Version: 1.0\n";
  /**
   * Назначение поля Content-Type - наиболее полное описание данных, содержащихся в теле, с тем, чтобы почтовый агент (программа) получателя могла выбрать
   * соответствующий механизм для их обаботки.
   *
   * Основной подтип "multipart/mixed"
   * Это основной подтип для типа 'multipart', он предназначен для случая, когда части письма взаимонезависимы.
   * Любые новые подтипы, неизвестные почтовой программе, должны быть истолкованы аналогично подтипу 'mixed'
   * "boundary" определяет границы вложения.
   */
  $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\n";
  $multipart .= "--$boundary\n";
  $kod = 'utf-8'; // или $kod = 'windows-1251';
  $multipart .= "Content-Type: text/html; charset=$kod\n";
  /**
   * Поле типа кодирования почтового сообщения (Content-Transfer-Encoding). Многие данные передаются по почте в их исходном виде.
   * Это могут быть 7bit символы, 8bit символы, 64base символы и т.п. Однако при работе в разнородных почтовых средах необходимо определить
   * механизм их представления в стандартном виде - US-ASCII. Для этого существуют процедуры кодирования такого сорта данных.
   * Наиболее широко применяемая - uuencode. Для того, чтобы при получении данные были бы правильно распакованы и введено в стандарт поле
   * "Сontent-Transfer-Encoding". Синтаксис этого поля следующий:
	 * Content-Transfer-Encoding:= "BASE64" / "QUOTED-PRINTABLE" /
	 * "8BIT"   / "7BIT" /
	 * "BINARY" / x-token
   */
  $multipart .= "Content-Transfer-Encoding: Quot-Printed\n\n";
  $multipart .= "$html\n\n";

  $message_part = "--$boundary\n";
  // application/octet-stream: двоичный файл без указания формата
  $message_part .= "Content-Type: application/octet-stream\n";
  $message_part .= "Content-Transfer-Encoding: base64\n";
  $message_part .= "Content-Disposition: attachment; filename= \"" . $path . "\"\n\n";
  $message_part .= chunk_split(base64_encode($file)) . "\n";
  $multipart .= $message_part . "--$boundary--\n";
  if (!mail($to, $thm, $multipart, $headers)) {
    exit("К сожалению, письмо не отправлено!");
  }
}

// Автоматический переход на главную страницу форума
header("Location: " . $_SERVER['PHP_SELF']);