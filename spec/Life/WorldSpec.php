<?php

namespace spec\Life;

use Life\CellService;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WorldSpec extends ObjectBehavior
{
    function let()
    {
        $cellService = new CellService();
        $this->beConstructedWith($cellService);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Life\World');
    }

    function it_can_initialize_empty_world()
    {
        $this->initMatrix(2, 3)->shouldReturn(null);
        $world = [[0, 0], [0, 0], [0, 0]];
        $this->getWorld()->shouldReturn($world);
    }

    function it_can_tell_cells_neighbour_coordinates()
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
        $this->step()->shouldReturn($expectedWorld);
    }
}
