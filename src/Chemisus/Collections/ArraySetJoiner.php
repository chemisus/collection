<?php

namespace Chemisus\Collections;

class ArraySetJoiner implements SetJoiner
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
    public function joinSet($lefts, $rights, ValueJoinFilter $value_join_filter, ValueJoinMapper $value_join_mapper)
    {
        $joins = [];

        $results = [];

        foreach ($lefts as $key => $left) {
            $joins[$key] = [
                'left' => $left,
                'rights' => []
            ];

            foreach ($rights as $right) {
                if ($value_join_filter->valueJoinFilter($left, $right)) {
                    $joins[$key]['rights'][] = $right;
                }
            }
        }

        foreach ($joins as $join) {
            $results[] = $value_join_mapper->valueJoinMap($join['left'], $join['rights']);
        }

        return $results;
    }
}