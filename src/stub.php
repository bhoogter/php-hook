<?php

spl_autoload_register(function ($name) {
    if ($name == "php_hook") require_once(__DIR__ . "/php-hook.php");
});

__HALT_COMPILER();