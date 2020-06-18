<?php

// Example 1: -----------------------------------------------------------------
// source:
// https://leanpub.com/the-essentials-of-object-oriented-php
// Context:
// Shapes
// using: interfaces

interface Shape
{
    public function calcArea();
}

class Circle implements Shape
{
    private $radius;
    public function __construct($radius)
    {
        $this -> radius = $radius;
    }
    public function calcArea()
    {
        return $this -> radius * $this -> radius * pi();
    }
}

class Rectangle implements Shape
{
    private $width;
    private $height;
    public function __construct($width, $height)
    {
        $this -> width = $width;
        $this -> height = $height;
    }
    public function calcArea()
    {
        return $this -> width * $this -> height;
    }
}

echo (new Rectangle(5, 5))->calcArea() . "\n" . PHP_EOL;
echo (new Circle(3))->calcArea() . "\n" . PHP_EOL;

// Example 2: -----------------------------------------------------------------
// source:
// https://codescracker.com/php/php-polymorphism.htm
// Context: Like
// using interfaces

interface TutorialILike
{
    public function likemsg();
}

class LikePHP implements TutorialILike
{
    private $topic;
    public function __construct($topic)
    {
        $this->topic = $topic;
    }
    public function likemsg()
    {
        echo 'I just love to read ' . $this->topic . ' Tutorials' . PHP_EOL;
    }
}

class LikeJava implements TutorialILike
{
    private $topic;
    public function __construct($topic)
    {
        $this->topic = $topic;
    }
    public function likemsg()
    {
        echo 'I just love to read ' . $this->topic . ' Tutorials' . PHP_EOL;
    }
}

// Simulation
echo (new LikePHP('PHP'))->likemsg();
echo (new LikeJava('Java'))->likemsg();


// Example 3: -----------------------------------------------------------------
// source:
// Context:
// Animal Eating function
// using interfaces

interface Animal
{
    public function eat(string $food): bool;
    public function talk(bool $shout): string;
}

class Cat implements Animal
{
    public function eat(string $food): bool
    {
        return $food === 'tuna';
    }

    public function talk(bool $shout): string
    {
        if ($shout === true) {
            return 'MEOW!' . PHP_EOL;
        }

        return 'Meow.' . PHP_EOL;
    }
}

class Dog implements Animal
{
    // Properties

    // Methods
    public function eat(string $food): bool
    {
        return $food === 'dog food' || $food === 'meat';
    }

    public function talk(bool $shout): string
    {
        if ($shout === true) {
            return 'WOOF!' . PHP_EOL;
        }

        return 'Woof.' . PHP_EOL;
    }
}

// Simulation

$pets = array(
    'felix' => new Cat(),
    'oscar' => new Dog(),
    'snowflake' => new Cat(),
);

foreach ($pets as $pet) {
    echo $pet->talk(false);
}
