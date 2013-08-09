<?php

namespace Test\Chemisus\Collections;

use Chemisus\Collections\ArraySetFilter;
use Chemisus\Collections\CallbackValueFilter;
use PHPUnit_Framework_TestCase;

class ArraySetFilterTest extends PHPUnit_Framework_TestCase
{

    public function testFilterSetWithCallbackValueFilter()
    {
        $set = [0, 1, 4, 3, 'a' => 'a', 'c' => 'd'];

        $expect = [0, 1, 3, 'a'];

        $set_filter = new ArraySetFilter();

        $actual = $set_filter->filterSet(
            $set,
            new CallbackValueFilter(
                function ($value, $key) {
                    return $value === $key;
                }
            )
        );

        $this->assertEquals($expect, $actual);
    }
}
