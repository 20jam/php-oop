<?php

// Example 1: -----------------------------------------------------------------
// source:
// https://leanpub.com/the-essentials-of-object-oriented-php
// Context:
// a `Price` trait has a method `changePriceByDollars()` that // calculates the new price
// from the old price and the price change in dollars. and another trait for special prices
// with a method that announce that the model is on special sell:


trait Price // Define traits
{
    public function changePriceByDollars($price, $change)
    {
        return $price + $change;
    }
}
trait SpecialSell
{
    public function annonunceSpecialSell()
    {
        return __CLASS__ . " on special sell";
    }
}
// Import/use them in classes:
class Bwm
{
    use Price;
    use SpecialSell;
}
class Mercedes
{
    use Price;
    use SpecialSell;
}
// Use them:
$mercedes1 = new Mercedes();
echo $mercedes1->changePriceByDollars(42000, -2100);
echo $mercedes1->annonunceSpecialSell();

// Example 2: -----------------------------------------------------------------
// source:
// https://www.php.net/manual/en/language.oop5.traits.php
// Context:
// Hello world

trait HelloWorld
{
    public function sayHello()
    {
        echo 'Hello World!';
    }
}

class TheWorldIsNotEnough
{
    use HelloWorld;

    public function sayHello()
    {
        echo 'Hello Universe!';
    }
}

(new TheWorldIsNotEnough())->sayHello();

// Example 3: -----------------------------------------------------------------
// source:
// https://www.php.net/manual/en/language.oop5.traits.php
// Context:
// Logger for new account and new user

trait Logger
{
    public function log($msg)
    {
        echo date('Y-m-d h:i:s') . ':' . '(' . __CLASS__ .  ') ' . $msg . PHP_EOL;
    }
}

class BankAccount
{
    use Logger;

    private $accountNumber;

    public function __construct($accountNumber)
    {
        $this->accountNumber = $accountNumber;
        $this->log("A new $accountNumber bank account created");
    }
}

class User
{
    use Logger;

    public function __construct()
    {
        $this->log("A new user created");
    }
}


(new BankAccount('1234567674'));

(new User());

// Example 4: -----------------------------------------------------------------
// source:
// https://www.php.net/manual/en/language.oop5.traits.php
// Context:
// Controllers and CRUD

class Controller
{
  /* Controller-specific methods defined here. */
}

class AdminController extends Controller
{
  /* Controller-specific methods inherited from Controller. */
  /* Admin-specific methods defined here. */
}

trait CrudControllerTrait
{
  /* CRUD-specific methods defined here. */
}

class AdminCrudController extends AdminController
{
    use CrudControllerTrait;

  /* Controller-specific methods inherited from Controller. */
  /* Admin-specific methods inherited from AdminController. */
  /* CRUD-specific methods defined by CrudControllerTrait. */
}
