<?php
/**
 * Недостатки класса
 *
 * Уничтожение объектов-буферов должно происходить в правильной последовательности, а именно в порядке, обратном их созданию.
 * Например, следующий код недопустим:
 *
 * $h1 = new Buffering\Output();
 * $h2 = new Buffering\Output();
 *
 * $h1 = null;
 * $h2 = null;
 *
 * Удалив объект $h1, мы заставим PHP вызвать его деструктор, а тот, в свою очередь, запустит ob_end_clean(). При этом, конечно, будет
 * уничтожен не первый буфер вывода, как мы ожидаем (мы уже удалили $h1), а второй, причем объект $h2 об этом "ничего не узнает".
 * В результате любая попытка работы с $h2 станет ошибочной: ведь текущий буфер сменился без его ведома.
 *
 * Даже в том случае, если вы вообще не будете явно уничтожать объекты, все равно возникнет недоразумение.
 * $h1 = new Buffering\Output();
 * $h2 = new Buffering\Output();
 * // Конец программы
 * В каком порядке будут уничтожены объекты $h1 и $h2 автоматическим сборщиком мусора? Оказывается, в том же, в котором они создавались.
 * А в нашем случае это является как раз неверным вариантом.
 */