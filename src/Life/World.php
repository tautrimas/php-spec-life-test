<?php

namespace Life;

class World
{
    /**
     * @var array
     */
    private $world;

    /**
     * @var CellService
     */
    private $cellService;

    /**
     * @param CellService $cellService
     */
    public function __construct($cellService)
    {
        $this->cellService = $cellService;
    }

    public function initMatrix($sizeX, $sizeY)
    {
        $this->world = [];

        foreach (range(1, $sizeY) as $y) {
            $this->world[$y - 1] = [];
            foreach (range(1, $sizeX) as $x) {
                $this->world[$y - 1][$x - 1] = 0;
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

        foreach (range(max(0, $y - 1), min($y + 1, $countY - 1)) as $cy) {
            foreach (range(max(0, $x - 1), min($x + 1, $countX - 1)) as $cx) {
                if (!($x === $cx && $y === $cy)) {
                    $neighbours[] = [$cx, $cy];
                }
            }
        }

        return $neighbours;
    }

    public function step()
    {
        $tempWorld = array();
        $sizeY = count($this->world);
        $sizeX = count($this->world[0]);

        foreach (range(1, $sizeY) as $y) {
            $tempWorld[$y - 1] = [];
            foreach (range(1, $sizeX) as $x) {
                $neighCount = $this->countAliveNeighbours([$x - 1, $y - 1]);
                $tempWorld[$y - 1][] = $this->calculateNewState($this->world[$y - 1][$x - 1], $neighCount);
            }
        }

        return $tempWorld;
    }

    public function countAliveNeighbours($pos)
    {
        $neighs = $this->getNeighbours($pos);
        $world = $this->world;
        $neighsValues = array_map(
            function (array $coords) use ($world) {
                list($x, $y) = $coords;
                return $world[$y][$x];
            },
            $neighs
        );
        return array_sum($neighsValues);
    }

    private function calculateNewState($param, $neighCount)
    {
        return $this->cellService->calculateNewState($param, $neighCount);
    }
}
