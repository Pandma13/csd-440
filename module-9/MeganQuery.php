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
<title>Megan Query</title>
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
    }
</style>
</head>
<body>
  <div class="container">
  <h1>Megan Query</h1>
  <div class="nav-bar">
    <a href="MeganIndex.php" class="nav-button">Return to Index</a>
  </div>
  <br>

  <?php
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

  // Handle record selection
  $selectedRecord = null;
  if (isset($_POST['record_id']) && !empty($_POST['record_id'])) {
    $recordId = intval($_POST['record_id']);
    $sql = "SELECT * FROM Baseball_Wins_PHP WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $recordId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
      $selectedRecord = $result->fetch_assoc();
    }
    $stmt->close();
  }

  // Get all records for dropdown
  $sql = "SELECT id, winner_team, winner_city, year_t FROM Baseball_Wins_PHP ORDER BY year_t DESC";
  $result = $conn->query($sql);

  ?>

  <!-- Record Selection Form -->
  <div style="margin-bottom: 30px;">
    <form method="POST" action="">
      <label for="record_id" style="display: block; margin-bottom: 10px; font-weight: bold; color: #333;">Select a record to view:</label>
      <select name="record_id" id="record_id" style="padding: 10px; border: 2px solid #1896f7; border-radius: 5px; font-size: 16px; width: 100%; max-width: 400px; margin-bottom: 15px;">
        <option value="">-- Choose a record --</option>
        <?php
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $selected = (isset($_POST['record_id']) && $_POST['record_id'] == $row['id']) ? 'selected' : '';
            echo "<option value='" . $row['id'] . "' $selected>" . $row['winner_team'] . " (" . $row['winner_city'] . ") - " . $row['year_t'] . "</option>";
          }
        }
        ?>
      </select>
      <br>
      <button type="submit" style="background: linear-gradient(135deg, #1896f7, #0d6efd); color: white; padding: 12px 25px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; transition: all 0.3s ease;">View Record</button>
    </form>
  </div>

  <?php
  // Display selected record
  if ($selectedRecord) {
    echo "<div style='background: #f8f9fa; padding: 20px; border-radius: 10px; margin-bottom: 20px; border-left: 4px solid #1896f7;'>";
    echo "<h3 style='color: #333; margin-bottom: 15px;'>Selected Record Details:</h3>";
    echo "<table style='width: 100%; border-collapse: collapse;'>";
    echo "<tr style='background: #e9ecef;'>";
    echo "<th style='padding: 12px; text-align: left; border: 1px solid #dee2e6;'>Field</th>";
    echo "<th style='padding: 12px; text-align: left; border: 1px solid #dee2e6;'>Value</th>";
    echo "</tr>";
    echo "<tr><td style='padding: 12px; border: 1px solid #dee2e6; font-weight: bold;'>ID</td><td style='padding: 12px; border: 1px solid #dee2e6;'>" . $selectedRecord['id'] . "</td></tr>";
    echo "<tr><td style='padding: 12px; border: 1px solid #dee2e6; font-weight: bold;'>Winner Team</td><td style='padding: 12px; border: 1px solid #dee2e6;'>" . $selectedRecord['winner_team'] . "</td></tr>";
    echo "<tr><td style='padding: 12px; border: 1px solid #dee2e6; font-weight: bold;'>Winner City</td><td style='padding: 12px; border: 1px solid #dee2e6;'>" . $selectedRecord['winner_city'] . "</td></tr>";
    echo "<tr><td style='padding: 12px; border: 1px solid #dee2e6; font-weight: bold;'>Year</td><td style='padding: 12px; border: 1px solid #dee2e6;'>" . $selectedRecord['year_t'] . "</td></tr>";
    echo "<tr><td style='padding: 12px; border: 1px solid #dee2e6; font-weight: bold;'>Loser Team</td><td style='padding: 12px; border: 1px solid #dee2e6;'>" . $selectedRecord['loser_team'] . "</td></tr>";
    echo "<tr><td style='padding: 12px; border: 1px solid #dee2e6; font-weight: bold;'>Loser City</td><td style='padding: 12px; border: 1px solid #dee2e6;'>" . $selectedRecord['loser_city'] . "</td></tr>";
    echo "</table>";
    echo "</div>";
  }
  ?>
  </div>
</body>
</html>