<?php
/**
 * Установка обработчиков сессии
 *
 * Обзор обработчиков
 *
 * bool handler_open(string $save_path, string $session_name)
 * Функция запускается, когда вызывается session_start()
 *
 * bool handler_close()
 * Этот обработчик вызывается, когда данные сессии уже записаны во временное хранилище и его нужно закрыть.
 *
 * string handler_read(string $sid)
 * Вызов обработчика происходит, когда нужно прочитать данные сессии с идентификатором $sid из временного хранилища.
 * Функция должна возвращать данные сессии в специальном формате: имя1=значение1;имя2=значение2;имя3=значение3;...
 * Здесь имяN задает имя очередной переменной, зарегистрированной в сессии, а значениеN - результат вызова функции serialize() для значения
 * этой переменной. Например: foo|i:1;count|i:10;
 *
 * string handler_write(string $sid, string $data)
 * Этот обработчик предназначен для записи данных сессии с идентификатором $sid во временное хранилище,
 * например, открытое ранее обработчиком handler_open(). Параметр $data задается в точно таком же формате, который был описан выше.
 *
 * bool handler_destroy(string $sid)
 * Обработчик вызывается, когда сессия с идентификатором $sid должна быть уничтожена.
 *
 * bool handler_gc(int $maxlifetime)
 * Данный обработчик вызывается каждый раз при завершении работы сценария. Если пользователь окончательно "покинул" сервер, значит, данные сессии во
 * временном хранилище можно уничтожить.
 *
 * Замечание: префикс handler не является обязательным
 *
 * Регистрация обработчиков
 * void session_set_save_handler($open, $close, $read, $write, $destroy, $gc)
 * Эта функция регистрирует процедуры, имена которых переданы в ее параметрах, как обработчики текущей сессии. Ее можно вызвать только до
 * инициализации сессии (до session_start()), иначе она просто игнорируется.
 */

 ## Переопределение обработчиков сессии
 // Возвращает полное имя файла временного хранилища сессии.
 // В случае, если нужно изменить тот каталог, в котором должны храниться сессии, достаточно поменять только эту функцию
 function ses_fname($key) {
  // в нашем случае session_name() равно test1
  return dirname(__FILE__) . "/sessiondata/" . session_name() . "/$key";
}

// Заглушки - эти функции просто ничего не делают
function ses_open($save_path, $ses_name) {
  return true;
}

function ses_close() {
  return true;
}

// Чтение данных из временного хранилища
function ses_read($key) {
  // Получаем имя файла и открываем файл
  $fname = ses_fname($key);
  $value = @file_get_contents($fname);
  return ($value) ? $value : "";
}

// Запись данных сессии во временное хранилище
function ses_write($key, $val) {
  // в нашем случае $key равно mimn0f5accdhvffaumeb9k6oa815oi57, $val - count|i:6;
  $fname = ses_fname($key); // C:\OSPanel\domains\basic.loc\php\courses_books\php7\chapter-34/sessiondata/test1/mimn0f5accdhvffaumeb9k6oa815oi57
  // Сначала создаем все каталоги (в случае если они уже есть, игнорируем сообщение об ошибке)
  @mkdir(dirname(dirname($fname)), 0777);
  @mkdir(dirname($fname), 0777);

  // Создаем файл и записываем в него данные сессии
  @file_put_contents($fname, $val);
  return true;
}

// Вызывается при уничтожении сессии
function ses_destroy($key) {
  if (file_exists(ses_fname($key))) {
    try {
      unlink(ses_fname($key));
    } catch(Exception $e) {
      // ничего не делаем
    }
  }
  return true;
}

// Сборка мусора - ищем все старые файлы и удаляем их
function ses_gc($maxlifetime) {
  $dir = ses_fname(".");
  // Получаем доступ к каталогу текущей группы сессии
  foreach (glob("$dir/*") as $fname) { // glob — Находит файловые пути, совпадающие с шаблоном
    // Файл слишком старый?
    if (time() - filemtime($fname) >= $maxlifetime) {
      @unlink($fname);
      continue;
    }
  }

  // Если каталог не пуст, он не удалится - будет предупреждение.
  // Мы его подавляем. Если же пуст - удалится, что нам и нужно.
  @rmdir($dir);
  return true;
}

// Регистрируем наши новые обработчики
session_set_save_handler(
  "ses_open", "ses_close",
  "ses_read", "ses_write",
  "ses_destroy", "ses_gc"
);

// Для примера подключаемся к группе сессий test
session_name("test1");
session_start();
// Увеличиваем счетчик в сессии
$_SESSION['count'] = @$_SESSION['count'] + 1;
?>
<h2>Счетчик</h2>
<div>
  В текущей сессии работы с браузером Вы открыли эту страницу <?= $_SESSION['count']?> раз(а).
</div>
<div>
  Закройте браузер, чтобы обнулить счетчик.<br/>
  <a href="<?= $_SERVER['SCRIPT_NAME']?>" target="_blank">Открыть дочернее окно браузера</a>
</div>
<?php
//session_destroy();
?>