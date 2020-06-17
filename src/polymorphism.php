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

$rectangle = new Rectangle(5, 5);
echo $rectangle->calcArea() . "\n" . PHP_EOL;

$circle = new Circle(3);
echo $circle->calcArea() . "\n" . PHP_EOL;

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
        echo "I just love to read " . $this->topic . " Tutorials\n" . PHP_EOL;
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
        echo "I just love to read ". $this->topic . " Tutorials\n" . PHP_EOL;
    }
}

// Simulation
$objPHP = new LikePHP("PHP");
echo $objPHP->likemsg();

$objJava = new LikeJava("Java");
echo $objJava->likemsg();


// Example 3: -----------------------------------------------------------------
// source:
// Context:
// Animal Eating function
// using interfaces

interface Animal
{
    public function eat(string $food) : bool;
    public function talk(bool $shout) : string;
}

class Cat implements Animal
{
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

class Dog implements Animal
{
    // Properties
    
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

$pets = array(
    'felix' => new Cat(),
    'oscar' => new Dog(),
    'snowflake' => new Cat(),
);

foreach ($pets as $pet) {
    echo $pet->talk(false);
}
