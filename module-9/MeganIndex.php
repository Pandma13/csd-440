<?php
// Include the database connection functions
require_once 'MeganDatabaseConnection.php';
?>
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
<title>Megan Index</title>
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
    
    .nav-sections {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        margin-top: 30px;
    }
    
    .nav-section {
        text-align: center;
    }
    
    .nav-section h3 {
        color: #333;
        margin-bottom: 20px;
        font-size: 1.5em;
        font-weight: 400;
        border-bottom: 2px solid #1896f7;
        padding-bottom: 10px;
    }
    
    .nav-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 15px;
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
        
        .nav-sections {
            grid-template-columns: 1fr;
            gap: 30px;
        }
        
        .nav-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }
    }
    
    .timeout-warning {
        background: #fff3cd !important;
        border-left-color: #ffc107 !important;
        color: #856404 !important;
    }
    
    .timeout-critical {
        background: #f8d7da !important;
        border-left-color: #dc3545 !important;
        color: #721c24 !important;
    }
</style>
<script>
// Auto-refresh the page every 30 seconds to update timeout counter
setTimeout(function() {
    window.location.reload(true); // Force reload from server
}, 30000);
</script>
</head>
<body>
  <div class="container">
    <h1>Megan Index</h1>
    
    <?php
    // Start session for connection timeout tracking
    session_start();
    
    // Handle database connection actions
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'connect') {
            $conn = connectToDatabaseSilent();
            if ($conn) {
                // Store connection status and timestamp for timeout tracking
                $_SESSION['db_connected'] = true;
                $_SESSION['connection_time'] = time();
                echo "<div style='background: #d4edda; padding: 10px; border-radius: 5px; margin-bottom: 15px; color: #155724;'>Database connected successfully. Connection will timeout after " . DB_TIMEOUT . " seconds (" . floor(DB_TIMEOUT/60) . " minutes) of inactivity.<br>";
            } else {
                $_SESSION['db_connected'] = false;
                echo "<div style='background: #f8d7da; padding: 10px; border-radius: 5px; margin-bottom: 15px; 
                color: #721c24;'>Failed to connect to database.</div>";
            }
        } elseif ($_GET['action'] == 'close') {
            if (isConnectionValid()) {
                // Create a new connection to properly close it
                $conn = connectToDatabaseSilent();
                if ($conn) {
                    if (closeDatabaseSilent($conn)) {
                        $_SESSION['db_connected'] = false;
                        unset($_SESSION['connection_time']);
                        echo "<div style='background: #d4edda; padding: 15px; border-radius: 8px; margin-bottom: 15px; 
                        color: #155724; border-left: 4px solid #28a745;'>
                                <strong>✓ Success:</strong> Database connection closed successfully.
                              </div>";
                    } else {
                        $_SESSION['db_connected'] = false;
                        unset($_SESSION['connection_time']);
                        echo "<div style='background: #f8d7da; padding: 15px; border-radius: 8px; margin-bottom: 15px; 
                        color: #721c24; border-left: 4px solid #dc3545;'>
                                <strong>✗ Error:</strong> Failed to close database connection properly.
                              </div>";
                    }
                } else {
                    // Connection was already closed or invalid
                    $_SESSION['db_connected'] = false;
                    unset($_SESSION['connection_time']);
                    echo "<div style='background: #fff3cd; padding: 15px; border-radius: 8px; margin-bottom: 15px; 
                    color: #856404; border-left: 4px solid #ffc107;'>
                            <strong>⚠ Warning:</strong> Database connection was already closed or invalid.
                          </div>";
                }
            } else {
                echo "<div style='background: #fff3cd; padding: 15px; border-radius: 8px; margin-bottom: 15px; 
                color: #856404; border-left: 4px solid #ffc107;'>
                        <strong>⚠ Warning:</strong> No active database connection found to close.
                      </div>";
            }
        }
    }
    
    // Display connection status with timeout information
    if (isConnectionValid()) {
        $timeAgo = time() - $_SESSION['connection_time'];
        $timeRemaining = getConnectionTimeRemaining();
        $minutes = floor($timeRemaining / 60);
        $seconds = $timeRemaining % 60;
        
        // Determine status color based on remaining time
        $statusClass = '';
        if ($timeRemaining <= 60) {
            $statusClass = 'timeout-critical';
        } elseif ($timeRemaining <= 120) {
            $statusClass = 'timeout-warning';
        }
        
        echo "<div class='$statusClass' style='padding: 10px; border-radius: 5px; margin-bottom: 15px; 
        border-left: 4px solid #17a2b8;'>
                <strong>📊 Database Status:</strong> Connected (connected " . $timeAgo . " seconds ago)<br>
                <small>⏰ Timeout in: " . $minutes . "m " . $seconds . "s</small>
              </div>";
    } else {
        echo "<div style='background: #f8d7da; padding: 10px; border-radius: 5px; margin-bottom: 15px; 
        color: #721c24; border-left: 4px solid #dc3545;'>
                <strong>📊 Database Status:</strong> Not Connected
              </div>";
    }
    ?>
    
    <div class="nav-sections">
        <div class="nav-section">
            <h3>New</h3>
            <div class="nav-grid">
                <a href="?action=connect" class="nav-button">Connect to Database</a>
                <a href="MeganNewRecord.php" class="nav-button">New Record</a>
                <a href="MeganQuery.php" class="nav-button">Query</a>
                <a href="?action=close" class="nav-button">Close Database</a>
            </div>
        </div>
        
        <div class="nav-section">
            <h3>Old</h3>
            <div class="nav-grid">
                <a href='MeganCreateTable.php' class="nav-button">Create Table</a>
                <a href='MeganDropTable.php' class="nav-button">Drop Table</a>
                <a href='MeganPopulateTable.php' class="nav-button">Populate Table</a>
                <a href='MeganQueryTable.php' class="nav-button">Query Table</a>
            </div>
        </div>
    </div>
  </div>
</body>
</html>