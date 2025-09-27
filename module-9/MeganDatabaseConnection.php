<?php
/**
  * Megan Wheeler
  * CSD 440
  * Module 9
  * 9/26/2025
*/

// Connection timeout in seconds (10 minutes)
if (!defined('DB_TIMEOUT')) {
    define('DB_TIMEOUT', 600);
}

/**
 * Establishes a database connection without echoing connection messages
 * @return mysqli|false Returns mysqli connection object on success, false on failure
 */
function connectToDatabaseSilent() {
    $conn = new mysqli("localhost", "student1", "pass", "baseball_01");
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Set connection timeout
    $conn->options(MYSQLI_OPT_CONNECT_TIMEOUT, 5);
    
    return $conn;
}

/**
 * Checks if the current connection is still valid and within timeout
 * @return bool Returns true if connection is valid and not timed out
 */
function isConnectionValid() {
    if (!isset($_SESSION['db_connected']) || !$_SESSION['db_connected']) {
        return false;
    }
    
    if (!isset($_SESSION['connection_time'])) {
        return false;
    }
    
    // Check if connection has timed out
    $timeSinceConnection = time() - $_SESSION['connection_time'];
    if ($timeSinceConnection > DB_TIMEOUT) {
        // Connection has timed out
        $_SESSION['db_connected'] = false;
        unset($_SESSION['connection_time']);
        return false;
    }
    
    return true;
}

/**
 * Gets the remaining time before connection timeout
 * @return int Seconds remaining before timeout, or 0 if no connection
 */
function getConnectionTimeRemaining() {
    if (!isConnectionValid()) {
        return 0;
    }
    
    $timeSinceConnection = time() - $_SESSION['connection_time'];
    $remaining = DB_TIMEOUT - $timeSinceConnection;
    return max(0, $remaining);
}

/**
 * Closes the database connection without echoing disconnect messages
 * @param mysqli $conn The database connection to close
 * @return bool Returns true if connection was closed successfully, false otherwise
 */
function closeDatabaseSilent($conn) {
    if ($conn) {
        try {
            // Check if connection is still valid before attempting to close
            if ($conn->ping()) {
                $conn->close();
                return true;
            } else {
                // Connection is already closed
                return true;
            }
        } catch (Error $e) {
            // Connection object is corrupted or already closed
            return true; // Consider this a success since the goal is to "close" the connection
        } catch (Exception $e) {
            return false;
        }
    }
    return false;
}
?>