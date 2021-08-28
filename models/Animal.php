<?php

namespace models;

abstract class Animal
{

    /**
     * @var int
     */
    protected int $id;

    public function __construct()
    {
        $this->id = static::$count++;
    }

    /**
     * @param int $num
     * @return array
     */
    public static function getAnimals(int $num): array
    {
        $animals = [];
        for ($i = 0; $i < $num; $i++) {
            $animals[] = new static;
        }
        return $animals;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}