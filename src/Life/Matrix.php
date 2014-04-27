<?php

namespace Life;

class Matrix
{
    /**
     * @var array
     */
    private $world;

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
        $this->world = [];

        foreach (range(1, $sizeY) as $y) {
            $this->world[$y - 1] = [];
            foreach (range(1, $sizeX) as $x) {
                $this->world[$y - 1][] = 0;
            }
        }
    }

    /**
     * @return array
     */
    public function getWorld()
    {
        return $this->world;
    }

    /**
     * @param array $world
     */
    public function setWorld($world)
    {
        $this->world = $world;
    }

    public function getNeighbours(array $coordinates)
    {
        list($x, $y) = $coordinates;
        $countX = count($this->world[0]);
        $countY = count($this->world);
        $neighbours = [];

        foreach (range(max(0, $y - 1), min($y + 1, $countY)) as $cy) {
            foreach (range(max(0, $x - 1), min($x + 1, $countX)) as $cx) {
                if (!($x === $cx && $y === $cy)) {
                    $neighbours[] = [$cx, $cy];
                }
            }
        }

        return $neighbours;
    }
}
