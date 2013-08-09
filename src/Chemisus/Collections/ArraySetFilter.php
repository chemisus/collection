<?php

namespace Chemisus\Collections;

use mixed;

class ArraySetFilter implements SetFilter
{

    /**
     * Returns an array of filtered items.
     *
     * @param             $set
     * @param ValueFilter $value_filter
     *
     * @return mixed[]
     */
    public function filterSet($set, ValueFilter $value_filter)
    {
        $results = [];

        foreach ($set as $key => $value) {
            if ($value_filter->filterValue($value, $key)) {
                $results[] = $value;
            }
        }

        return $results;
    }
}