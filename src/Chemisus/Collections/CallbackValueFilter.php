<?php

namespace Chemisus\Collections;

class CallbackValueFilter extends CallbackValueTemplate implements ValueFilter
{

    /**
     * Returns a boolean representing if the value should be filtered or not.
     *
     * @param $value
     * @param $key
     *
     * @return boolean
     */
    public function filterValue($value, $key)
    {
        $callback = $this->callback();

        return $callback($value, $key);
    }
}