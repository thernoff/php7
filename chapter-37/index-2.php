<?php
/**
 * ВЫБОРКА ДАННЫХ
 * ВЫБОР ВСЕХ ЗАПИСЕЙ
 * SELECT catalog_id, name FROM catalogs; // в таблице catalogs всего два поля: catalog_id и name
 * SELECT * FROM catalogs;
 *
 * ВЫБОРКА С ИЗМЕНЕНИЕМ ПОРЯДКА СЛЕДОВАНИЯ СТОЛБЦОВ
 * SELECT name, catalog_id FROM catalogs;
 *
 * УСЛОВНАЯ ВЫБОРКА (С ИСПОЛЬЗОВАНИЕМ КЛЮЧЕВОГО СЛОВА WHERE)
 * SELECT * FROM catalogs WHERE catalog_id > 2;
 * SELECT catalog_id, catalog_id > 2 FROM catalogs;
 * SELECT * FROM catalogs WHERE catalog_id > 2 AND catalog_id <= 4;
 * SELECT * FROM catalogs WHERE catalog_id > 2 OR catalog_id <= 4;
 * SELECT catalog_id, catalog_id > 2, NOT catalog_id > 2 FROM catalogs;
 * SELECT * FROM catalogs WHERE catalog_id BETWEEN 3 AND 4;
 * SELECT * FROM catalogs WHERE catalog_id NOT BETWEEN 3 AND 4;
 * SELECT * FROM catalogs WHERE catalog_id IN (1, 2, 5);
 * SELECT * FROM catalogs WHERE catalog_id NOT IN (1, 2, 5);
 * SELECT * FROM catalogs WHERE name LIKE '%ы';
 * SELECT * FROM catalogs WHERE name NOT LIKE '%ы';
 *
 * ПСЕВДОНИМЫ СТОЛБЦОВ
 * SELECT catalog_id, name, DATE_FORMAT(putdate, '%d.%m.%Y') AS printdate FROM catalogs;
 *
 * СОРТИРОВКА ЗАПИСЕЙ
 * SELECT catalog_id, name FROM catalogs ORDER BY catalog_id;
 * SELECT catalog_id, name FROM catalogs ORDER BY name DESC;
 * СОРТИРОВКА ПО НЕСКОЛЬКИМ ПОЛЯМ
 * // записи сначала сортируются по столбцу catalog_id, а совпадающие в рамках одного значения catalog_id записи сортируются по полю pubdate
 * // причем ключевое слово DESC относится только к pubdate
 * SELECT * FROM tbl ORDER BY catalog_id, putdate DESC;
 *
 * ВЫВОД ЗАПИСЕЙ В СЛУЧАЙНОМ ПОРЯДКЕ
 * SELECT catalog_id, name FROM catalogs ORDER BY RAND();
 * ВЫВОД ОДНОЙ СЛУЧАЙНОЙ ЗАПИСИ
 * SELECT catalog_id, name FROM catalogs ORDER BY RAND() LIMIT 1;
 *
 * ОГРАНИЧЕНИЕ ВЫБОРКИ
 * SELECT catalog_id, name FROM catalogs ORDER BY catalog_id DESC LIMIT 2;
 * Извлекаем следующие две записи
 * SELECT catalog_id, name FROM catalogs ORDER BY catalog_id DESC LIMIT 2, 2;
 * Извлекаем следующие две записи
 * SELECT catalog_id, name FROM catalogs ORDER BY catalog_id DESC LIMIT 4, 2;
 *
 * ВЫВОД УНИКАЛЬНЫХ ЗНАЧЕНИЙ
 * SELECT DISTINCT catalog_id FROM catalogs ORDER BY catalog_id;
 * Часто для извлечения уникальных записей прибегают также к конструкции GROUP BY, содержащей имя стобца, по которому группируется результат.
 * GROUP BY располагается перед ORDER BY и LIMIT
 * SELECT catalog_id FROM catalogs GROUP BY catalog_id;
 */