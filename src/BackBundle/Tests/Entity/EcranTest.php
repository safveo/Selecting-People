<?php
/**
 * Created by PhpStorm.
 * User: safa.belkacem
 * Date: 04/10/2017
 * Time: 22:21
 */

namespace BackBundle\Tests\Entity;


use BackBundle\Entity\Ecran;


class EcranTest extends \PHPUnit_Framework_TestCase
{

    public function testTalk() {
        $expected = "Hello world!";

        $this->assertEquals($expected,"Hello world");
    }
}