<?php

namespace Life;

class Matrix
{
    public function calculateNewState($currentState, $count)
    {
        if ($currentState === 0 && $count === 3) {
            return 1;
        }

        if ($currentState === 1) {
            if ($count < 2 || $count > 3) {
                return 0;
            } else {
                return 1;
            }
        }

        return 0;
    }
}
