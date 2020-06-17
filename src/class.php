<?php

class ClassName
{
  // set/declare property
    public $classname;
    public $number = 1;
  // define a method
    public function setClassName($name)
    {
        $this->classname = $name;
    }
}

// Initiate new class Instance:
$classInstance = new ClassName();
// Use Class function:
$classInstance->setClassName('User');
// Get Class variable value:
echo $classInstance->classname;
