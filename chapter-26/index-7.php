<?php
// Наследование исключений
// Исключение - ошибка файловых операций
class FilesystemException extends Exception {
	private $name;
	public function __construct($name) {
		parent::__construct($name);
		$this->name = $name;
	}

	public function getName() {
		return $this->name;
	}
}

// Исключение - файл не найден
class FileNotFoundException extends FilesystemException {}

// Исключение - ошибка записи в файл
class FileWriteException extends FilesystemException {}

try {
	// Генерируем исключение типа FileNotFoundException
	if (!file_exists("spoon.txt")) {
		throw new FileNotFoundException("spoon.text");
	}
} catch (FilesystemException $e) {
	// Ловим ЛЮБОЕ файловое исключение!
	echo "Ошибка при работе с файлом '{$e->getName()}'.<br/>";
} catch (Exception $e) {
	// Ловим все остальные исключения, которые еще не поймали
	echo "Другое исключение: {$e->getDirName()}.<br />";
}