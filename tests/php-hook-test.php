<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class php_hook_test extends TestCase
{
    public static $check = "0";
    public static $check2 = "0";

    public function testPredicate(): void {
        $this->assertTrue(php_hook::is_hook("php:x"));
        $this->assertFalse(php_hook::is_hook("x"));

        $this->assertTrue(php_hook::has_args("php:x,3"));
        $this->assertFalse(php_hook::has_args("php:x"));
        $this->assertFalse(php_hook::has_args("x"));
    }


    public function testCallNoArgs(): void {
        php_hook::call("php:php_hook_test::setValue");
        $this->assertEquals('', self::$check);
    }

    public function testCall(): void {
        self::$check = 4;
        php_hook::call("php:php_hook_test::setValue,44");
        $this->assertEquals("44", self::$check);
    }

    public function testMulti(): void {
        php_hook::call("php:php_hook_test::setValue,44,abc");
        $this->assertEquals("abc", self::$check2);
    }

    public static function setValue($doCheck = "3", $doCheck2 = null): void {
        // print "\ndoCheck=$doCheck, doCheck2=$doCheck2";
        self::$check = $doCheck;
        if ($doCheck2 != null) self::$check2 = $doCheck2;
    }
}
