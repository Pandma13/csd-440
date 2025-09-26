<html>
<!--  Megan Wheeler
  CSD 440
  Module 7
  9/26/2025
-->
<body bgcolor='1896f7'>
<center>
<h1>Megan Populate Table</h1>
<br>

<?php
  // Connect to the database
  $conn = new mysqli("localhost", "student1", "pass", "baseball_01");
  
  if ($conn->connect_error) {
    // If the connection fails, display an error message
    die("Connection failed: " . $conn->connect_error);
  }

  echo 'Connected to the database.<br>';
  
  // Populate the table
  if ($conn){
    $sql = "INSERT INTO Baseball_Wins_PHP (winner_team, winner_city, year_t, loser_team, loser_city)
    VALUES ('Mets', 'New York', 2025, 'Dodgers', 'Los Angeles'),
    ('Giants', 'San Francisco', 2024, 'Rangers', 'Texas'),
    ('Royals', 'Kansas City', 2023, 'Astros', 'Houston'),
    ('Braves', 'Atlanta', 2022, 'Dodgers', 'Los Angeles'),
    ('Brewers', 'Milwaukee', 2021, 'Rays', 'Tampa Bay'),
    ('Marlins', 'Miami', 2020, 'Giants', 'San Francisco'),
    ('Cardinals', 'St. Louis', 2019, 'Dodgers', 'Los Angeles'),
    ('Rays', 'Tampa Bay', 2018, 'Braves', 'Atlanta'),
    ('Rangers', 'Texas', 2017, 'Astros', 'Houston'),
    ('Dodgers', 'Los Angeles', 2016, 'Royals', 'Kansas City'),
    ('Astros', 'Houston', 2015, 'Brewers', 'Milwaukee'),
    ('Rangers', 'Texas', 2014, 'Giants', 'San Francisco'),
    ('Royals', 'Kansas City', 2013, 'Rays', 'Tampa Bay'),
    ('Rays', 'Tampa Bay', 2012, 'Dodgers', 'Los Angeles'),
    ('Rangers', 'Texas', 2011, 'Marlins', 'Miami'),
    ('Cardinals', 'St. Louis', 2010, 'Rays', 'Tampa Bay'),
    ('Astros', 'Houston', 2009, 'Rangers', 'Texas'),
    ('Rays', 'Tampa Bay', 2008, 'Dodgers', 'Los Angeles'),
    ('Rangers', 'Texas', 2007, 'Giants', 'San Francisco'),
    ('Royals', 'Kansas City', 2006, 'Rays', 'Tampa Bay'),
    ('Rays', 'Tampa Bay', 2005, 'Dodgers', 'Los Angeles'),
    ('Rangers', 'Texas', 2004, 'Marlins', 'Miami'),
    ('Cardinals', 'St. Louis', 2003, 'Rays', 'Tampa Bay'),
    ('Astros', 'Houston', 2002, 'Rangers', 'Texas'),
    ('Rays', 'Tampa Bay', 2001, 'Dodgers', 'Los Angeles'),
    ('Rangers', 'Texas', 2000, 'Giants', 'San Francisco'),
    ('Royals', 'Kansas City', 1999, 'Rays', 'Tampa Bay'),
    ('Rays', 'Tampa Bay', 1998, 'Dodgers', 'Los Angeles')";
  }

  // Check if the query was successful
  if ($conn->query($sql) === TRUE) {
    echo "Table populated successfully<br>";
  }

  // Close the connection
  $conn->close();

  echo 'Disconnected from the database.<br>';
?>
</center>
</body>
</html>