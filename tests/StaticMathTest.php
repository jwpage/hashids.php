<?php

/*
* This file is part of Hashids.
*
* (c) Ivan Akimov <ivan@barreleye.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Hashids\Tests;

use Hashids\Math;
use PHPUnit\Framework\TestCase;

/**
 * This is the math test class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class MathTest extends TestCase
{
    public function testAdd($math)
    {
        $this->assertEquals(Math::get(3), Math::add(1, 2));
    }

    public function testMultiply($math)
    {
        $this->assertEquals(Math::get(12), Math::multiply(2, 6));
    }

    public function testDivide($math)
    {
        $this->assertEquals(Math::get(2), Math::divide(4, 2));
    }

    public function testGreaterThan($math)
    {
        $this->assertTrue(Math::greaterThan('18446744073709551615', '9223372036854775807'));
        $this->assertFalse(Math::greaterThan('9223372036854775807', '18446744073709551615'));
        $this->assertFalse(Math::greaterThan('9223372036854775807', '9223372036854775807'));
    }

    public function testMod($math)
    {
        $this->assertEquals(Math::get(15), Math::mod('18446744073709551615', '100'));
    }

    public function testIntval($math)
    {
        $this->assertSame(9223372036854775807, Math::intval('9223372036854775807'));
    }

    public function testStrval($math)
    {
        $this->assertSame('18446744073709551615', Math::strval(Math::add('0', '18446744073709551615')));
    }
}
