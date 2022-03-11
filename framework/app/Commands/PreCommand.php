<?php

namespace App\Commands;

class PreCommand
{
    public $slug = 'pre';

    public function run()
    {
        echo "<pre>" . print_r('anime top', true) . "</pre>";
        die;
    }

}