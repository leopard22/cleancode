<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 08/02/18
 * Time: 12:38
 */

namespace Selenium\Test;

use PHPUnit_Extensions_Selenium2TestCase;


class SigninTest extends PHPUnit_Extensions_Selenium2TestCase
{
    const BASE_URL ='http://192.168.8.22:8080';

    public function setUp()
    {
        $this->setHost('127.0.0.1');
        $this->setPort(4444);
        //$this->setBrowserUrl('http://127.0.0.1/cleancode');
        $this->setBrowserUrl(self::BASE_URL);
        $this->setBrowser('chrome');
    }

    public function testFormAction(){
        $this->url('signin.php');
        $form = $this->byTag('form');
        $this->assertEquals(self::BASE_URL.'/signin.php',$form->attribute('action'));
    }

    public function testFormMethod(){
        $this->url('signin.php');
        $form = $this->byTag('form');
        $this->assertEquals('post',$form->attribute('method'));
    }


    public function testSigninShownForm(){
        $this->url('signin.php');

        $username = $this->byName('username');
        $password = $this->byName('password');

        $this->assertEquals('',$username->value());
        $this->assertEquals('',$password->value());
    }

    public function testNoValidForm(){
        $this->url('signin.php');
        $form = $this->byTag('form');

        $username = $this->byName('username')->value('nathan');
        $password = $this->byName('password')->value('aaaa');

        $form->submit();

        $this->assertEquals('signin',$this->title());

    }



   /* public function testSigninWithNotValid(){
        $this->url('signin.php');

        $username = $this->byName('username');
        $password = $this->byName('password');
    }*/


}