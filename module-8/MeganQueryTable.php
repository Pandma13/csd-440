<html>
<!--  Megan Wheeler
  CSD 440
  Module 7
  9/26/2025
-->
<head>
<style>
table {
    border-collapse: collapse;
    width: 100%;
    max-width: 800px;
    margin: 20px auto;
    border: 2px solid #333;
}

th, td {
    border: 1px solid #666;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
    font-weight: bold;
    border-bottom: 2px solid #333;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #e6f3ff;
}
</style>
</head>
<body bgcolor='1896f7'>
<center>
<h1>Megan Query Table</h1>
<br>

<?php
    // Connect to the database
    $conn = new mysqli("localhost", "student1", "pass", "baseball_01");
    
    if ($conn->connect_error) {
      // If the connection fails, display an error message
      die("Connection failed: " . $conn->connect_error);
    }

    echo 'Connected to the database.<br>';
    
    if ($conn){
      // Query the table
      $sql = "SELECT * FROM Baseball_Wins_PHP";
    }

    // Execute the query
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Fetch the results

      echo "<table><thead><tr><th>Winner Team</th><th>Winner City</th><th>Year</th>
        <th>Loser Team</th><th>Loser City</th></tr></thead>
        <tbody>";
      while ($row = $result->fetch_assoc()) {

        echo "<tr><td>" . $row["winner_team"] . "</td><td>" . $row["winner_city"] . 
        "</td><td>" . $row["year_t"] . "</td><td>" . $row["loser_team"] . 
        "</td><td>" . $row["loser_city"] . "</td></tr>";
      }

      echo "</tbody></table><br>";
    }

    // Check if the query was successful
    if ($conn->query($sql) === TRUE) {

      echo "Table queried successfully<br>";
    }

    // Close the connection
    $conn->close();

    echo 'Disconnected from the database.<br>';
?>
</center>
</body>
</html>