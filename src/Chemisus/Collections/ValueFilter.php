<?php

namespace Chemisus\Collections;

interface ValueFilter
{

    /**
     * Returns a boolean representing if the value should be filtered or not.
     *
     * @param $value
     * @param $key
     *
     * @return boolean
     */
    public function filterValue($value, $key);
}