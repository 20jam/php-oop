# Object oriented programming with php

This repo contains my notes on Object oriented programming using php.

There are two directories of interest:

- `./snippets`: contains code snippets. [Currently, only UltiSnips vim]
- `./src`: contains examples for every section in this file, it can be used while solving challenges.

# NOTES
## Object Oriented Programming

OOP is a programming style in which we group variables and methods of a
particular topic into single class. OOP is heavily adopted because it support
code organization, provides modularity and reduces the need to repeat
ourselves. The main object-oriented concept are as follows:

- Encapsulation
- Inheritance
- Polymorphism
- Composition


## Classes

Classes are used to group the code that handles a certain topic into one place.
There are properties and methods inside every class that can be defined with a
keyword of `public` `private` or `protected`. [more on this here](#public%2C-private%2C-and-protected-keywords)

[See cheatsheet](./src/class.php)


## Objects

### What can be seen as an object?

When you look at a person, you see the person as an object. And an object is
defined by two components: attributes (properties) and behaviors (methods). A
person has attributes, such as eye color, age, height, and so on. A person also
has behaviors, such as walking, talking, breathing, and so a. In its basic
definition, an object is an entity that contains both data and behavior.

### What can be seen as an object?

Objects are instance of a class. A class holds the methods and properties that
are shared by all of the objects that are created from it. a User instance can
be create from a User class. Although objects share the same code, the can
behave differently because they can have different values assigned to them.


[See cheatsheet](./src/class.php)

## $this Keyword

`$this` keyword are used to interact with a class method or properties from with
the class. Among different uses of this keyword, there is chaining methods and
properties. 

[See example](./src/chaining-with-this.php)

## Public, Private, and Protected Keywords

- We use `public` if we want the methods or properties to be accessed on public
  scope as well as within the class.
- We use `private` if we want the methods or properties to be accessed within
  the class only.
- We use `protected` if we want the methods or properties to be accessed within
  the class and class child.

## Access private properties

To access `private` properties from outside the class, we use publicly defined
setters and getters. Using private properties limit the possible interaction to
our private properties from public scope. This is useful when for example we
want to define a hook each time a method is called to get the model of the
object, such as save the request in a log. 

[See example](./src/access-private-props.php)


## Inheritance

Inheritances enable us to reduce code duplications by creating a parent/master
class with properties and method that can be inherited by child class. In php
we can inherit from another class by using `extends` keyword. 

[See example](./src/inheritance.php)


## Abstract classes

Put simply, an abstract class is a class with at least one abstract method and
with a abstract keyword in front of it. They get used for multiple reasons:

1. When we want be commit to writing certain class methods, or when we are only sure of there names.
2. When we want child classes to define these methods.

[See example](./src/abstract-classess.php)

## Interfaces

An interface can be considered as an outline of what a particular object can
do. They are considered one of the main building blocks of the SOLID pattern.

Interfaces allow us to create code which specifies which methods a class must
implement, without having to define how these methods are implemented. 

Interfaces are contract, we "implement" them to provide code and behavior that
fit the description of the interface. In the other hand, Abstract Classes are
behavior, we "extend" them and add additional behaviors, sometimes we are
required to add specific behavior left that are left out by the class (methods
marked with "abstract").

Interface maybe used when multiple classes need to define the same methods.
However, abstract class might be appropriate when we need the share code
between subclasses

| Interface | Abstract Class |
|-----------|----------------|
| An interface cannot have concrete methods in it i.e. methods with definition. | An abstract class can have both abstract methods and concrete methods in it. |
| All methods declared in interface should be public | An abstract class can have public, private and protected etc methods. |
| Multiple interfaces can be implemented by one class. | One class can extend only one abstract class. |

[See example](./src/interface.php)

## Polymorphism

Put simply, Polymorphism is a principle that state that methods in different
classes doing similar things should have the same name. 

[See example](./src/polymorphism.php)

## Type hinting

Type hinting is used to specify the expected data type for an argument. It is
used for better code organization and improved error messages.

```php
// Class
function funName(ClassName $object) {  }
// Strings
function funName(string $arg) {  }
// Array
function funName(array $arg) {  }
// Boolean
function funName(bool $arg) {  }
// Integers
function funName(int $arg) {  }
// Floats
function funName(float $arg) {  }
```

## Static methods and properties

Static methods and properties are those properties with `static` keyword
in front of them. They enable us to approach methods and properties of a class
without the need to first create an object out of the class. They are used
mainly as utilities. The following are the main use cases for them:

- as counters, to save the last value that has been assigned to them. For
  example, the method `add1ToCars()` adds 1 to the `$numberOfCars` property
  each time they are invoked.

- As utlities for the main classes. Utility methods can perform all kinds of
  tasks, such as: conversion between measurement systems (kilograms to pounds),
  data encryption, sanitation, and any other task that is not more than a
  service for the main classes. The example given below is of a static method
  with the name of redirect that redirects the user to the URL that we pass to
  it as an argument.

```php
class Utilis {
  static public function redirect($url) {
    header("Location: $url");
    exit;
  }
}

Utilis::redirect("http://www.phpthusiast.com");
```

## Traits

Traits are a mechanism for code reuse. A Trait is intended to reduce some
limitations of single inheritance by enabling a developer to reuse sets of
methods freely in several independent classes living in different class
hierarchies. 

A Trait is similar to a class, but only intended to group functionality in a
fine-grained and consistent way. It is not possible to instantiate a Trait on
its own. It is an addition to traditional inheritance and enables horizontal
composition of behavior; that is, the application of class members without
requiring inheritance. 

Some people refer to traits as "like an automatic CTRL+C/CTRL+V for your
classes". You specificity some methods in a trait and "import" them into your
class. It will make your code behave like the methods were written inside your
class.

When using a trait, we should be on the lookout for code duplication and for
naming conflicts that are the result of calling the methods in different traits
with the same name. 

[See example](./src/traits.php)

## Namespaces and code integration

Namespaces and code integration are used when the project grow in complexity,
and we need to start organizating our code and integrate them from different
resources. Or when we have multiple class or methods with the same name.

Setting up namespace:

1. Create an index.php file in the root directory of the site.
2. create a class with the name of CarIntro and place it in `src/Car` folder,
   as follows `src/Car/CarIntro.php` is convention to have file names as same
   as class name
3. Define a namespace at the top of the file: `<?php namespace Acme/Car;` it as
   customary to give the src directory the `Acme` namespace, or maybe brand
   name, and imitate the directory structure.

Using a namespace:

1. open up the file we want to use the namesapce in.
2. require the namespaced file: `require "src/Car/CarIntro.php;"`
3. import the namespace `use Acme\Car\CarIntro;`
4. now we can use the class by `$carintro = new Acme\Car\CarIntro()`
5. or use an alias with `use Acme\Car\CarIntro as Intro;`

## Dependancy Injection

Dependancy injection is the most less understood subject. Lets answer the above
question by having a problem and a solution.

When class A cannot do its job without class B, we say that class A is
dependent on class B. In order to perform this dependency, many programmers
create the object from class B in the constructor of class A.

**The problem: tight coupling between classes**

a Car is dependent on Human Driver, so we might be tempted to create the object
from the `HumanDriver` class in the constructor of the `Car` class.

```php
class HumanDriver {
  // Method to return the driver name.
  public function sayYourName($name) {
    return $name;
  }
}
class Car {
  protected $driver;
  // We create the driver object in the constructor,
  // and use this object to populate the $driver variable.
  public function __construct() {
    $this->driver = new HumanDriver();
  }
  // A getter method that returns the driver object
  public function getDriver() {
    return $this -> driver;
  }
}
```

The real problem arise when we need to switch dependencies. For example, if the
technological advancements dictate us a car that is driven by a robot, we will
find our self in a problem since the Car class only knows how to handle human
drivers. This problem stems from directly creating the driver object inside the
`Car` class which is known as tight coupling between classes, something that
should be avoided as much as possible. 

In fact, when we do tight coupling between classes, we violate a fundamental
principle of well designed code called the “single responsibility principle”
(SRP), according to which a class should have only one responsibility. 

In order to respect this principle, the only code that the `Car` class needs to
handle is that of cars, without messing with any other code.

**The solution: dependency injection**

First, rewrite `Car` class so it can set its own `$driver` property that is
passed as a parameter to the constructor.

```php
// The Car class gets the driver object injected
// to its constructor
class Car {
  protected $driver;
  // The constructor sets the value of the $driver
  public function __construct($driver) {
    $this->driver = $driver;
  }
  // A getter method that returns the driver object
  // from within the car object
  public function getDriver()
  {
    return $this->driver;
  }
}
```

Then, we inject dependency by first creating the `Driver` object and then
injecting this object into the newly created `Car` object through the
constructor:

```php
$humanDriver = new HumanDriver();
$car = new Car($humanDriver);
$robotDriver = new RobotDriver();
$car = new Car($robotDriver);
```
## Exceptions handling

Exception handling is an elegant way to handle errors which are beyond the
program’s scope. For example, if our application fails to contact the database,
we can use exception hadling to contact another data source or to provide
instructions to the users that they need to cntact technical support.

In php we can hadle exception with making the use of `Exception` class

[See example](./src/exception-handling.php)

# END

[Currently, only UltiSnips vim]: https://github.com/sirver/UltiSnips
