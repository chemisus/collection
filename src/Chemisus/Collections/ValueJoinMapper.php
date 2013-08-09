<?php

namespace Chemisus\Collections;

interface ValueJoinMapper
{

    /**
     * Returns the left value after it has been joined with the right values.
     *
     * @param         $left
     * @param mixed[] $rights
     *
     * @return mixed
     */
    public function valueJoinMap($left, array $rights);
}