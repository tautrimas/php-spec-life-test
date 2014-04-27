<?php

namespace Life;

class Matrix
{
    /**
     * @var array
     */
    private $matrix;

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

    public function initMatrix($sizeX, $sizeY)
    {
        $this->matrix = [];

        foreach (range(1, $sizeY) as $y) {
            $this->matrix[$y - 1] = [];
            foreach (range(1, $sizeX) as $x) {
                $this->matrix[$y - 1][] = 0;
            }
        }
    }

    /**
     * @return array
     */
    public function getMatrix()
    {
        return $this->matrix;
    }
}
