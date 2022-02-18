<?php

namespace App\Classes;

class Dispatcher
{
    public function getPage(Track $track)
    {
        $controllerName = ucfirst($track->controller) . 'Controller';

        $fullName = '\\App\\Controllers\\' . $controllerName;

        try {
            $controller = new $fullName;
            if (method_exists($controller, $track->action)) {
                $result = $controller->{$track->action}($track->params);
                if ($result) {
                    return $result;
                } else {
                    return new Page('default');
                }
            } else {
                echo "Метод <b>{$track->action}</b> не найден в классе $fullName.";
                die();
            }
        }catch (\Throwable $throwable){
            echo $throwable->getMessage();
        }
    }
}