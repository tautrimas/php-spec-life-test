<?php

namespace spec\Life;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MatrixSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Life\Matrix');
    }

    function it_tells_new_cells_state()
    {
        $this->calculateNewState(1, 0)->shouldReturn(0);
        $this->calculateNewState(1, 1)->shouldReturn(0);
        $this->calculateNewState(1, 2)->shouldReturn(1);
        $this->calculateNewState(1, 3)->shouldReturn(1);
        $this->calculateNewState(1, 4)->shouldReturn(0);
        // 5..7
        $this->calculateNewState(1, 8)->shouldReturn(0);

        $this->calculateNewState(0, 3)->shouldReturn(1);
    }

    function it_can_initialize_empty_world()
    {
        $this->initMatrix(2, 3)->shouldReturn(null);
        $world = [[0, 0], [0, 0], [0, 0]];
        $this->getWorld()->shouldReturn($world);
    }

    function it_can_tell_neighbour_coordinates()
    {
        $world = [
            [0, 0, 0, 0],
            [0, 0, 0, 0],
            [0, 0, 0, 0],
            [0, 0, 0, 0],
        ];
        $this->setWorld($world);


        $this->getNeighbours([0, 0])->shouldReturn(
            [
                [1, 0],
                [0, 1],
                [1, 1],
            ]
        );

        $this->getNeighbours([1, 1])->shouldReturn(
            [
                [0, 0],
                [1, 0],
                [2, 0],
                [0, 1],
                [2, 1],
                [0, 2],
                [1, 2],
                [2, 2],
            ]
        );
    }

    function it_can_count_alive_neighbours()
    {
        $world = [
            [0, 0, 0, 0],
            [0, 1, 0, 0],
            [0, 1, 0, 1],
            [0, 0, 0, 0],
        ];
        $this->setWorld($world);
        $this->countAliveNeighbours([2, 2])->shouldReturn(3);
    }

    function it_can_calculate_new_state()
    {
        $world = [
            [0, 0, 0, 0, 0, 0],
            [0, 1, 1, 0, 0, 0],
            [0, 1, 0, 0, 0, 0],
            [0, 0, 0, 0, 1, 0],
            [0, 0, 0, 1, 1, 0],
            [0, 0, 0, 0, 0, 0],
        ];
        $this->setWorld($world);

        $expectedWorld = [
            [0, 0, 0, 0, 0, 0],
            [0, 1, 1, 0, 0, 0],
            [0, 1, 1, 0, 0, 0],
            [0, 0, 0, 1, 1, 0],
            [0, 0, 0, 1, 1, 0],
            [0, 0, 0, 0, 0, 0],
        ];
        $this->step();
        $this->getWorld()->shouldReturn($expectedWorld);
    }
}
