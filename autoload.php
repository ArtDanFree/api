<?php

spl_autoload_register('vendor_autoload');
spl_autoload_register('my_autoloader');

function vendor_autoload($class) {
    require __DIR__ . '/vendor/autoload.php';
}

function my_autoloader($class) {
    require __DIR__ . '/' .str_replace('\\', '/', $class) . '.php';

}