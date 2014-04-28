<?php

namespace Life;

class Printer
{
    public function printWorld(World $world)
    {
        $output = "";
        foreach ($world->getWorld() as $line) {
            foreach ($line as $cell) {
                $output .= $cell ? '1' : ' ';
            }
            $output .= PHP_EOL;
        }

        return $output;
    }
}
