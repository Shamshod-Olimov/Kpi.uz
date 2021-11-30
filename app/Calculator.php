<?php

namespace App;

/**
 * Calculator operation model.
 *
 * @package App
 */
class Calculator
{
    /**
     * Sum the given numbers and return the result.
     *
     * @param  int $a
     * @param  int $b
     * @param  int $c
     * @param  int $d
     */
    public function all(int $a, int $b, int $c, int $d): int
    {
        return $a + $b + $c + $d;   
    }

       /**
     * Sum the given numbers and return the result.
     *
     * @param  int $a
     * @param  int $b
     * @param  int $c
     * @param  int $d
     */
    public function percent(int $a, int $b, int $c, int $d): int
    {
        return floor(100 * ($a + $b + $c + $d) / 200);
    }
}

