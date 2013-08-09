<?php

namespace Chemisus\Collections;

interface SetFilter
{

    /**
     * Returns an array of filtered items.
     *
     * @param             $set
     * @param ValueFilter $value_filter
     *
     * @return mixed[]
     */
    public function filterSet($set, ValueFilter $value_filter);
}