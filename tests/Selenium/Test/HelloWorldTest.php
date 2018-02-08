<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 08/02/18
 * Time: 11:40
 */

namespace Selenium\Test;

use PHPUnit_Extensions_Selenium2TestCase;

class HelloWorldTest extends PHPUnit_Extensions_Selenium2TestCase
{
    public function setUp()
    {
        $this->setHost('127.0.0.1');
        $this->setPort(4444);
        //$this->setBrowserUrl('http://127.0.0.1/cleancode');
        $this->setBrowserUrl('http://192.168.8.22:8080');
        $this->setBrowser('chrome');
    }

    public function testHelloWorld()
    {
//        $this->assertTrue(true);
        $this->url('index.php');
        $text = $this->byTag("h1")->text();
        $this->assertEquals("hello", $text);
    }

}