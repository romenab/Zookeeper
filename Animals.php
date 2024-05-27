<?php

class Animals
{
    public string $name;
    public string $likesFood;
    public int $happiness;
    public int $foodReserves;

    public function __construct(string $name, string $likesFood, int $happiness, int $foodReserves)
    {
        $this->name = $name;
        $this->likesFood = $likesFood;
        $this->happiness = $happiness;
        $this->foodReserves = $foodReserves;
    }
    private function minMax(int $value): int
    {
        return max(0, min(100, $value));
    }

    public function play(): void
    {
        $valuePlay = 5;
        $this->happiness = $this->minMax($this->happiness + $valuePlay);
        $this->foodReserves = $this->minMax($this->foodReserves - $valuePlay);
    }

    public function work(): void
    {
        $valueWork = 10;
        $this->happiness = $this->minMax($this->happiness - $valueWork);
        $this->foodReserves = $this->minMax($this->foodReserves - $valueWork);
    }

    public function feed(string $userFood): void
    {
        $valueFeed = 5;
        if (strtolower($this->likesFood) === $userFood) {
            $this->foodReserves = $this->minMax($this->foodReserves + $valueFeed);
        } else {
            $this->happiness = $this->minMax($this->happiness - $valueFeed);
            $this->foodReserves = $this->minMax($this->foodReserves - $valueFeed * 2);
        }
    }

    public function pet(): void
    {
        $valuePet = 5;
        $this->happiness = $this->minMax($this->happiness + $valuePet);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLikesFood(): string
    {
        return $this->likesFood;
    }

    public function getHappiness(): int
    {
        return $this->happiness;
    }

    public function getFoodReserves(): int
    {
        return $this->foodReserves;
    }
}