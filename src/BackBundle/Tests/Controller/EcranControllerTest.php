<?php

namespace BackBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EcranControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testTalk() {
        $expected = "Hello world!";

        $this->assertEquals($expected,"Hello world!");
    }
}
