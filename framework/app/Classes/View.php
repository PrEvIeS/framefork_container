<?php

namespace App\Classes;

class View
{
    public function render(Page $page)
    {
        return $this->renderLayout($page, $this->renderView($page));
    }

    public function renderLayout(Page $page, $content)
    {
        $layoutPath = $_SERVER['DOCUMENT_ROOT'] . "/layouts/{$page->layout}.php";

        if (file_exists($layoutPath)) {
            ob_start();
            $title = $page->title;
            include $layoutPath;
            return ob_get_clean();
        }
    }

    public function renderView(Page $page)
    {
        $viewPath = $_SERVER['DOCUMENT_ROOT'] . "/views/{$page->view}.php";
        if (file_exists($viewPath)) {
            ob_start();
            $arResult = $page->data;
            extract($arResult);
            include $viewPath;
            return ob_get_clean();
        }
    }
}