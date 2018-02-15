<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 15.02.18
 * Time: 11:40
 */


require_once __DIR__ . '/NotificationTest.php';
require_once __DIR__ . '/FireBaseSdkTest.php';

class SuiteTest
{
    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('Suite');
        $suite->addTestSuite('NotificationTest');
        $suite->addTestSuite('FireBaseSdkTest');
        return $suite;
    }
}

class RunAllTests
{
    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('AllTests');
        $suite->addTest(SuiteTest::suite());
        return $suite;
    }
}