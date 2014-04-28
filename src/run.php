<?php

require_once "../vendor/autoload.php";

function main()
{
    $world = new \Life\World(new \Life\CellService());
    $world->setWorld([
            [0, 0, 0, 0, 0, 0],
            [0, 1, 0, 0, 0, 0],
            [0, 1, 0, 0, 0, 0],
            [0, 0, 0, 1, 1, 0],
            [0, 0, 0, 1, 1, 0],
            [0, 0, 0, 0, 0, 0],
        ]);
    $printer = new \Life\Printer();
    while (true) {
        $world->setWorld($world->step());
        print $printer->printWorld($world);
        print PHP_EOL;
        sleep(1);
    }
}

main();
