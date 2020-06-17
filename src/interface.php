<?php
// Example 1: ---------------------------------------------------------------------------------
// source:
// https://www.php.net/manual/en/language.oop5.interfaces.php
// Context:
// Duck typing

interface CanFly
{
    public function fly();
}

interface CanSwim
{
    public function swim();
}

class Bird
{
    public function info()
    {
        echo "I am a {$this->name}\n";
        echo "I am an bird\n";
    }
}

// some implementations of birds
class Dove extends Bird implements CanFly
{
    public $name = "Dove";
    public function fly()
    {
        echo "I fly\n";
    }
}

class Penguin extends Bird implements CanSwim
{
    public $name = "Penguin";
    public function swim()
    {
        echo "I swim\n";
    }
}

class Duck extends Bird implements CanFly, CanSwim
{
    public $name = "Duck";
    public function fly()
    {
        echo "I fly\n";
    }
    public function swim()
    {
        echo "I swim\n";
    }
}

// a simple function to describe a bird
function describe($bird)
{
    if ($bird instanceof Bird) {
        $bird->info();
        if ($bird instanceof CanFly) {
            $bird->fly();
        }
        if ($bird instanceof CanSwim) {
            $bird->swim();
        }
    } else {
        die("This is not a bird. I cannot describe it.");
    }
}

// describe these birds please
describe(new Penguin);
echo "---\n";

describe(new Dove);
echo "---\n";

describe(new Duck);

// Example 2: ---------------------------------------------------------------------------------
// source:
// Context: Webapp

interface WebApp
{

    public function login($email, $password);
    public function register($email, $password, $username);
    public function logout();
}
// Website 1
class GoogleCom implements WebApp
{

    // methods definition
    public function login($email, $password)
    {
        echo "Login the user with email: " . $email;
    }

    public function register($email, $password, $username)
    {
        echo "User registered: Email=" . $email . " and Username= " . $username;
    }

    public function logout()
    {
        echo "User logged out!";
    }
}
/// Another interface
interface CMS
{
    public function publishPost($post);
}

// Website 2
class MediumCom implements WebApp, CMS
{

    // methods definition
    public function login($email, $password)
    {
        echo "Login the user with email: " . $email;
    }

    public function register($email, $password, $username)
    {
        echo "User registered: Email=" . $email . " and Username= " . $username;
    }

    public function logout()
    {
        echo "User logged out!";
    }

    public function publishPost($post)
    {
        echo $post." published!";
    }
}
