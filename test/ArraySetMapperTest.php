<?php

namespace Test\Chemisus\Collections;

use Chemisus\Collections\ArraySetMapper;
use Chemisus\Collections\CallbackValueMapper;
use PHPUnit_Framework_TestCase;

class ArraySetMapperTest extends PHPUnit_Framework_TestCase
{

    public function testMapSet()
    {
        $set = ['a' => 'A', 'b' => 'B', 'c' => 'C'];

        $expect = ['a' => 'aA', 'b' => 'bB', 'c' => 'cC'];

        $set_mapper = new ArraySetMapper();

        $actual = $set_mapper->mapSet(
            $set,
            new CallbackValueMapper(
                function ($value, $key) {
                    return $key . $value;
                }
            )
        );

        $this->assertEquals($expect, $actual);
    }
}
