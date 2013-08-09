<?php

namespace Chemisus\Collections;

class CallbackValueReducer extends CallbackValueTemplate implements ValueReducer
{

    /**
     * Returns a value after it has been mapped.
     *
     * @param $initial
     * @param $value
     * @param $key
     *
     * @return mixed
     */
    public function reduceValue($initial, $value, $key)
    {
        $callback = $this->callback();

        return $callback($initial, $value, $key);
    }
}