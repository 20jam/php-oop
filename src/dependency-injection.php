<?php
// Dependency Injection example
// Now you don't need to use inheritance when you need to use more than one class.


// Normal class
class Author
{
    private $firstName;
    private $lastName;

    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }
}

// Class using DI in the constructor
// Inserting the Author class as an argument
class Question
{
    private $author;
    private $question;

    public function __construct($question, Author $author)
    {
        $this->author = $author;
        $this->question = $question;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getQuestion()
    {
        return $this->question;
    }
}

// Both Question and Author Class methods can be accessed through the $question instances
// prints: John Doe. Is this dependency injection?
$question = new Question('. Is this dependency injection?', new Author('John ', 'Doe'));
echo $question->getAuthor()->getFirstName();
echo $question->getAuthor()->getLastName();
echo $question->getQuestion();
