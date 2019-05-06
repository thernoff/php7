<?php
// Условно определяемые функции
// Если мы работаем из Windows, функция myChown() ничего не делает и возвращает 1 как индикатор успеха,
// в то время как для UNIX она просто вызывает оригинальную chown().
if (PHP_OS == "WINNT") {
    // Функция-заглушка
    function myChown($fname, $attr) {
        // Ничего не делает
        return 1;
    }
} else {
    // Передаем вызов настоящей chown()
    function myChown($fname, $attr) {
        return chown($fname, $attr);
    }
}