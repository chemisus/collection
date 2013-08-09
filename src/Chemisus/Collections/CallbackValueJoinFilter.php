<?php

namespace Chemisus\Collections;

class CallbackValueJoinFilter extends CallbackValueTemplate implements ValueJoinFilter
{


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
        $callback = $this->callback();

        return $callback($left, $right);
    }
}