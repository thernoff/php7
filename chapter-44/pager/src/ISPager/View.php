<?php

namespace ISPager;

abstract class View
{
    protected $pager;

    /**
     * Формирует ссылку на страницу.
     *
     * Принимает в качестве первого аргумента название ссылки, а в качестве второго - номер страницы.
     */
    public function link($title, $current_page = 1)
    {
        return "<a href='{$this->pager->getCurrentPagePath()}?{$this->pager->getCounterParam()}={$current_page}"
      ."{$this->pager->getParameters()}'>{$title}</a>";
    }

    /**
     * Принимает объект $pager класса Pager, точнее одного из производных класса и помещает его в защищенный член класса $pager.
     */
    abstract public function render(Pager $pager);
}