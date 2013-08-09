<?php

namespace Chemisus\Collections;

class ArraySetReducer implements SetReducer
{

    /**
     * Returns a value after it has been reduced with the initial value.
     *
     * @param              $initial
     * @param ValueReducer $set
     * @param ValueReducer $value_reducer
     *
     * @return mixed
     */
    public function reduceSet($initial, $set, ValueReducer $value_reducer)
    {
        $result = $initial;

        foreach ($set as $key => $value) {
            $result = $value_reducer->reduceValue($result, $value, $key);
        }

        return $result;
    }
}