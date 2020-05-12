<?php

// function is_php_hook($f)
    // {
    //     return is_string($f) && substr($f, 0, 4) == "php:";
    // }
    // function php_hook_has_args($f)
    // {
    //     return $this->is_php_hook($f) && strpos($f, ",") !== false;
    // }
    // function php_hook($f, $args = "", $callarray = false)
    // {
    //     //print "<br/>zoSource::php_hook($f, $args)";
    //     if (!$this->is_php_hook($f)) return $f;
    //     if ($args == "") $args = iOBJ()->args;
    //     $s = substr($f, 4);

    //     $S = split(",", $s);
    //     $s = $S[0];
    //     if (!is_callable($s)) {
    //         print "<br/>php_hook [" . $s . "] is not callable.";
    //         $this->backtrace();
    //         return "";
    //     }

    //     if (count($S) > 1) {
    //         $a = array();
    //         $n = 0;
    //         foreach ($S as $ss) {
    //             if (++$n == 1) continue;
    //             if ($ss[0] != "@") $v = $ss;
    //             else {
    //                 $sst = substr($ss, 1);
    //                 if (is_array($args)) $v = $args[$sst];
    //                 else $v = juniper_querystring::get_querystring_var($args, $sst);
    //             }
    //             $a[] = $v;
    //         }
    //         $args = $a;
    //         //print "<br/>";print_r($a);
    //         $callarray = true;
    //     }
    //     //print "<br/>php_hook.......$s, callarray=".($callarray?"Y":"N").", is_array(args)?".(is_array($args)?"Y":"N").", v=".((!$callarray && is_array($args))?"Y":"N");print_r($args);
    //     if (!$callarray && is_array($args))
    //         $x = call_user_func($s, $args);
    //     else
    //         $x = call_user_func_array($s, $args);

    //     return $x;
    // }
