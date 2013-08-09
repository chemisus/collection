<?php

namespace Test\Chemisus\Collections;

use Chemisus\Collections\ArraySetReducer;
use Chemisus\Collections\CallbackValueReducer;
use PHPUnit_Framework_TestCase;

class ArraySetReducerTest extends PHPUnit_Framework_TestCase
{

    public function testReduceSet()
    {
        $set = ['a' => 'A', 'b' => 'B', 'c' => 'C'];

        $expect = 'ZaAbBcC';

        $set_reducer = new ArraySetReducer();

        $actual = $set_reducer->reduceSet(
            'Z',
            $set,
            new CallbackValueReducer(
                function ($initial, $value, $key) {
                    return $initial . $key . $value;
                }
            )
        );

        $this->assertEquals($expect, $actual);
    }
}
