<?php
/**
 * Создаение базы данных: CREATE DATABASE php7;
 *
 * Создание базы данных с указанием кодировки (по умолчанию default-character-set=utf8 default-collation=utf8_general_ci):
 * CREATE DATABASE php7 DEFAULT CHARACTER SET utf8;
 *
 * Просмотр существующих баз данных: SHOW DATABASES;
 *
 * УДАЛЕНИЕ БАЗЫ ДАННЫХ: DROP DATABASE php7;
 *
 * ВЫБОР БАЗЫ ДАННЫХ: USE php7;
 *
 * ПРОСМОТР ТАБЛИЦЫ В ВЫБРАННОЙ БД: SHOW tables;
 *
 * Создание и удаление таблиц:
 * CREATE TABLE table_name [(create_definition, ...)]
 * CREATE TABLE authors (
 *  id INT(11) NOT NULL AUTO_INCREMENT,
 *  name TINYTEXT,
 *  passw TINYTEXT,
 *  email TINYTEXT,
 *  url TEXT,
 *  icq TINYTEXT,
 *  about TEXT,
 *  photo TINYTEXT,
 *  putdate DATETIME DEFAULT NULL,
 *  last_time DATETIME DEFAULT NULL,
 *  themes INT(10) DEFAULT NULL,
 *  statususer ENUM('user', 'moderator', 'admin') NOT NULL DEFAULT 'user',
 *  PRIMARY KEY (id)
 * );
 *
 * ПРОСМОТР СТРУКТУРЫ ТАБЛИЦЫ: DESCRIBE table_name
 *
 * ИЗМЕНЕНИЕ СТРУКТУРЫ ТАБЛИЦЫ: ALTER TABLE table_name alter_spec
 * Например:
 *  ALTER TABLE forums ADD test int(10) AFTER name; // добавление столбца
 *  ALTER TABLE forums CHANGE test new_test TEXT; // переименование столбца test в new_test
 *  ALTER TABLE forums CHANGE new_test new_test INT(5) NOT NULL; // изменение типа у столбца new_test
 *  ALTER TABLE forums DROP new_test; // удаление столбца new_test
 *
 * УДАЛЕНИЕ ТАБЛИЦЫ DROP TABLE table_name [, table_name, ...]
 *
 * ВСТАВКА ЧИСЛОВЫХ ЗНАЧЕНИЙ В ТАБЛИЦУ
 * INSERT INTO tbl VALUES (10, 20);
 * INSERT INTO tbl (cat_id, id) VALUES (10, 20);
 * INSERT INTO tbl (id) VALUES (30);
 *
 * Следующие два запроса эквивалентны
 * INSERT INTO tbl () VALUES ();
 * INSERT INTO tbl (id, cat_id) VALUES (DEFAULT, DEFAULT);
 *
 * СУБД MySQL поддерживает альтернативный синтаксис оператора INSERT
 * INSERT INTO tbl SET id = 40, cat_id = 50;
 * INSERT INT tbl SET id = 50;
 *
 * ВСТАВКА СТРОКОВЫХ ЗНАЧЕНИЙ
 * INSERT INTO catalogs VALUES (3, "Память \"DDR\"");
 *
 * ВСТАВКА УНИКАЛЬНЫХ ЗНАЧЕНИЙ (допустим в таблице tbl имеется поле id, которое является первичным ключом (PRIMARY KEY) таблицы),
 * тогда вызов двух следующих запросов приведет к ошибке
 * INSERT INTO tbl VALUES (1, "Video");
 * INSERT INTO tbl VALUES (1, "Audio");
 *
 * Чтобы новые записи с дублирующим ключом отбрасывались без генерации ошибки, следует добавить после оператора INSERT
 * ключевое слово IGNORE:
 * INSERT IGNORE INTO tbl VALUES (1, "Audio");
 *
 * УДАЛЕНИЕ ДАННЫХ
 * DELETE - удаление всех или части записей из таблицы
 * DELETE FROM catalogs WHERE id > 2;
 * TRUNCATE TABLE - удаление всех записей из таблицы
 * TRUNCATE TABLE products;
 *
 * ОБНОВЛЕНИЕ ЗАПИСЕЙ С ПОМОЩЬЮ ОПЕРАТОРОВ UPDATE и REPLACE
 * UPDATE обновляет отдельные поля в уже существующих записях,
 * тогда как оператор REPLACE больше похож на INSERT, за исключением того, что если старая запись в данной таблице имеет
 * то же значение индекса UNIQUE или PRIMARY KEY, что и новая, то старая запись перед занесением новой записи будет
 * удалена.
 *
 * UPDATE catalogs SET name = 'Процессоры (Intel)' WHERE name = 'Процессоры';
 *
 * REPLACE INTO catalogs VALUES
 *  (5, 'Сетевые адаптеры'),
 *  (6, 'Программное обеспечение');
 */