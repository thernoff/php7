<?php
// Интерфейсы (по другому контракт, т.е. все классы которые реализуют интерфейс, должны
// реализовать все методы, указанные в нем)
interface Seo {
    public function keywords();
    public function description();
    public function ogs();
}

interface Tag {
    public function tags(); // Возвращает теги
}

// Интерфейсы можно наследовать друг от друга
interface Author extends Tag {
    public function info($id); // Информация об авторе
}
// Полиморфизм
abstract class Page {
    protected $title;
    protected $content;

    public function __construct($title = '', $content = '') {
        $this->title = $title;
        $this->content = $content;
    }

    public function title() {
        return $this->title;
    }

    public function content() {
        return $this->content;
    }

    public function render() {
        echo "<h1>" . htmlspecialchars($this->title()) . "</h1>";
        echo "<p>" . nl2br( htmlspecialchars($this->content()) ) . "</p>";
    }
}

// Базовый класс для кэшируемых страниц
abstract class Cached extends Page {
    // Время действия кэша
    protected $expires;
    // Хранилище
    protected $store;

    public function __construct($title = '', $content = '', $expires = 0) {
        parent::__construct($title, $content);
        $this->expires = $expires;
        // Подготовка хранилища
        $this->store = new Memcached();
        $this->store->addServer('localhost', 11211);
        // Размещение данных в хранилище
        $this->set($this->id('title'), $title);
        $this->set($this->id('content'), $content);
    }

    // Проверить, есть ли позиция в кэше
    protected function isCached($key) {
        return (bool) $this->store->get($key);
    }

    // Поместить в кэш по ключу $key значение $value.
    // В случае если ключ уже существует:
    // 1. Не делать ничего, если $force принимает значение false.
    // 2. Переписать, если $force принимает значение true.
    protected function set($key, $value, $force = false) {
        if ($force) {
            $this->store->set($key, $value, $this->expires);
        } else {
            if (!$this->isCached($key)) {
                $this->store->set($key, $value, $this->expires);
            }
        }
    }

    // Извлечение значения $key из кэша
    protected function get($key) {
        return $this->store->get($key);
    }

    // Формируем уникальный ключ для хранилища
    abstract public function id($name);

    // Получение заголовка страницы
    public function title() {
        if ( $this->isCached($this->id('title')) ) {
            return $this->get($this->id('title'));
        } else {
            return parent::title();
        }
    }

    public function content() {
        if ( $this->isCached($this->id('content')) ) {
            return $this->get($this->id('content'));
        } else {
            return parent::content();
        }
    }
}

class StaticPage extends Cached implements Seo, Tag {
    public function __construct($id) {
        // Проверяем, нет ли такой страницы в кэше
        if ( $this->isCached($this->id($id)) ) {
            // Есть, инициализируем объект с содержимым кэша
            parent::__construct( $this->title(), $this->content() );
        } else {
            // Данные пока не кэшированы, извлекаем содержимое базы данных
            // $query = "SELECT * FROM static_pages WHERE id = :id LIMIT 1";
            // $sth = $dbh->prepare($query);
            // $sth = $dbh->execute($query, [$id]);
            // $page = $sth->fetch(PDO::FETCH_ASSOC);
            // parent::__construct($page['title'], $page['content']);
            parent::__construct("Контакты", "Содержимое страницы Контакты");
        }
    }

    // Уникальный ключ для кэша
    public function id($name) {
        return "static_page_{$name}";
    }

    public function keywords() {}
    public function description() {}
    public function ogs() {}
    public function tags() {}
}

class News extends Cached implements Seo, Author {
    private $id;

    public function __construct($id) {
        if ($this->isCached($this->id($id))) {
            parent::__construct($this->title(), $this->content());
        } else {
            /*
            $query = "SELECT * FROM news WHERE id = :id LIMIT 1";
            $sth = $dbh->prepare($query);
            $sth = $dbh->execute($query, [$id]);
            $page = $sth->fetch(PDO::FETCH_ASSOC);
            parent::__construct($page['title'], $page['content']);
            */
            parent::__construct("Новости", "Содержимое страницы Новости");
        }
    }

    public function id($name) {
        return "news_{$name}";
    }

    public function keywords() {}
    public function description() {}
    public function ogs() {}
    public function tags() {}
    public function info($id) {}
}