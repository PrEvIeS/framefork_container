<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8ee260dcc79cbd3bc3fe0f29f8cbd55f
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'App\\Classes\\Builder' => __DIR__ . '/../..' . '/app/Classes/Builder.php',
        'App\\Classes\\Connection' => __DIR__ . '/../..' . '/app/Classes/Connection.php',
        'App\\Classes\\Controller' => __DIR__ . '/../..' . '/app/Classes/Controller.php',
        'App\\Classes\\DateTime' => __DIR__ . '/../..' . '/app/Classes/DateTime.php',
        'App\\Classes\\Dispatcher' => __DIR__ . '/../..' . '/app/Classes/Dispatcher.php',
        'App\\Classes\\Model' => __DIR__ . '/../..' . '/app/Classes/Model.php',
        'App\\Classes\\Page' => __DIR__ . '/../..' . '/app/Classes/Page.php',
        'App\\Classes\\Route' => __DIR__ . '/../..' . '/app/Classes/Route.php',
        'App\\Classes\\Router' => __DIR__ . '/../..' . '/app/Classes/Router.php',
        'App\\Classes\\Track' => __DIR__ . '/../..' . '/app/Classes/Track.php',
        'App\\Classes\\Validation' => __DIR__ . '/../..' . '/app/Classes/Validation.php',
        'App\\Classes\\View' => __DIR__ . '/../..' . '/app/Classes/View.php',
        'App\\Controllers\\MainController' => __DIR__ . '/../..' . '/app/Controllers/MainController.php',
        'App\\Controllers\\UsersController' => __DIR__ . '/../..' . '/app/Controllers/UsersController.php',
        'App\\Models\\UsersModel' => __DIR__ . '/../..' . '/app/Models/UsersModel.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8ee260dcc79cbd3bc3fe0f29f8cbd55f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8ee260dcc79cbd3bc3fe0f29f8cbd55f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8ee260dcc79cbd3bc3fe0f29f8cbd55f::$classMap;

        }, null, ClassLoader::class);
    }
}