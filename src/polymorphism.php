<?php
// Example 1: -----------------------------------------------------------------
// source:
// https://leanpub.com/the-essentials-of-object-oriented-php
// Context:
// Every shape no matter what is has an area or height and width. Using interface we can adhere to
// this principle by creating a interface called `Shape` with a method called `calcArea()`:

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

$rectangle = new Rectangle(5,5);
echo $rectangle->calcArea() . "\n" . PHP_EOL;

$circle = new Circle(3);
echo $circle->calcArea() . "\n" . PHP_EOL;

// Example 2: -----------------------------------------------------------------
// source:
// https://codescracker.com/php/php-polymorphism.htm
// Context: Like

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

$objPHP = new LikePHP("PHP");
echo $objPHP->likemsg();

$objJava = new LikeJava("Java");
echo $objJava->likemsg();
