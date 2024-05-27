<?php
require_once "Animals.php";
require_once "Game.php";

$animals = [
    new Animals("Elephant", "Bamboo", 100, 100),
    new Animals("Giraffe", "Leaves", 100, 100),
    new Animals("Lion", "Meat", 100, 100),
    new Animals("Seal", "Fish", 100, 100),
    new Animals("Monkey", "Banana", 100, 100)
];
$show = new Game($animals);
echo "Welcome to Zookeeper!" . PHP_EOL;
$show->getAnimals();
while (true) {
    $userAction = trim(strtolower(readline("Enter your action (Feed, work, play, pet or exit game): ")));
    if ($userAction == "exit") {
        exit("Thank you for playing!");
    }
    $userAnimal = trim(strtolower(readline("Enter the chosen animal: ")));
    $show->chooseAction($userAction, $userAnimal);
}