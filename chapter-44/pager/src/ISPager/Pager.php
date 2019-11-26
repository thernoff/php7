<?php

namespace ISPager;

abstract class Pager
{
    protected $view; // ссылка на объект класса View
    protected $parameters;
    protected $counter_param;
    protected $links_count;
    protected $items_per_page;

    public function __construct(
      // объект класса, который унаследован от класса View. Группа этих классов будет использоваться для отрисовки или
      // рендеринга внешнего вида постраничной навигации.
        View $view,
        // количество отображаемых на одной странице элементов
        $items_per_page = 10,
        // количество элементов слева и справа от текущего элемента
        $links_count = 3,
        // позволяет задать дополнительные GET-параметры, которые будут передаваться с каждой ссылкой постраничной навигации
        $get_params = null,
        // определяет название GET-параметра, через который передается номер текущей страницы
        $counter_param = 'page'
    ) {
        $this->view = $view;
        $this->parameters = $get_params;
        $this->counter_param = $counter_param;
        $this->items_per_page = $items_per_page;
        $this->links_count = $links_count;
    }

    /**
     * Должен возвращать общее количество элементов в разбиваемой на страницы коллекции
     */
    abstract public function getItemsCount();

    /**
     * Должен возвращать массив с элементами текущей страницы
     */
    abstract public function getItems();

    /**
     * Возвращает количество видимых ссылок слева и справа от текущей страницы
     */
    public function getVisibleLinkCount()
    {
        return $this->links_count;
    }

    /**
     * Возвращает дополнительные GET-параметры, которые необходимо передавать по ссылкам
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * Возвращает название GET-параметра, через который передается номер текущей страницы
     */
    public function getCounterParam()
    {
        return $this->counter_param;
    }

    /**
     * Возвращает количество элементов на одной странице
     */
    public function getItemsPerPage()
    {
        return $this->items_per_page;
    }

    /**
     * Возвращает путь к текущей странице
     */
    public function getCurrentPagePath()
    {
        return $_SERVER['PHP_SELF'];
    }

    /**
     * Возвращает номер текущей страницы
     */
    public function getCurrentPage()
    {
        if (isset($_GET[$this->getCounterParam()])) {
            return intval($_GET[$this->getCounterParam()]);
        } else {
            return 1;
        }
    }

    /**
     * Возвращает общее количество страниц
     */
    public function getPagesCount()
    {
        // Количество позиций
        $total = $this->getItemsCount();
        // Вычисляем количество страниц
        $result = (int) ($total / $this->getItemsPerPage());

        if ((float)($total / $this->getItemsPerPage()) - $result != 0) {
            $result++;
        }

        return $result;
    }

    public function render()
    {
        return $this->view->render($this);
    }

    public function __toString()
    {
        return $this->render();
    }
}