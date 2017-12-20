<?php
/**
 * Created by PhpStorm.
 * User: safa.belkacem
 * Date: 04/10/2017
 * Time: 22:40
 */

namespace FrontBundle\Tests\Controller;


use FrontBundle\Controller\StatController;


class StatControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testTalk() {
        $expected = "Hello world!";

        $this->assertEquals($expected,"Hello world!");
    }

}
