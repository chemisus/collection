<?php

namespace Chemisus\Collections;

interface ValueJoinFilter
{

    /**
     * Checks to see if two values should be joined together.
     *
     * @param $left
     * @param $right
     *
     * @return boolean
     */
    public function valueJoinFilter($left, $right);
}