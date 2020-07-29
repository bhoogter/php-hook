<?php

class php_hook
{
    public const PREFIX = "php:";

    public static function is_php_hook($f) { return is_string($f) && substr($f, 0, 4) == self::PREFIX; }
    public static function php_hook_has_args($f) { return self::is_php_hook($f) && strpos($f, ",") !== false; }
    public static function has_args($f) {return self::php_hook_has_args($f);}
    public static function is_hook($f) {return self::is_php_hook($f);}
    
    public static function get_callable($f) {
        if (!self::is_hook($f)) return null;
        if (self::has_args($f)) {
            $S = explode(",", $f);
            $f = $S[0];
        }
        return substr($f, strlen(self::PREFIX));
    }
    
    public static function call($f, $args = "", $callarray = false) {return self::invoke($f, $args, $callarray);}
    public static function invoke($f, $args = "", $callarray = false)
    {
        //print "<br/>zoSource::php_hook($f, $args)";
        if (!self::is_php_hook($f)) return $f;
        $s = substr($f, strlen(self::PREFIX));

        $S = explode(",", $s);
        $s = $S[0];
        if (!is_callable($s)) throw new Exception("php_hook [$s] is not callable.");

        if (count($S) > 1) {
            $a = [];
            $n = 0;
            foreach ($S as $ss) {
                if (++$n == 1) continue;
                if ($ss[0] != "@") $v = $ss;
                else {
                    $sst = substr($ss, 1);
                    if (is_array($args)) $v = $args[$sst];
                    else {
                        $AA = parse_str($args, $sst);;
                        $v = $AA[$ss];
                    }
                }
                $a[] = $v;
            }
            $args = $a;
            //print "<br/>";print_r($a);
            $callarray = true;
        }

        // print "<br/>php_hook.......$s, callarray=".($callarray?"Y":"N").", is_array(args)?".(is_array($args)?"Y":"N").", v=".((!$callarray && is_array($args))?"Y":"N");print_r($args);
        if ($callarray && is_array($a))
            $x = call_user_func_array($s, $args);
        else
            $x = call_user_func($s, $args);

        return $x;
    }
}
