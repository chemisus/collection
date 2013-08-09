<?php

namespace Chemisus\Collections;

class ArraySetMapper implements SetMapper
{

    /**
     * Returns a set of values after they have been mapped.
     *
     * @param             $set
     * @param ValueMapper $value_mapper
     *
     * @return mixed[]
     */
    public function mapSet($set, ValueMapper $value_mapper)
    {
        $results = [];

        foreach ($set as $key => $value) {
            $results[$key] = $value_mapper->mapValue($value, $key);
        }

        return $results;
    }
}