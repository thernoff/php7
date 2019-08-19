<?php
// Использование интерфейсов для классификации исключений
interface IException {}

  // Интерфейс для внутренних ошибок (сообщения записываются в лог журнала)
  interface IInternalException extends IException {}
    interface IFileException extends IInternalException {}
    interface INetException extends IInternalException {}
  // Интерфейс для пользовательских ошибок (сообщения выводятся сразу в браузер)
  interface IUserException extends IException {}

// Теперь нужно создать классы-исключения, которые реализует данные интерфейсы
// Ошибка: файл не найден
class FileNotFoundException extends Exception implements IFileException {}

// Ошибка: ошибка доступа к сокету
class SocketException extends Exception implements INetException {}

// Ошибка: неправильный пароль пользователя
class WrongPassException extends Exception implements IUserException {};

// Ошибка: невозможно записать данные на сетевой принтер
class NetPrinterWriteException extends Exception implements IFileException, INetException {}

// Ошибка: невозможно соединиться с SQL-сервером
class SqlConnectionException extends Exception implements IInternalException, IUserException {}

try {
  printDocument();
} catch (IFileException $e) {
  // Перехватываем только файловые исключения
  echo "Файловая ошибка: {$e->getMessage()}.<br/>";
} catch (Exception $e) {
  // Перехват всех остальных исключений
  echo "Неизвестное исключение: <pre>", $e, "</pre>";
}

function printDocument() {
  $printer = "//./printer";
  // Генерируем исключение типов IFileException и INetException
  if (!file_exists($printer)) {
    throw new NetPrinterWriteException($printer);
  }
}