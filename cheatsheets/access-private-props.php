<?php
// Example 1: -----------------------------------------------------------------
// source:
// https://leanpub.com/the-essentials-of-object-oriented-php
// Context:
// say we have a car class that has a `$model` private property. 
// To access and modify an car class instance. We create a setter called setModel 
// to set an car object model and a getter called getModel to get a car object model.

class Car {
  private $model;
  public function setModel($model) { 
    $this -> model = $model; 
  }
  public function getModel() { 
    return "The car model is " . $this -> model; 
  }
}; 

$mercedes = new Car();

$mercedes->setModel("Mercedes");

echo $mercedes->getModel();
