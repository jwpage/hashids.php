<?php

/*
 * This file is part of Hashids.
 *
 * (c) Ivan Akimov <ivan@barreleye.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hashids;

use Hashids\Math\MathInterface;

/**
 * This is the math class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 * @author Jakub Kramarz <lenwe@lenwe.net>
 * @deprecated no longer used in internal code, provided only for backwards
 * compatibility
 */
class Math
{
    /**
     * Add two arbitrary-length integers.
     *
     * @param string $a
     * @param string $b
     *
     * @return string
     */
    public static function add($a, $b)
    {
        return self::getMathInstance()->add($a, $b);
    }

    /**
     * Multiply two arbitrary-length integers.
     *
     * @param string $a
     * @param string $b
     *
     * @return string
     */
    public static function multiply($a, $b)
    {
        return self::getMathInstance()->multiply($a, $b);
    }

    /**
     * Divide two arbitrary-length integers.
     *
     * @param string $a
     * @param string $b
     *
     * @return string
     */
    public static function divide($a, $b)
    {
        return self::getMathInstance()->divide($a, $b);
    }

    /**
     * Compute arbitrary-length integer modulo.
     *
     * @param string $n
     * @param string $d
     *
     * @return string
     */
    public static function mod($n, $d)
    {
        return self::getMathInstance()->mod($n, $d);
    }

    /**
     * Compares two arbitrary-length integers.
     *
     * @param string $a
     * @param string $b
     *
     * @return bool
     */
    public static function greaterThan($a, $b)
    {
        return self::getMathInstance()->greaterThan($a, $b);
    }

    /**
     * Converts arbitrary-length integer to PHP integer.
     *
     * @param string $a
     *
     * @return int
     */
    public static function intval($a)
    {
        return self::getMathInstance()->intval($a);
    }

    /**
     * Converts arbitrary-length integer to PHP string.
     *
     * @param string $a
     *
     * @return string
     */
    public static function strval($a)
    {
        return self::getMathInstance()->strval($a);
    }

    /**
     * Converts PHP integer to arbitrary-length integer.
     *
     * @param int $a
     *
     * @return string
     */
    public static function get($a)
    {
        return self::getMathInstance()->get($a);
    }

    /**
     * Create an instance of MathInterface depending on available extensions.
     *
     * @return MathInterface
     */
    protected static function getMathInstance()
    {
        if (extension_loaded('gmp')) {
            return new Gmp();
        } elseif (extension_loaded('bcmath')) {
            return new Bc();
        } else {
            throw new RuntimeException('Missing BC Math or GMP extension.');
        }
    }
}
