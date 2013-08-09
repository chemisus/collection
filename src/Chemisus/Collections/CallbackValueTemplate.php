<?php

namespace Chemisus\Collections;

abstract class CallbackValueTemplate
{
    private $callback;

    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    public function callback()
    {
        return $this->callback;
    }
}