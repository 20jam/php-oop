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
ourselves. One of the fundamental advantage of this programming style is that
the data and the operations that manipulate the data (the code) are both
encapsulated in the object.

The main object-oriented concept are as follows:

- Encapsulation: A single object contains both its behaviors (methods) and data
  (properties).
- Inheritance: A class can inherit from another class and take advantage of the
  methods and properties defined by the superclass. (is a)
- Polymorphism: Similar objects can respond to the same messages (method) in
  different ways. [more on this](#polymorphism)
- Composition: an object is built from other objects. embedding classes in
  other classes. (has a)

## Classes

Classes are used to group the code that handles a certain topic into one place.
There are properties and methods inside every class that can be defined with a
keyword of `public` `private` or `protected`. [more on this here](#public-private-and-protected-keywords)

[See cheatsheet](./src/class.php)


## Objects

**What can be seen as an object?**

When you look at a person, you see the person as an object. And an object is
defined by two components: attributes (properties) and behaviors (methods). A
person has attributes, such as eye color, age, height, and so on. A person also
has behaviors, such as walking, talking, breathing, and so a. In its basic
definition, an object is an entity that contains both data and behavior.

**What are objects?**

Objects are the building blocks of an OO program, they are basicly instances of
a some class. A program that leverages OO stlye is basically a collection of
objects. A class holds the behaviors (contained in methods) and data
(properties) that are shared by all the objects that are created from it. 

The behavior of an object represents what the object can do and the data stored
within an object represents the state of the object. 

[See cheatsheet](./src/class.php)

## $this Keyword

`$this` keyword are used to interact with a class method or properties from
within the class. Among different uses of this keyword, there is chaining
methods and properties. 

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

To specify the output type of a function, we add after `(expected type)` `: int`

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

## Dependency Injection

Dependency injection is the process whereby we input dependencies that the
application needs directly into the object itself, instead of adding it to our
class.

When writing a class, it's natural to use other dependencies; perhaps a
database model class. So with dependency injection, instead of a class having
its database model created in itself, you can create it outside that object and
inject it in. 

In other words, When `class A` cannot do its job without `class B`, we say that
`class A` is dependent on `class B`. In order to perform this dependency, we
have to options: injected, or initialize it.

When thinking of dependency injection, there are four separate roles involved:

- The service to be injected
- The client that depends on the service being injected
- The interface that determines how the client can use the service
- The injector that is responsible for instantiating the service and injecting it into

Lets look at the two ways where we make one class dependent on other:

### The Wrong Way: Tight coupling between classes

a Car is dependent on Human Driver, so we create `HumanDriver` object from the
in the constructor of the `Car` class.

```php
class HumanDriver 
{
    // Method to return the driver name.
    public function sayYourName($name) 
    {
        return $name;
    }
}

class Car 
{
    protected $driver;

    // Create the driver object in the constructor
    public function __construct() {
        $this->driver = new HumanDriver();
    }

    // A getter method that returns the driver object
    public function getDriver() {
        return $this->driver;
    }

}
```

Tight coupling between classes become a real issue when we need to switch
dependencies. In our example, say we have a robot driving the car instead of a
human. In fact, when we do tight coupling between classes, we violate a
fundamental principle of well designed code called the “single responsibility
principle” (SRP), according to which a class should have only one
responsibility. 

### The Right Way: Dependency Injection

First, rewrite `Car` class so it can set its own `$driver` property that is
passed as a parameter to the constructor.

```php
// The Car class gets the driver object injected
// to its constructor
class Car 
{
    protected $driver;
    // The constructor sets the value of the $driver
    public function __construct($driver) 
    {
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

Rules to follow when implementing exceptions handling 

- Know what to do with an exception before throwing it.
- If you have no idea what to do with a caugt exception then it shouldn't be caught.

## Design Guidelines

## Classes

As we all know by know, OOP Style supports the idea of creating classes that
are complete packages, encapsulating the methods and properties of a single
entity. So, a class can be represent a logical component. The following are
general design guidelines to be followed when developing classes:

1. **Mimic the real world**: When creating classes, we should design them in a
   way that represents the true behavior of the object. For example, `User`
   class and `Webapp` class model a real-world entity. The `User` and `Webapp`
   objects encapsulate their data and behavior, and they interact through each
   other’s [public](#public-private-and-protected-keywords) interfaces.
2. **Identify the public interfaces**: perhaps the most important issue when
   designing a class is to keep the public interface to a minimum. The entire
   purpose of building a class is to provide something useful and concise. The
   goal is to provide the user with exact interface to do the job right.
3. **Design robust constructor**: constructors that deals with how will the
   class be constructed. A constructor should put an object into an initial,
   safe state. This includes issues such as properties initialization and
   memory management.
4. **Design Error Handling**: As with the design of constructors, designing how
   a class handles errors is of vital importance. 
5. **Document the class and using comments**: A lack of proper documentation
   and comments can undermine the entire system. One of the most crucial
   aspects of a good design, whether it’s a design for a class or something
   else, is to carefully document the process. 
6. **Design with reuse in mind**: OO coding enable us to easily reuse our code
   in different systems. Make sure when you design classes, to keep reusability
   in mind, attempt to predict all the possible scenarios in which it will be
   used.
7. **Design with extensibility in mind**: Adding new features to a class might
   be as simple as extending an existing class, adding a few new methods, and
   modifying the behavior of others. If you have just written a Person class,
   you must consider the fact that you might later want to write an Employee
   class or a Customer class. Thus, having Employee inherit from Person might
   be the best strategy; in this case, the Person class is said to be
   extensible. You do not want to design Person so that it contains behavior
   that prevents it from being extended by classes such as Employee or
   Customer(assuming that in your design you really intend for other classes to
   extend Person).  
8. **Design with maintainability in mind**: Designing useful and concise
   classes promotes a high level of maintainability. Just as you design a class
   with extensibility in mind, you should also design with future maintenance
   in mind. The process of designing classes forces you to organize your code
   into many (ideally) manageable pieces. Separate pieces of code tend to be
   more maintainable than larger pieces of code (at least that’s the idea). One
   of the best ways to promote maintainability is to reduce interdependent
   code.
9. **Use Object Persistence**: Object persistence is another issue that must be
   addressed in many OO systems. Persistence is the concept of maintaining the
   state of an object. When you run a program, if you don’t save the object in
   some manner, the object dies, never to be recovered. These transient objects
   might work in some applications, but in most business systems, the state of
   the object must be saved for later use.
 
# END

[Currently, only UltiSnips vim]: https://github.com/sirver/UltiSnips

# Contribute
If you like to contribue, it's awesome! Just keep in mind this project using phpcs to achieve unified code style.
So make sure you run

`composer install` to install the dev dependencies

Then you can run code checks by using the composer script

`composer phpcs`

or use the code beautifier to auto fix violations.

`composer phpcbf`

**Please run phpcs and slove all issues before creating a pull request**

(i) This project is not about a real code lib. It's about OOP examples for better understanding. That's why the
ruleset.xml exclude 2 fundamental PSR1 rules.
