<?php

namespace Chemisus\Collections;

interface ValueMapper
{

    /**
     * Returns a value after it has been mapped.
     *
     * @param $value
     * @param $key
     *
     * @return mixed
     */
    public function mapValue($value, $key);
}