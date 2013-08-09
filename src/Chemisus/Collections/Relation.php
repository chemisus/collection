<?php

namespace Chemisus\Collections;

class Relation
{

    private $database;

    private $lefts;

    private $rights;

    private $left_keys;

    private $right_keys;

    private $key;

    private $joiner;

    public function __construct($database, $lefts, $left_keys, $rights, $right_keys, $key)
    {
        $this->database   = $database;
        $this->lefts      = $lefts;
        $this->rights     = $rights;
        $this->left_keys  = $left_keys;
        $this->right_keys = $right_keys;
        $this->key        = $key;
        $this->joiner     = new ArraySetJoiner();
    }

    public function get()
    {
        return $this->joiner->joinSet(
            $this->database[$this->lefts],
            $this->database[$this->rights],
            new RelationFilter($this->left_keys, $this->right_keys),
            new RelationMapper($this->key)
        );
    }
}