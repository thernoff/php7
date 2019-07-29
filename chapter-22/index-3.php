<?php
// Деструктор
// Явное освобождение ресурсов
// Класс, упрощающий ведение разного рода журналов
class FileLogger0 {
    public $f; // открытый файл
    public $name; // имя журнала
    public $lines = []; // накапливаемые строки

    // Создает новый файл журнала или открывает дозапись в конец существующего.
    // Паараметр $name - логическое имя журнала.
    public function __construct($name, $fname) {
        $this->name = $name;
        $this->f = fopen($fname, "a+");
    }

    // Добавляет в журнал одну строку. Она не попадает в файл сразу же,
    // а накапливается в буфере - до самого закрытия (close()).
    public function log($str) {
        $prefix = "[" . date("Y-m-d_h:i:s ") . "{$this->name}] ";
        $str = preg_replace('/^/m', $prefix, rtrim($str));
        // Сохранаяем строку
        $this->lines[] = $str . "\n";
    }

    // Закрывает файл журнала. Должна ОБЯЗАТЕЛЬНО вызываться в конце работы с объектом!
    public function close() {
        fputs($this->f, join("", $this->lines));
        fclose($this->f);
    }
}

// Создаем в цикле много объектов FileLogger0
for ($n=0; $n<10; $n++) {
    $logger = new FileLogger0("test$n", "test.log");
    $logger->log("Hello!");
    // Если забыть вызвать метод close(), то данные не будут записаны
    $logger->close();
}

class FileLogger {
    public $f; // открытый файл
    public $name; // имя журнала
    public $lines = []; // накапливаемые строки
    public $t;

    // Создает новый файл журнала или открывает дозапись в конец существующего.
    // Паараметр $name - логическое имя журнала.
    public function __construct($name, $fname) {
        $this->name = $name;
        $this->f = fopen($fname, "a+");
        $this->log("### __consruct() called!");
    }

    // Гарантированно вызывается при уничтожении объекта.
    // Закрывает файл журнала.
    public function __destruct() {
        $this->log("### __destruct() called!");
        fputs( $this->f, join("", $this->lines) );
        fclose($this->f);
    }

    // Добавляет в журнал одну строку. Она не попадает в файл сразу же,
    // а накапливается в буфере - до самого закрытия (close()).
    public function log($str) {
        $prefix = "[" . date("Y-m-d_h:i:s ") . "{$this->name}] ";
        $str = preg_replace('/^/m', $prefix, rtrim($str));
        // Сохранаяем строку
        $this->lines[] = $str . "\n";
    }
}

for ($n = 0; $n < 10; $n++) {
    $logger = new FileLogger("test$n", "test1.log");
    $logger->log("Hello!!!");
    //$loggers[] = $logger;
}

exit();