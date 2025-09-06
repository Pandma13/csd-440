<!DOCTYPE html>
<html lang="en">
<!--
  Megan Wheeler
  CSD 440
  Module 5
  9/5/2025

  - Write a program that creates and displays an array of customers
    - minimum of 10 customers
    - include the following for each customer:
      - first name
      - last name
      - age
      - phone number.
  - Use array methods to find several records and display the customer information based on different data fields.
 -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Megan's Customers Program</title>
</head>

<body>
    <h1>Megan's Customers Program</h1>
    <?php
    $customers = array();
    $customers[] = array("first_name" => "John", "last_name" => "Doe", "age" => 30, "phone" => "123-456-7890");
    $customers[] = array("first_name" => "Jane", "last_name" => "Smith", "age" => 25, "phone" => "098-765-4321");
    $customers[] = array("first_name" => "Jim", "last_name" => "Beam", "age" => 50, "phone" => "111-222-3333");
    $customers[] = array("first_name" => "Jill", "last_name" => "Johnson", "age" => 22, "phone" => "444-555-6666");
    $customers[] = array("first_name" => "Jack", "last_name" => "Daniels", "age" => 45, "phone" => "777-888-9999");
    $customers[] = array("first_name" => "Abby", "last_name" => "Green", "age" => 27, "phone" => "111-222-3333");
    $customers[] = array("first_name" => "Bob", "last_name" => "Brown", "age" => 48, "phone" => "555-888-6666");
    $customers[] = array("first_name" => "Charlie", "last_name" => "Davis", "age" => 57, "phone" => "666-777-8888");
    $customers[] = array("first_name" => "Diana", "last_name" => "Evans", "age" => 34, "phone" => "999-580-6751");
    $customers[] = array("first_name" => "Barbara", "last_name" => "Jones", "age" => 42, "phone" => "555-666-7777");

    echo "<h2>Customers</h2>";
    for ($i = 0; $i < count($customers); $i++) {
        echo $customers[$i]["first_name"] . " " . $customers[$i]["last_name"] . " " . $customers[$i]["age"] . " " . $customers[$i]["phone"] . "<br>";
    }

    echo "<h2>Customers Over 40</h2>";
    for ($i = 0; $i < count($customers); $i++) {
        if ($customers[$i]["age"] > 40) {
            echo $customers[$i]["first_name"] . " " . $customers[$i]["last_name"] . " " . $customers[$i]["age"] . " " . $customers[$i]["phone"] . "<br>";
        }
    }

    echo "<h2>Customers with first name starting with 'J'</h2>";
    for ($i = 0; $i < count($customers); $i++) {
        if (strpos($customers[$i]["first_name"], "J") === 0) {
            echo $customers[$i]["first_name"] . " " . $customers[$i]["last_name"] . " " . $customers[$i]["age"] . " " . $customers[$i]["phone"] . "<br>";
        }
    }

    echo "<h2>Customers ordered by last name</h2>";
    usort($customers, function($a, $b) {
        return strcmp($a["last_name"], $b["last_name"]);
    });
    for ($i = 0; $i < count($customers); $i++) {
        echo $customers[$i]["first_name"] . " " . $customers[$i]["last_name"] . " " . $customers[$i]["age"] . " " . $customers[$i]["phone"] . "<br>";
    }

    echo "<h2>Customers ordered by age ascending</h2>";
    usort($customers, function($a, $b) {
        return $a["age"] - $b["age"];
    });
    for ($i = 0; $i < count($customers); $i++) {
        echo $customers[$i]["first_name"] . " " . $customers[$i]["last_name"] . " " . $customers[$i]["age"] . " " . $customers[$i]["phone"] . "<br>";
    }    
    ?>
</body>
</html>