<?php

namespace Chemisus\Collections;

interface SetJoiner
{

    /**
     * Returns a set of values after the two sets have been joined together.
     *
     * @param                 $lefts
     * @param                 $rights
     * @param ValueJoinFilter $value_join_filter
     * @param ValueJoinMapper $value_join_mapper
     *
     * @return mixed
     */
    public function joinSet($lefts, $rights, ValueJoinFilter $value_join_filter, ValueJoinMapper $value_join_mapper);
}