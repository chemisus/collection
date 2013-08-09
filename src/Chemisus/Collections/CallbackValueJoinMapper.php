<?php

namespace Chemisus\Collections;

class CallbackValueJoinMapper extends CallbackValueTemplate implements ValueJoinMapper
{

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
        $callback = $this->callback();

        return $callback($left, $rights);
    }
}