<?php
// Example 1: -----------------------------------------------------------------
// Context:
// We have multiple user types that all share a number of methods and properties,
// instead of copying and pasting the things that these user types share, we can 
// simply create a parent class that contains shared properties and function.

class User {
  // Properties
  protected $username; // protected so it can be shared across child classes
  protected $password;
  // Methods
  public function setUsername($username) { 
    $this->username = $username; 
  }
  public function getUsername() { 
    return $this->username; 
  }
  public function setPassword($pass) { 
    $this->password = $pass; 
  }
  public function login($pass) { 
    if ($this->password == $pass) {
      echo "\nWelcome back\n";
    } else {
      echo "\nWrong password, please try again.\n";
    }
  }
}

class Admin extends User {
  public function whoami(){return "An System Admin";}
}; 
$admin = new Admin();

class Creator extends User {
  public function whoami(){return "A content creator";}
}; 
$creator = new Creator();


// Simulation 1
echo "Creating new admin ... \n" . PHP_EOL;
// Set username and password
$admin->setUsername("sysadmin1");
$admin->setPassword("test123");
// Test login function
echo 'New admin has been created with the name: ' . $admin->getUsername() . PHP_EOL;
echo "\nLogin attempt 1" . PHP_EOL;
$admin->login("test");
echo "\nLogin attempt 2" . PHP_EOL;
$admin->login("test123");

// Simulation 2
echo "Creating new user ... \n" . PHP_EOL;
// Set username and password
$creator->setUsername("Tami");
$creator->setPassword("test123");
// Test login function
echo 'New user has been created with the name: ' . $admin->getUsername() . PHP_EOL;
echo "\nLogin attempt 1" . PHP_EOL;
$creator->login("test");
echo "\nLogin attempt 2" . PHP_EOL;
$creator->login("test123");
