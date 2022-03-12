<?php

namespace App\Commands;

class PreCommand
{

    public function run()
    {
        $lockFile = __FILE__ . '.lock';
        $hasFile = file_exists($lockFile);
        $lockFp = fopen($lockFile, 'w');
        if (!flock($lockFp, LOCK_EX | LOCK_NB)) {
            die('Экзепляр уже запущен');
        }
        if ($hasFile) {
            echo 'Предыдущий запуск завершился с ошибкой';
        }

        echo "<pre>" . print_r('anime top', true) . "</pre>";

        register_shutdown_function(function () use ($lockFp, $lockFile) {
            flock($lockFp, LOCK_UN);
            unlink($lockFile);
        });
    }

}