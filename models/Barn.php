<?php

namespace models;

use models\animals\Cow;
use models\animals\Hen;

class Barn
{
    public array $animals = [
        'cows' => [],
        'hens' => [],
    ];

    public array $production = [
        'milk' => 0,
        'eggs' => 0,
    ];

    /**
     * @param int $numOfCows
     * @param int $numOfHens
     */
    public function __construct(int $numOfCows = 0, int $numOfHens = 0)
    {
        $this->addCows($numOfCows);
        $this->addHens($numOfHens);
    }

    /**
     * @param int $num
     */
    public function addCows(int $num)
    {
        $this->animals['cows'] = Cow::getAnimals($num);
    }

    /**
     * @param int $num
     */
    public function addHens(int $num)
    {
        $this->animals['hens'] = Hen::getAnimals($num);
    }

    /**
     * @param int ...$ids
     */
    public function deleteCows(int ...$ids)
    {
        foreach ($ids as $id) {
            foreach ($this->animals['cows'] as $cowId => $cow) {
                if ($id == $cowId) {
                    unset($this->animals['cows'][$cowId]);
                }
            }
        }
    }

    /**
     * @param int ...$ids
     */
    public function deleteHens(int ...$ids)
    {
        foreach ($ids as $id) {
            foreach ($this->animals['hens'] as $henId => $cow) {
                if ($id == $henId) {
                    unset($this->animals['hens'][$henId]);
                }
            }
        }
    }

    /**
     * @return array|int[]
     */
    public function getProduction(): array
    {
        $this->production['milk'] = $this->getAllMilk();
        $this->production['eggs'] = $this->getAllEggs();
        return $this->production;
    }

    /**
     * @return int
     */
    public function getAllMilk(): int
    {
        foreach ($this->animals['cows'] as $cowId => $cow) {
            $this->getMilk($cowId);
        }
        return $this->production['milk'];
    }

    /**
     * @param $cowId
     * @return false|int
     */
    public function getMilk($cowId)
    {
        if ( !isset($this->animals['cows'][$cowId]) ) {
            return false;
        }
        $milk = $this->animals['cows'][$cowId]->giveMilk();
        $this->production['milk'] += $milk;
        return $this->production['milk'];
    }

    /**
     * @return int
     */
    public function getAllEggs(): int
    {
        foreach ($this->animals['hens'] as $henId => $hen) {
            $this->getEggs($henId);
        }
        return $this->production['eggs'];
    }

    /**
     * @param $henId
     * @return false|int
     */
    public function getEggs($henId)
    {
        if ( !isset($this->animals['hens'][$henId]) ) {
            return false;
        }
        $eggs = $this->animals['hens'][$henId]->giveEggs();
        $this->production['eggs'] += $eggs;
        return $this->production['eggs'];
    }

    /**
     * @return array|int[]
     */
    public function countProduction(): array
    {
        return $this->production;
    }

    /**
     * @return int
     */
    public function countMilk(): int
    {
        return $this->production['milk'];
    }

    /**
     * @return int
     */
    public function countEggs(): int
    {
        return $this->production['eggs'];
    }
}