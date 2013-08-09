<?php

namespace Test\Chemisus\Collections;

use Chemisus\Collections\ArraySetJoiner;
use Chemisus\Collections\CallbackValueJoinFilter;
use Chemisus\Collections\CallbackValueJoinMapper;
use Chemisus\Collections\Relation;
use Chemisus\Collections\RelationFilter;
use Chemisus\Collections\RelationMapper;
use PHPUnit_Framework_TestCase;

class ScenarioTest extends PHPUnit_Framework_TestCase
{

    private $database = [
        'users'   => [
            ['id' => 1, 'name' => 'user_a'],
            ['id' => 2, 'name' => 'user_b'],
            ['id' => 3, 'name' => 'user_c'],
            ['id' => 4, 'name' => 'user_d'],
        ],
        'threads' => [
            ['id' => 1, 'parent_id' => null, 'user_id' => 1, 'text' => 'thread_a'],
            ['id' => 2, 'parent_id' => 1, 'user_id' => 2, 'text' => 'thread_b'],
            ['id' => 3, 'parent_id' => 1, 'user_id' => 3, 'text' => 'thread_c'],
            ['id' => 4, 'parent_id' => 2, 'user_id' => 4, 'text' => 'thread_d'],
            ['id' => 5, 'parent_id' => 4, 'user_id' => 1, 'text' => 'thread_e'],
            ['id' => 6, 'parent_id' => null, 'user_id' => 2, 'text' => 'thread_f'],
            ['id' => 7, 'parent_id' => 6, 'user_id' => 2, 'text' => 'thread_g'],
            ['id' => 8, 'parent_id' => 7, 'user_id' => 1, 'text' => 'thread_h'],
            ['id' => 9, 'parent_id' => 3, 'user_id' => 4, 'text' => 'thread_i'],
        ]
    ];

    public function testDatabase()
    {

        $one_to_many = function ($lefts, $left_key, $rights, $right_key, $join_as) {
            $joiner = new ArraySetJoiner();

            return $joiner->joinSet(
                $lefts,
                $rights,
                new CallbackValueJoinFilter(
                    function ($left, $right) use ($left_key, $right_key) {
                        return $left[$left_key] === $right[$right_key];
                    }
                ),
                new CallbackValueJoinMapper(
                    function ($left, $rights) use ($join_as) {
                        $left[$join_as] = $rights;

                        return $left;
                    }
                )
            );
        };

        $one_to_one = function ($lefts, $left_key, $rights, $right_key, $join_as) {
            $joiner = new ArraySetJoiner();

            return $joiner->joinSet(
                $lefts,
                $rights,
                new CallbackValueJoinFilter(
                    function ($left, $right) use ($left_key, $right_key) {
                        return $left[$left_key] === $right[$right_key];
                    }
                ),
                new CallbackValueJoinMapper(
                    function ($left, $rights) use ($join_as) {
                        $left[$join_as] = array_shift($rights);

                        return $left;
                    }
                )
            );
        };

        $threads = $one_to_one($this->database['threads'], 'user_id', $this->database['users'], 'id', 'author');

        $users = $one_to_many($this->database['users'], 'id', $this->database['threads'], 'user_id', 'threads');

        print_r($users);
    }

    public function testA()
    {
        $join = new ArraySetJoiner();

        $users = $join->joinSet(
            $this->database['users'],
            $this->database['threads'],
            new RelationFilter(['id'], ['user_id']),
            new RelationMapper('threads')
        );

        print_r($users);
    }

    public function testB()
    {
        $relation = new Relation(
            $this->database,
            'users',
            ['id'],
            'threads',
            ['user_id'],
            'threads'
        );

        $users = $relation->get();

        print_r($users);
    }
}
