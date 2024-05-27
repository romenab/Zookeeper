<?php

require_once 'vendor/autoload.php';

use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Output\ConsoleOutput;
use Carbon\Carbon;

class Game
{
    public array $animals;

    public function __construct(array $animals)
    {
        $this->animals = $animals;
    }

    public function getAnimals(): void
    {
        $output = new ConsoleOutput();
        $table = new Table($output);

        $table->setHeaders(['Animal', 'Likes Food', 'Happiness', 'Food Reserves']);

        foreach ($this->animals as $animal) {
            $table->addRow([
                $animal->name,
                $animal->likesFood,
                $animal->happiness,
                $animal->foodReserves
            ]);
        }

        $table->render();
    }
    public function time($userAnimal, $userAction): void
    {
        $countdown = 6;
        $endTime = Carbon::now()->addSeconds($countdown);
        while (Carbon::now()->lessThanOrEqualTo($endTime)) {
            $remaining = $endTime->diffInSeconds(Carbon::now());
            echo trim(ucfirst($userAnimal)) . " " . trim($userAction) ."ing for $remaining seconds.." . PHP_EOL;
            sleep(1);
        }
    }

    public function chooseAction(string $userAction, string $userAnimal): void
    {
        foreach ($this->animals as $animal) {
            if (strtolower($animal->name) == $userAnimal) {
                switch ($userAction) {
                    case "play":
                        $this->time($userAnimal, $userAction);
                        $animal->play();
                        break;
                    case "work":
                        $this->time($userAnimal, $userAction);
                        $animal->work();
                        break;
                    case "feed":
                        $userFood = trim(strtolower(readline("Enter food to feed the animal: ")));
                        $this->time($userAnimal, $userAction);
                        $animal->feed($userFood);
                        break;
                    case "pet":
                        $this->time($userAnimal, $userAction);
                        $animal->pet();
                        break;
                    default:
                        echo "Invalid input!" . PHP_EOL;
                }
                break;
            }
        }
        $this->getAnimals();
    }
}