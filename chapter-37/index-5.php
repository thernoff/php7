<?php
/**
 * Обработка ошибок
 * Создадим ошибочный запрос и попробуем обработать его при помощи механизма исключений.
 */
require_once('connect_db.php');
try {
  $query = "SELECT VERSION1() AS version";
  $stmt = $pdo->query($query);
  echo $stmt->fetch()['version'];
// данный блок отработает если при подключении выставлен режим обработки ошибок - PDO::ERRMODE_EXCEPTION
 } catch (PDOException $e) {

// для PDO::ERRMODE_SILENT и PDO::ERRMODE_WARNING лучше использовать
//} catch (Error $e) {

  echo "Ошибка выполнения запроса: " . $e->getMessage();
}
