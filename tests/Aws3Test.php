<?php
/**
 * Aws3
 *
 * @link      https://github.com/adrorocker/php-firebase
 * @copyright Copyright (c) 2017 Adro Rocker
 * @author    Adro Rocker <alejandro.morelos@jarwebdev.com>
 */

namespace Adrosoftware;

use Adrosoftware\Aws3;

use PHPUnit\Framework\TestCase;

class Aws3Test extends TestCase
{
    public function testConstructor()
    {
        $s3 = new Aws3();
        $this->assertInstanceOf('Adrosoftware\Aws3', $s3);
    }
}