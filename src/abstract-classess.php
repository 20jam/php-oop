<?php

// Example 1: ---------------------------------------------------------------------------------
// source:
// https://phpenthusiast.com/object-oriented-php-tutorials/abstract-classes-and-methods
// Context:
// Have an abstract class that has a method to commit child class to define it.

abstract class Car
{
  // Abstract classes can have properties
    protected $tankVolume;
  // Abstract method
    abstract public function milesOnFullTank();
  // Abstract classes can have non abstract methods
    public function setTankVolume($volume)
    {
        $this->tankVolume = $volume;
    }
}

// create class out of abstract class
class Honda extends Car
{
    public function milesOnFullTank()
    {
        return $this->tankVolume * 20;
    }
}

class Toyota extends Car
{

    public function milesOnFullTank()
    {
        return $this->tankVolume * 33;
    }
  // Method specify to this class
    public function getColor()
    {
        return "beige";
    }
}

$hondaCar = new Honda();
$toyotaCar = new Toyota();

// Simulation 1
$toyotaCar->setTankVolume(10);
echo 'This car can drive ' . $toyotaCar->milesOnFullTank() . ' miles on full tank. ' . PHP_EOL;
echo "\nThis car is of " . $toyotaCar->getColor() . ' color.' . PHP_EOL;

// Simulation 2
$hondaCar->setTankVolume(30);
echo "\nThis car can drive " . $hondaCar->milesOnFullTank() . ' miles on full tank. ' . PHP_EOL;

// Example 2: ---------------------------------------------------------------------------------
// Context:
// Animal

abstract class Animal
{
    // Methods
    abstract public function eat(string $food): bool;

    abstract public function talk(bool $shout): string;

    // non-abstract method.
    public function walk(int $speed): bool
    {
        if ($speed > 0) {
            return true;
        } else {
            return false;
        }
    }
}

class Cat extends Animal
{
    // Methods
    public function eat(string $food): bool
    {
        if ($food === "tuna") {
            return true;
        } else {
            return false;
        }
    }

    public function talk(bool $shout): string
    {
        if ($shout === true) {
            return "MEOW!\n";
        } else {
            return "Meow.\n";
        }
    }
}

class Dog extends Animal
{
    // Methods
    public function eat(string $food): bool
    {
        if (($food === "dog food") || ($food === "meat")) {
            return true;
        } else {
            return false;
        }
        ;
    }

    public function talk(bool $shout): string
    {
        if ($shout === true) {
            return "WOOF!\n";
        } else {
            return "Woof.\n";
        }
    }
}

// Simulation
$lula = new Cat();
echo $lula->walk(2);
echo $lula->eat("tuna");
echo $lula->talk(true);

$yame = new Dog();
echo $yame->walk(2);
echo $yame->eat("meat");
echo $yame->talk(true);
