<?php

namespace Chemisus\Collections;

interface ValueReducer
{

    /**
     * Returns a value after it has been reduced with the initial value.
     *
     * @param $initial
     * @param $value
     * @param $key
     *
     * @return mixed
     */
    public function reduceValue($initial, $value, $key);
}