<?php

class Person
{
    public function speak($words): void
    {
        echo "I have no name, and " . $words . "\n";
    }
}

class Bob extends Person
{
    public function speak($words): void
    {
        echo "I'm Bob, and " . $words . "\n";
    }
}

class Employer
{
    public function __construct(Person $person)
    {
        $person->speak("I love working for Employer.");
    }
}

$genericPerson = new Person();
$bob = new Bob();

$employer1 = new Employer($genericPerson);
$employer2 = new Employer($bob);

// Output:
// I have no name, and I love working for Employer.
// I'm Bob, and I love working for Employer.
