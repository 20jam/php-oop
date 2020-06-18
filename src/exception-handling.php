<?php

/*
There are two main scenarions with handling exceptions:
* they can represent "expected" errors, such as invalid input errors. Note that
  - there must be be a handling scenario for them
  - such exceptuios must be instances of dedicated classes created for the purpose
* they can represent fatal errors that make the the further sctipt excution not desirable
  such exceptions shouldnt be caught on the spot, but rather handled by the site-wide error handler
*/

// let's create a custom class to handle a certain input data error
class InvalidFuelEconomyArgumentException extends InvalidArgumentException
{
}

// and throw it in case there is an error
class FuelEconomy
{
    // Calculate the fuel efficiency
    public function calculate($distance, $gas)
    {
        if ($distance < 0) {
            // Throw custom error message, instead of an error
            throw new InvalidFuelEconomyArgumentException('The the distance cannot be < 0');
        }
        if ($gas <= 0) {
            throw new InvalidFuelEconomyArgumentException('The gas consumption cannot be <= 0');
        }
        return $distance / $gas;
    }
}

$dataFromCars = [
    [
        'distance' => -1,
        'gas' => 100,
    ],
    [
        'distance' => 100,
        'gas' => 0,
    ],
    [
        'distance' => 100,
        'gas' => 10,
    ],
];

foreach ($dataFromCars as $i => $value) {
    // In order to catch an exception, we need a try-catch block,
    // where catch is accepting the exeption type and a variable to assign the exception to
    try {
        $fuelEconomy = new FuelEconomy();
        echo 'Data set #' . ( $i + 1) . '. ';
        echo 'Fuel economy is:' . $fuelEconomy->calculate($value['distance'], $value['gas']) . PHP_EOL;
    } catch (InvalidFuelEconomyArgumentException $e) { // Catch block handles the exceptions
        // Echo the custom error message
        echo 'Error: ' . $e->getMessage() . PHP_EOL;
    }
}

// the example for the fatal error exception could be much simpler
// we can just make a typo in the class name
// note that most fatal errors shouldnt be caught,
// but instead handled by the site-wide error handler

$fuelEconomy = new FuelEconomy();

// even without a distinct error handlerr, PHP provides the basic handling
// shuch as showing the error on-screen on the developer's PC
// but a dedicated error handling or course can make it more flexible
