<?php


class FuelEconomy {
  // Calculate the fuel efficiency
  public function calculate($distance, $gas) {
    if($gas <= 0 ) {
      // Throw custom error message, instead of an error
      throw new Exception("The gas consumption cannot be <= 0");
    }
    return $distance/$gas;
  }
}

// In order to catch an exception, we need two blocks: try block and a catch
// block.
foreach($dataFromCars as $data => $value) {
  // Try block handles the normal data
  try {
    $fuelEconomy = new FuelEconomy();
    echo $fuelEconomy -> calculate($value[0],$value[1]) . "<br />";
  }
  // Catch block handles the exceptions
  catch (Exception $e) {
    // Echo the custom error message
    echo "Message: " . $e -> getMessage() . "<br />";
  }
}

// In the same way that we can echo the exception messages to the user, we can
// also write them into a log file with `the error_log()` command. For example:
// `error_log($e -> getFile());`

foreach($dataFromCars as $data => $value) {
  try {
    $fuelEconomy = new FuelEconomy();
    echo $fuelEconomy -> calculate($value[0],$value[1]) . "<br />";
  }
  catch (Exception $e) {
    // Echo the error message to the user
    echo "Message: " . $e -> getMessage() . "<br />";
    echo "<hr />";
    // Write the error into a log file
    error_log($e -> getMessage());
    error_log($e -> getFile());
    error_log($e -> getLine());
  }
}
