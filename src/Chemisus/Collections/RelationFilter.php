<?php

namespace Chemisus\Collections;

class RelationFilter implements ValueJoinFilter
{

    private $left_keys;

    private $right_keys;

    public function __construct($left_keys, $right_keys)
    {
        $this->left_keys  = $left_keys;
        $this->right_keys = $right_keys;
    }

    /**
     * Checks to see if two values should be joined together.
     *
     * @param $left
     * @param $right
     *
     * @return boolean
     */
    public function valueJoinFilter($left, $right)
    {
        foreach ($this->left_keys as $key) {
            $left = $left[$key];
        }

        foreach ($this->right_keys as $key) {
            $right = $right[$key];
        }

        return $left === $right;
    }
}