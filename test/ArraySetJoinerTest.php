<?php

namespace Test\Chemisus\Collections;

use Chemisus\Collections\ArraySetJoiner;
use Chemisus\Collections\CallbackValueJoinFilter;
use Chemisus\Collections\CallbackValueJoinMapper;
use PHPUnit_Framework_TestCase;

class ArraySetJoinerTest extends PHPUnit_Framework_TestCase
{

    public function testJoinSetLeftToRight()
    {
        $lefts = [
            ['id' => 1, 'title' => 'left_a'],
            ['id' => 2, 'title' => 'left_b'],
            ['id' => 3, 'title' => 'left_c'],
            ['id' => 4, 'title' => 'left_d'],
        ];

        $rights = [
            ['id' => 1, 'title' => 'right_a', 'left_id' => 1],
            ['id' => 2, 'title' => 'right_b', 'left_id' => 1],
            ['id' => 3, 'title' => 'right_c', 'left_id' => 1],
            ['id' => 4, 'title' => 'right_d', 'left_id' => 2],
            ['id' => 5, 'title' => 'right_e', 'left_id' => 2],
            ['id' => 6, 'title' => 'right_f', 'left_id' => 3],
        ];

        $expect = [
            [
                'id'     => 1,
                'title'  => 'left_a',
                'rights' => [
                    ['id' => 1, 'title' => 'right_a', 'left_id' => 1],
                    ['id' => 2, 'title' => 'right_b', 'left_id' => 1],
                    ['id' => 3, 'title' => 'right_c', 'left_id' => 1],
                ]
            ],
            [
                'id'     => 2,
                'title'  => 'left_b',
                'rights' => [
                    ['id' => 4, 'title' => 'right_d', 'left_id' => 2],
                    ['id' => 5, 'title' => 'right_e', 'left_id' => 2],
                ]
            ],
            [
                'id'     => 3,
                'title'  => 'left_c',
                'rights' => [
                    ['id' => 6, 'title' => 'right_f', 'left_id' => 3],
                ]
            ],
            [
                'id'     => 4,
                'title'  => 'left_d',
                'rights' => [
                ]
            ],
        ];

        $set_joiner = new ArraySetJoiner();

        $actual = $set_joiner->joinSet(
            $lefts,
            $rights,
            new CallbackValueJoinFilter(
                function ($left, $right) {
                    return $left['id'] === $right['left_id'];
                }
            ),
            new CallbackValueJoinMapper(
                function ($left, array $rights) {
                    $left['rights'] = $rights;

                    return $left;
                }
            )
        );

        $this->assertEquals($expect, $actual);
    }

    public function testJoinSetRightToLeft()
    {
        $lefts = [
            ['id' => 1, 'title' => 'right_a', 'left_id' => 1],
            ['id' => 2, 'title' => 'right_b', 'left_id' => 1],
            ['id' => 3, 'title' => 'right_c', 'left_id' => 1],
            ['id' => 4, 'title' => 'right_d', 'left_id' => 2],
            ['id' => 5, 'title' => 'right_e', 'left_id' => 2],
            ['id' => 6, 'title' => 'right_f', 'left_id' => 3],
        ];

        $rights = [
            ['id' => 1, 'title' => 'left_a'],
            ['id' => 2, 'title' => 'left_b'],
            ['id' => 3, 'title' => 'left_c'],
            ['id' => 4, 'title' => 'left_d'],
        ];

        $expect = [
            [
                'id'      => 1,
                'title'   => 'right_a',
                'left_id' => 1,
                'left'    => [
                    'id'    => 1,
                    'title' => 'left_a',
                ]
            ],
            [
                'id'      => 2,
                'title'   => 'right_b',
                'left_id' => 1,
                'left'    => [
                    'id'    => 1,
                    'title' => 'left_a',
                ]
            ],
            [
                'id'      => 3,
                'title'   => 'right_c',
                'left_id' => 1,
                'left'    => [
                    'id'    => 1,
                    'title' => 'left_a',
                ]
            ],
            [
                'id'      => 4,
                'title'   => 'right_d',
                'left_id' => 2,
                'left'    => [
                    'id'    => 2,
                    'title' => 'left_b',
                ]
            ],
            [
                'id'      => 5,
                'title'   => 'right_e',
                'left_id' => 2,
                'left'    => [
                    'id'    => 2,
                    'title' => 'left_b',
                ]
            ],
            [
                'id'      => 6,
                'title'   => 'right_f',
                'left_id' => 3,
                'left'    => [
                    'id'    => 3,
                    'title' => 'left_c',
                ]
            ],
        ];

        $set_joiner = new ArraySetJoiner();

        $actual = $set_joiner->joinSet(
            $lefts,
            $rights,
            new CallbackValueJoinFilter(
                function ($left, $right) {
                    return $left['left_id'] === $right['id'];
                }
            ),
            new CallbackValueJoinMapper(
                function ($left, array $rights) {
                    $left['left'] = array_shift($rights);

                    return $left;
                }
            )
        );

        $this->assertEquals($expect, $actual);
    }
}
