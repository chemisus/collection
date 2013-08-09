<?php

namespace Chemisus\Collections;

use mixed;

class RelationMapper implements ValueJoinMapper
{

    private $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    /**
     * Returns the left value after it has been joined with the right values.
     *
     * @param         $left
     * @param mixed[] $rights
     *
     * @return mixed
     */
    public function valueJoinMap($left, array $rights)
    {
        $left[$this->key] = $rights;

        return $left;
    }
}