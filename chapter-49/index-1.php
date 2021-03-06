<?php
/**
 * Перехват выходного потока
 *
 * Функции перехвата
 * void ob_start()
 * Вызов функции говорит PHP, что необходимо начать "перехват" стандартного выходного потока программы.
 * Иными словами, весь текст, который выводится операторами echo или расположен вне участков кода PHP, будет накапливаться
 * в специальном буфере, а не отправится в браузер.
 * В любой момент времени мы можем получить все содержимое этого буфера, вызвав функцию ob_get_contents().
 *
 * string ob_get_contents()
 * Возвращает текущее содержимое буфера, который заполняется операторами вывода при включенном режиме буферизации.
 * Имеено ob_get_contents() обеспечивает возможность накопления текста, выводимого операторами echo.
 * Примечание: если буферизация выходного потока не была включена, функция возвращает false. Это свойство можно использовать
 * для проверки, установлен ли буфер вывода, или же данные сразу направляются в браузер.
 *
 * void ob_clean()
 * Немедленно очищает текущий выходной поток.
 *
 * void ob_end_clean()
 * Вызов данной функции завершает буферизацию выходного потока. При этом все содержимое буфера, которое было накоплено с момента последнего
 * вызова ob_start(), теряется (не попадает в браузер). Если текст вывода нужен, следует сначала получить его с помощью функции
 * ob_get_contents().
 *
 * void ob_end_flush()
 * Эта функция практически полностью эквивалентна ob_end_clean(), за исключением того, что данные, накопленные в буфере, немедленно выводятся
 * в браузер пользователя. Ее применение оправдано, если мы хотим отправлять данные страницы клиенту, параллельно записывая их в переменную для
 * дальнейшей обработки.
 *
 * int ob_get_level()
 * Перехватывать выходной поток скрипта можно вложенным образом. Функция ob_get_level() возвращает информацию о "глубине" вложенности
 * перехвата.
 */