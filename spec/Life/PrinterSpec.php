<?php

namespace spec\Life;

use Life\World;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PrinterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Life\Printer');
    }

    function it_can_print_world(World $world)
    {
        $matrix = [
            [0, 0, 0, 0, 0, 0],
            [0, 1, 1, 0, 0, 0],
            [0, 1, 1, 0, 0, 0],
            [0, 0, 0, 1, 1, 0],
            [0, 0, 0, 1, 1, 0],
            [0, 0, 0, 0, 0, 0],
        ];
        $world->getWorld()->willReturn($matrix);

        $expectedString = "      \n 11   \n 11   \n   11 \n   11 \n      \n";
        $this->printWorld($world)->shouldReturn($expectedString);
    }
}
