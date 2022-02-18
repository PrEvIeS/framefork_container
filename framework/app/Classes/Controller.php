<?php

namespace App\Classes;

class Controller
{
    protected $layout = 'default';

    /**
     * @param $view
     * @param array $data
     * @return Page
     */
    protected function render($view, $data = []): Page
    {
        return new Page($this->layout, $this->title, $view, $data);
    }
}