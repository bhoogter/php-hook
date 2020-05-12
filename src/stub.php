<?php

spl_autoload_register(function ($name) {
    $d = (strpos(__FILE__, ".phar") === false ? __DIR__ : "phar://" . __FILE__ . "/src");
    if ($name == "php_hook") require_once($d . "/php-hook.php");
});

__HALT_COMPILER();