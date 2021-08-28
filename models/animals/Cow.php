<?php

namespace models\animals;

use models\Animal;

class Cow extends Animal
{
    public static int $count = 0;

    /**
     * @return int
     */
    public function giveMilk(): int
    {
        return mt_rand(8, 12);
    }
}