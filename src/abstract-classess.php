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
};

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
};

$hondaCar = new Honda();
$toyotaCar = new Toyota();

// Simulation 1
$toyotaCar->setTankVolume(10);
echo 'This car can drive ' . $toyotaCar->milesOnFullTank() . ' miles on full tank. ' . PHP_EOL;
echo "\nThis car is of " . $toyotaCar->getColor() . ' color.' . PHP_EOL;

// Simulation 2
$hondaCar->setTankVolume(30);
echo "\nThis car can drive " . $hondaCar->milesOnFullTank() . ' miles on full tank. ' . PHP_EOL;
