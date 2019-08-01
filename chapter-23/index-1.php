<?php
class FileLogger {
    public $f; // открытый файл
    public $name; // имя журнала
    public $lines = []; // накапливаемые строки
    public $t;

    public function __construct($name, $fname) {
        $this->name = $name;
        //$this->f = $fname;
        $this->f = fopen($fname, "a+");
    }

    public function __destruct() {
        fputs($this->f, join("", $this->lines));
        fclose($this->f);
    }

    public function log($str) {
        $prefix = "[" . date("Y-m-d_h:i:s ") . "{$this->name}]";
        $str = preg_replace('/^/m', $prefix, rtrim($str));
        $this->lines[] = $str . "\n";
    }
}

// "Ручная" реализация наследования
class FileLoggerDebug0 {
    // Объект "базового" класса FileLogger
    private $logger;
    // Конструктор нового класса. Создает объект FileLogger.
    public function __construct($name, $fname) {
        $this->logger = new FileLogger($name, $fname);
    }

    public function debug($s, $level = 0) {
        $stack = debug_backtrace();
        $file = basename($stack[$level]['file']);
        $line = $stack[$level]['line'];
        $this->logger->log("[at $file line $line] $s");
    }

    public function log($s) {
        return $this->logger->log($s);
    }
}

$logger = new FileLoggerDebug0("FileLoggerDebug0", "FileLoggerDebug0.log");
$logger->log("Обычное сообщение");
$logger->debug("Отладочное сообщение");

// "Правильное" наследование
class FileLoggerDebug extends FileLogger {
    public function __construct($fname) {
        parent::__construct( basename($fname), $fname );
    }

    public function debug($s, $level = 0) {
        $stack = debug_backtrace();
        $file = basename($stack[$level]['file']);
        $line = $stack[$level]['line'];
        $this->log("[at $file line $line] $s");
    }
}

$logger = new FileLoggerDebug("FileLoggerDebug.log");
$logger->log("Обычное сообщение");
$logger->debug("Отладочное сообщение");