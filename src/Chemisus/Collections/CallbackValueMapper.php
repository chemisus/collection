<?php

namespace Chemisus\Collections;

class CallbackValueMapper extends CallbackValueTemplate implements ValueMapper
{

    /**
     * Returns a value after it has been mapped.
     *
     * @param $value
     * @param $key
     *
     * @return mixed
     */
    public function mapValue($value, $key)
    {
        $callback = $this->callback();

        return $callback($value, $key);
    }
}