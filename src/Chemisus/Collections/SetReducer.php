<?php

namespace Chemisus\Collections;

interface SetReducer
{

    /**
     * Returns a value after it has been reduced with the initial value.
     *
     * @param              $initial
     * @param              $set
     * @param ValueReducer $value_reducer
     *
     * @return mixed
     */
    public function reduceSet($initial, $set, ValueReducer $value_reducer);
}