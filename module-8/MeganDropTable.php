<html>
<!--  Megan Wheeler
  CSD 440
  Module 7
  9/26/2025
-->
<body bgcolor='1896f7'>

<center>
<h1>Megan Drop Table</h1>
<br>

<?php
  $conn = new mysqli("localhost", "student1", "pass", "baseball_01");
  
  if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);
  }

  echo 'Connected to the database.<br>';

  if ($conn){
    // Drop table if it exists (ignore error if table doesn't exist)
    $sql = "DROP TABLE IF EXISTS Baseball_Wins_PHP";
    
    if ($conn->query($sql) === TRUE) {

      echo "Table dropped successfully<br>";
    } else {
      
      echo "Error dropping table: " . $conn->error . "<br>";
    }
  }

  $conn->close();

  echo 'Disconnected from the database.<br>';
?>
</body>
</html>