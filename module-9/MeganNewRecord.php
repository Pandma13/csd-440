<!DOCTYPE html>
<html lang="en">
<!--
  Megan Wheeler
  CSD 440
  Module 9
  9/26/2025
-->
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Megan New Record</title>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #1896f7 0%, #0d6efd 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }
    
    .container {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        padding: 40px;
        max-width: 600px;
        width: 100%;
        text-align: center;
    }
    
    h1 {
        color: #333;
        margin-bottom: 30px;
        font-size: 2.5em;
        font-weight: 400;
    }
    
    .nav-bar {
        display: flex;
        flex-wrap: wrap;
        justify-content: right;
        gap: 20px;
        margin-top: 30px;
    }
    
    .nav-button {
        display: block;
        padding: 15px 20px;
        background: linear-gradient(135deg, #1896f7, #0d6efd);
        color: white;
        text-decoration: none;
        border-radius: 10px;
        font-weight: 500;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(24, 150, 247, 0.3);
    }
    
    .nav-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(24, 150, 247, 0.4);
        background: linear-gradient(135deg, #0d6efd, #1896f7);
    }
    
    .nav-button:active {
        transform: translateY(0);
    }
    
    .form-container {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 30px;
        margin: 20px 0;
        border: 1px solid #e9ecef;
    }
    
    .form-group {
        margin-bottom: 20px;
        text-align: left;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #333;
        font-size: 1.1em;
    }
    
    .form-group input {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        font-size: 1em;
        transition: border-color 0.3s ease;
        background: white;
    }
    
    .form-group input:focus {
        outline: none;
        border-color: #1896f7;
        box-shadow: 0 0 0 3px rgba(24, 150, 247, 0.1);
    }
    
    .form-group input:invalid {
        border-color: #dc3545;
    }
    
    .submit-button {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
        padding: 15px 30px;
        border: none;
        border-radius: 8px;
        font-size: 1.1em;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
        width: 100%;
        margin-top: 10px;
    }
    
    .submit-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(40, 167, 69, 0.4);
        background: linear-gradient(135deg, #20c997, #28a745);
    }
    
    .submit-button:active {
        transform: translateY(0);
    }
    
    .error-message {
        background: #f8d7da;
        color: #721c24;
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 15px;
        border: 1px solid #f5c6cb;
    }
    
    .success-message {
        background: #d4edda;
        color: #155724;
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 15px;
        border: 1px solid #c3e6cb;
    }
    
    .warning-message {
        background: #fff3cd;
        color: #856404;
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 15px;
        border: 1px solid #ffeaa7;
    }
    
    .record-display {
        background: #e7f3ff;
        border: 2px solid #1896f7;
        border-radius: 10px;
        padding: 25px;
        margin: 20px 0;
        text-align: left;
    }
    
    .record-display h3 {
        color: #1896f7;
        margin-bottom: 20px;
        text-align: center;
        font-size: 1.5em;
    }
    
    .record-field {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid #cce7ff;
        margin-bottom: 8px;
    }
    
    .record-field:last-child {
        border-bottom: none;
        margin-bottom: 0;
    }
    
    .record-label {
        font-weight: 600;
        color: #333;
        min-width: 120px;
    }
    
    .record-value {
        color: #555;
        font-weight: 500;
        text-align: right;
        flex: 1;
        margin-left: 15px;
    }
    
    .record-year {
        background: #1896f7;
        color: white;
        padding: 4px 12px;
        border-radius: 20px;
        font-weight: 600;
    }
    
    .add-another-button {
        background: linear-gradient(135deg, #ffc107, #ff8f00);
        color: white;
        padding: 12px 25px;
        border: none;
        border-radius: 8px;
        font-size: 1em;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(255, 193, 7, 0.3);
        margin-top: 15px;
        display: inline-block;
        text-decoration: none;
    }
    
    .add-another-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(255, 193, 7, 0.4);
        background: linear-gradient(135deg, #ff8f00, #ffc107);
    }
    
    .add-another-button:active {
        transform: translateY(0);
    }
    
    .form-hidden {
        display: none;
    }
    
    @media (max-width: 768px) {
        .container {
            padding: 30px 20px;
        }
        
        h1 {
            font-size: 2em;
        }
        
        .nav-bar {
            flex-direction: column;
            gap: 15px;
        }
        
        .form-container {
            padding: 20px;
        }
    }
</style>
</head>
<body>
  <div class="container">
  <h1>Megan New Record</h1>
  <div class="nav-bar">
    <a href="MeganIndex.php" class="nav-button">Return to Index</a>
  </div>

  <!-- HTML Form for New Record Input -->
  <div class="form-container" id="recordForm">
    <h2 style="text-align: center; margin-bottom: 25px; color: #333;">Add New Baseball Record</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div class="form-group">
        <label for="winner_team">Winner Team:</label>
        <input type="text" id="winner_team" name="winner_team" required 
               value="<?php echo isset($_POST['winner_team']) ? htmlspecialchars($_POST['winner_team']) : ''; ?>">
      </div>
      
      <div class="form-group">
        <label for="winner_city">Winner City:</label>
        <input type="text" id="winner_city" name="winner_city" required 
               value="<?php echo isset($_POST['winner_city']) ? htmlspecialchars($_POST['winner_city']) : ''; ?>">
      </div>
      
      <div class="form-group">
        <label for="year_t">Year:</label>
        <input type="number" id="year_t" name="year_t" required min="1800" max="2100" 
               value="<?php echo isset($_POST['year_t']) ? htmlspecialchars($_POST['year_t']) : ''; ?>">
      </div>
      
      <div class="form-group">
        <label for="loser_team">Loser Team:</label>
        <input type="text" id="loser_team" name="loser_team" required 
               value="<?php echo isset($_POST['loser_team']) ? htmlspecialchars($_POST['loser_team']) : ''; ?>">
      </div>
      
      <div class="form-group">
        <label for="loser_city">Loser City:</label>
        <input type="text" id="loser_city" name="loser_city" required 
               value="<?php echo isset($_POST['loser_city']) ? htmlspecialchars($_POST['loser_city']) : ''; ?>">
      </div>
      
      <button type="submit" class="submit-button">Add Record</button>
    </form>
  </div>

  <?php
  // Check if form was submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Safely get POST values with default empty strings
    $winner_team = isset($_POST["winner_team"]) ? trim($_POST["winner_team"]) : "";
    $winner_city = isset($_POST["winner_city"]) ? trim($_POST["winner_city"]) : "";
    $year_t = isset($_POST["year_t"]) ? trim($_POST["year_t"]) : "";
    $loser_team = isset($_POST["loser_team"]) ? trim($_POST["loser_team"]) : "";
    $loser_city = isset($_POST["loser_city"]) ? trim($_POST["loser_city"]) : "";

    // Validate required fields
    $errors = [];
    if (empty($winner_team)) {
      $errors[] = "Winner team is required.";
    }
    if (empty($winner_city)) {
      $errors[] = "Winner city is required.";
    }
    if (empty($year_t) || !is_numeric($year_t)) {
      $errors[] = "Year must be a valid number.";
    }
    if (empty($loser_team)) {
      $errors[] = "Loser team is required.";
    }
    if (empty($loser_city)) {
      $errors[] = "Loser city is required.";
    }

    // If there are validation errors, display them
    if (!empty($errors)) {
      echo "<div class='error-message'>";
      echo "<h3 style='margin-bottom: 10px;'>Please fix the following errors:</h3>";
      echo "<ul style='margin-left: 20px;'>";
      foreach ($errors as $error) {
        echo "<li>" . htmlspecialchars($error) . "</li>";
      }
      echo "</ul>";
      echo "</div>";
    } else {
      // Check if connection is established
      require_once 'MeganDatabaseConnection.php';
      $conn = connectToDatabaseSilent();

      if (!isset($conn)) {
        echo "<div style='background: #d4edda; padding: 10px; border-radius: 5px; margin-bottom: 15px; color: #155724;'>Database connection required.</div>";
        echo "<br>";
        echo "<a href='MeganIndex.php' class='nav-button'>Redirecting to Index...</a>";
        echo "<br>";
        echo "<br>";
        header(header: "Location: MeganIndex.php");
        exit();
      }

      // Use prepared statement to prevent SQL injection
      $sql = "INSERT INTO Baseball_Wins_PHP (winner_team, winner_city, year_t, loser_team, loser_city) VALUES (?, ?, ?, ?, ?)";
      $stmt = $conn->prepare($sql);
      
      if ($stmt) {
        $stmt->bind_param("ssiss", $winner_team, $winner_city, $year_t, $loser_team, $loser_city);
        $result = $stmt->execute();
        
        if ($result) {
          echo "<div class='success-message'>";
          echo "<h3>Success!</h3>";
          echo "Record inserted successfully.";
          echo "</div>";
          
          // Display the newly added record
          echo "<div class='record-display'>";
          echo "<h3>📊 New Record Added</h3>";
          echo "<div class='record-field'>";
          echo "<span class='record-label'>Winner Team:</span>";
          echo "<span class='record-value'>" . htmlspecialchars($winner_team) . "</span>";
          echo "</div>";
          echo "<div class='record-field'>";
          echo "<span class='record-label'>Winner City:</span>";
          echo "<span class='record-value'>" . htmlspecialchars($winner_city) . "</span>";
          echo "</div>";
          echo "<div class='record-field'>";
          echo "<span class='record-label'>Year:</span>";
          echo "<span class='record-value'><span class='record-year'>" . htmlspecialchars($year_t) . "</span></span>";
          echo "</div>";
          echo "<div class='record-field'>";
          echo "<span class='record-label'>Loser Team:</span>";
          echo "<span class='record-value'>" . htmlspecialchars($loser_team) . "</span>";
          echo "</div>";
          echo "<div class='record-field'>";
          echo "<span class='record-label'>Loser City:</span>";
          echo "<span class='record-value'>" . htmlspecialchars($loser_city) . "</span>";
          echo "</div>";
          
          // Add "Add Another Record" button
          echo "<div style='text-align: center; margin-top: 20px;'>";
          echo "<button type='button' class='add-another-button' onclick='showFormAndReset()'>➕ Add Another Record</button>";
          echo "</div>";
          
          // Hide the form
          echo "<script>document.getElementById('recordForm').style.display = 'none';</script>";
          echo "</div>";
        } else {
          echo "<div class='error-message'>";
          echo "<h3>Error!</h3>";
          echo "Error inserting record: " . htmlspecialchars($stmt->error);
          echo "</div>";
        }
        $stmt->close();
      } else {
        echo "<div class='error-message'>";
        echo "<h3>Error!</h3>";
        echo "Error preparing statement: " . htmlspecialchars($conn->error);
        echo "</div>";
      }
    }
  }
  ?>
  </div>

  <script>
  function showFormAndReset() {
    // Show the form
    document.getElementById('recordForm').style.display = 'block';
    
    // Reset all form fields
    document.getElementById('winner_team').value = '';
    document.getElementById('winner_city').value = '';
    document.getElementById('year_t').value = '';
    document.getElementById('loser_team').value = '';
    document.getElementById('loser_city').value = '';
    
    // Scroll to the form
    document.getElementById('recordForm').scrollIntoView({ 
      behavior: 'smooth',
      block: 'start'
    });
    
    // Focus on the first input field
    document.getElementById('winner_team').focus();
  }
  </script>
</body>
</html>