<?php
// Замыкания могут быть полезными, когда при их помощи мы наоборот изменяем состояние объекта.
// В этом поможет метод bintTo().
// Closure Closure::bindTo(object $this, [, mixed $scope = "static"])
// Метод определяет внутри замыкания объект $this, который будет доступен на момент вызова замыкания. При помощи необязательного
// параметра $scope можно указать класс данного объекта.
// Использование метода bindTo()
class View {
  protected $pages = [];
  protected $title = "";
  protected $body = "";

  public function addPage($page, $pageCallback) {
    // $pageCallback - становится замыканием, причем в качестве захватываемой переменной служит текущий объект, а точнее ссылка на него $this.
    // В результате мы получаем возможность изменять состояние объекта View из анонимной функции, которая передается методу addPage() в качестве второго аргумента.
    // В момент вызова метода render() перед выводом шаблона вызывается анонимная функция из массива $pages, которая устанавливает нужные значения для членов объекта $title и $content.
    $this->pages[$page] = $pageCallback->bindTo($this, __CLASS__);
  }

  public function render($page) {
    /* Для данного примера будет вызвана примерно следующая функция:
      function() {
        $this->title = 'О нас';
        $this->body = "Содержимое страницы О нас";
      }
      У которой
    */
    $this->pages[$page]();

    $content = <<<HTML
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>{$this->title()}</title>
  </head>
  <body>
    <p>{$this->body()}</p>
  </body>
</html>
HTML;

    echo $content;
  }

  public function title() {
    return htmlspecialchars($this->title);
  }

  public function body() {
    return nl2br(htmlspecialchars($this->body));
  }
}

$view = new View();
$view->addPage('about', function() {
  $this->title = 'О нас';
  $this->body = "Содержимое страницы О нас";
});



$view->addPage('contacts', function() {
  $this->title = 'Контакты';
  $this->body = "Содержимое страницы Контакты";
});

$view->render('about');
$view->render('contacts');