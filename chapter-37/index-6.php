<?php
/**
 * Извлечение данных
 */
require_once("connect_db.php");
 ## Вывод содержимого таблицы catalogs
 try {
  $query = "SELECT * FROM catalogs";
  $stmt = $pdo->query($query);
  // метод fetch() возвращает одну запись результирующей таблицы в виде ассоциативного массива, где ключами выступают имена столбцов,
  // а значения - содержимое ячеек. Кроме того, содержимое ячеек дублируется в индексном виде. В качестве индекса выступает порядок
  // извлекаемого столбца (начаная с 0).
  while ($catalog = $stmt->fetch()) {
    //echo $catalog['name'] . "<br/>";
    echo "<pre>";
    print_r($catalog);
    echo "</pre>";
    break;
  }
  // только ассоциативные элементы
  while ($catalog = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<pre>";
    print_r($catalog);
    echo "</pre>";
    break;
  }

  // только индексные элементы
  while ($catalog = $stmt->fetch(PDO::FETCH_NUM)) {
    echo "<pre>";
    print_r($catalog);
    echo "</pre>";
    break;
  }

  // аналогично поведению по умолчанию
  while ($catalog = $stmt->fetch(PDO::FETCH_BOTH)) {
    echo "<pre>";
    print_r($catalog);
    echo "</pre>";
    break;
  }

  // PDO::FETCH_CLASS создает и возвращает объект запрошенного класса, присваивая значения столбцов результирующего набора именованным свойствам класса

  // метод fetchAll() позволяет извлечь результаты в один большой массив
  $arrCatalogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo "<pre>";
    print_r($arrCatalogs);
    echo "</pre>";
 } catch (PDOException $e) {
   echo "Ошибка выполнения запроса: " . $e->getMessage();
 }


