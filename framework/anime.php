<?php
require_once 'vendor/autoload.php';
use App\Classes\Page;

$controllerName = ucfirst($argv[1]) . 'Command';

$fullName = '\\App\\Commands\\' . $controllerName;

try {
    $controller = new $fullName;
    if (method_exists($controller, mb_strtolower($argv[2]))) {
        $controller->{$argv[2]}();
    } else {
        echo "Метод <b>{$argv[2]}</b> не найден в классе $fullName.";
        die();
    }
} catch (\Throwable $throwable) {
    echo $throwable->getMessage();
}