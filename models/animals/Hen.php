<?php

namespace models\animals;

use models\Animal;

class Hen extends Animal
{
    public static int $count = 0;

    /**
     * @return int
     */
    public function giveEggs(): int
    {
        return mt_rand(0, 1);
    }
}