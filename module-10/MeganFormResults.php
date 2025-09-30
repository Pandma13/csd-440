<!DOCTYPE html>
<!--
Megan Wheeler
CSD 440
Assignment 10
September 29, 2025

Assignment:
 - Write a form program that prompts a user to enter a minimum of 8 different fields of data.
 - When the form is submitted to your PHP CGI, use the function json_encode to encode your data into a JSON format.
 - Then, in your return, display the data in the JSON format inside a well-formatted output display,
   otherwise you will return an error display to report the problem.
-->
<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
$result = isset($_SESSION['form_result']) ? $_SESSION['form_result'] : null;
// One-time read
unset($_SESSION['form_result']);

$errors = $result && isset($result['errors']) ? $result['errors'] : [];
$payload = $result && isset($result['payload']) ? $result['payload'] : null;
$hasErrors = is_array($errors) && count($errors) > 0;
$json = $payload !== null ? json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) : null;
?>
<head>
<meta charset="UTF-8">
<title>Megan Form Results</title>
<style>
  :root {
    --bg: #f4f6fb;
    --surface: #ffffff;
    --text: #1f2937;
    --muted: #6b7280;
    --primary: #1896f7;
    --border: #e5e7eb;
  }
  * { box-sizing: border-box; }
  body {
    background-color: var(--bg);
    margin: 0;
    padding: 24px 16px 40px;
    font-family: Arial, sans-serif;
    color: var(--text);
  }
  .container { max-width: 840px; margin: 0 auto; }
  h1 { text-align: center; margin: 0 0 16px; }
  .card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 12px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.08);
    padding: 20px;
  }
  pre {
    background: #0b1020;
    color: #dcf0ff;
    border-radius: 8px;
    padding: 16px;
    overflow: auto;
    line-height: 1.4;
  }
  .error-list {
    color: #b91c1c;
    background: #fee2e2;
    border: 1px solid #fecaca;
    border-radius: 8px;
    padding: 12px 14px;
    margin: 0 0 16px;
  }
  .back {
    display: inline-block;
    margin-top: 12px;
    color: #fff;
    background: var(--primary);
    text-decoration: none;
    padding: 8px 12px;
    border-radius: 8px;
  }
  .back:hover { background: #0d7ed3; }
  .meta { color: var(--muted); font-size: 14px; margin: 0 0 8px; }
</style>
</head>
<body>
<div class="container">
  <h1>Megan Form Results</h1>
  <div class="card">
    <?php if ($hasErrors): ?>
      <div class="error-list">
        <strong>There were problems with your submission:</strong>
        <ul>
          <?php foreach ($errors as $e): ?>
            <li><?php echo htmlspecialchars($e); ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <a class="back" href="MeganForm.php">Go back and fix</a>
    <?php elseif ($json !== null): ?>
      <p class="meta">Your character data encoded as JSON:</p>
      <pre><?php echo htmlspecialchars($json); ?></pre>
      <a class="back" href="MeganForm.php">Create another</a>
    <?php else: ?>
      <p>No form submission found. Please start at the form.</p>
      <a class="back" href="MeganForm.php">Go to form</a>
    <?php endif; ?>
  </div>
</div>
</body>
</html>