<html>
<!--  Megan Wheeler
  CSD 440
  Module 8
  9/26/2025
-->
<head>
<title>Megan Create Table</title>
</head>
<body bgcolor='1896f7'>

<center>
<h1>Megan Create Table</h1>
<br>

<?php
  $conn = new mysqli("localhost", "student1", "pass", "baseball_01");
  
  if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);
  }

  echo 'Connected to the database.<br>';

  if ($conn){
    // Check if table exists
    $checkTable = "SHOW TABLES LIKE 'Baseball_Wins_PHP'";
    $result = $conn->query($checkTable);
    
    if ($result->num_rows > 0) {

      echo "Table 'Baseball_Wins_PHP' already exists. Please use MeganDropTable.php to drop the table first.<br>";
    } else {
      // Create the table
      $sql = "CREATE TABLE Baseball_Wins_PHP (id INT AUTO_INCREMENT PRIMARY KEY, winner_team VARCHAR(50) NOT NULL, winner_city VARCHAR(50) NOT NULL, year_t INT NOT NULL, loser_team VARCHAR(50) NOT NULL, loser_city VARCHAR(50) NOT NULL)";
      
      if ($conn->query($sql) === TRUE) {

        echo "Table created successfully <br>";
      } else {

        echo "Error creating table: " . $conn->error . "<br>";
      }
    }
  }

  $conn->close();
?>
</center>
  
</body>
</html>