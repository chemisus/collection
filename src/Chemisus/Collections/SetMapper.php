<?php

namespace Chemisus\Collections;

interface SetMapper
{

    /**
     * Returns a set of values after they have been mapped.
     *
     * @param             $set
     * @param ValueMapper $value_mapper
     *
     * @return mixed[]
     */
    public function mapSet($set, ValueMapper $value_mapper);
}