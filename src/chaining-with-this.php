<?php
// Example 1: -----------------------------------------------------------------
// source:
// https://leanpub.com/the-essentials-of-object-oriented-php
// Context:
// Create a car object where you can fill fuel, and calculate
// the gallons left in the car if X is driven:

class Car
{
    public $tank;
  // Add gallons of fuel to the tank when we fill it
    public function fill($float)
    {
        $this->tank += $float;
        return $this;
    }
  // substract gallons of fuel from the tank as we ride the car
    public function ride($float)
    {
        $miles = $float;
        $gallons = $miles/50; // one gallon per mile
        $this->tank -= $gallons;
        return $this;
    }
}

$mycar = new Car();
$mycartank = $mycar->fill(10)->ride(40)->tank;
echo "The number of gallons left in the tank = $mycartank gal.";
