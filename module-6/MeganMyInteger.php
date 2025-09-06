<!DOCTYPE html>
<html lang="en">
<!--
  Megan Wheeler
  CSD 440
  Module 6
  9/5/2025

  - Write a program that defines a class titled MyInteger
    - The class is to hold a single integer that is set in the constructor by a parameter
    - The class is to have methods isEven(int) and isOdd(int)
    - The class is to have an isPrime() method
    - Have a getter method and a setter method
  - Create two instances and test all methods
  - Title the PHP class as <YourFirstName> MyInteger (no spaces)
 -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Megan's MyInteger Program</title>

    <?php
    class MeganMyInteger {
      private $value;

      function __construct($value) {
        $this->value = $value;
      }

      function getInteger() {
        return $this->value;
      }

      function setInteger($value) {
        $this->value = $value;
      }

      function isEven() {
        return $this->value % 2 == 0 ? "true" : "false";
      }

      function isOdd() {
        return $this->value % 2 != 0 ? "true" : "false";
      }

      function isPrime() {
        for ($i = 2; $i < $this->value; $i++) {
          if ($this->value % $i == 0) {
            return "false";
          }
        }
        return "true";
      }
    }
    ?>
</head>

<body>
    <?php
    # Create two instances
    $myInteger1 = new MeganMyInteger(100);
    $myInteger2 = new MeganMyInteger(73);

    # Test the methods
    echo "<h1>Megan's MyInteger Program</h1>";
    echo "<h2>MyInteger 1</h2>";
    echo $myInteger1->getInteger() . " is even: " . $myInteger1->isEven() . "<br>";
    echo $myInteger1->getInteger() . " is odd: " . $myInteger1->isOdd() . "<br>";
    echo $myInteger1->getInteger() . " is prime: " . $myInteger1->isPrime() . "<br>";
    echo "<br>";
    echo "<h2>MyInteger 2</h2>";
    echo $myInteger2->getInteger() . " is even: " . $myInteger2->isEven() . "<br>";
    echo $myInteger2->getInteger() . " is odd: " . $myInteger2->isOdd() . "<br>";
    echo $myInteger2->getInteger() . " is prime: " . $myInteger2->isPrime() . "<br>";
    ?>
</body>
</html>