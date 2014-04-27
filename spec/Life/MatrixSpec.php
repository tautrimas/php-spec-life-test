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
}
