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
}
