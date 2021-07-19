<?php

namespace NM_THEME\Inc\Classes;
use NM_THEME\Inc\Traits\Singleton;

class Test{
    use Singleton;
    public function __construct()
    {
        echo "Test";
    }
}