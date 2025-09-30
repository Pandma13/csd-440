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
<head>
<meta charset="UTF-8">
<title>Character Information Form</title>
<style>
  :root {
    --bg: #f4f6fb;
    --surface: #ffffff;
    --text: #1f2937;
    --muted: #6b7280;
    --primary: #1896f7;
    --primary-hover: #0d7ed3;
    --ring: rgba(24, 150, 247, 0.35);
    --border: #e5e7eb;
  }
  * { box-sizing: border-box; }
  body {
    background-color: var(--bg);
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    color: var(--text);
  }
  h1 {
    color: var(--text);
    text-align: center;
    margin: 0 0 16px;
    padding: 16px 20px 0;
  }
  .container {
    max-width: 960px;
    margin: 0 auto;
    padding: 24px 20px 40px;
    text-align: center;
  }
  form {
    margin: 0 auto;
    width: 100%;
    max-width: 640px;
    text-align: left;
    background-color: var(--surface);
    padding: 24px;
    border-radius: 12px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.08);
    border: 1px solid var(--border);
  }
  label {
    display: block;
    font-weight: 600;
    margin: 16px 0 6px;
  }
  input[type="text"],
  input[type="number"],
  select {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid var(--border);
    border-radius: 8px;
    outline: none;
    color: var(--text);
    background: #fff;
    transition: box-shadow 0.15s ease, border-color 0.15s ease;
  }
  input[type="text"]:focus,
  input[type="number"]:focus,
  select:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 4px var(--ring);
  }
  /* Radios */
  input[type="radio"] { margin: 0 6px 0 0; }
  /* Current value display */
  form p {
    margin: 4px 0 8px;
    color: var(--muted);
  }
  form p .val {
    color: var(--text);
    font-weight: 700;
  }
  /* Helper text */
  .helper {
    display: inline-block;
    margin-left: 8px;
    color: var(--muted);
    font-size: 12px;
  }
  /* Stat number inputs */
  .stat-number {
    width: 120px;
    padding: 10px 12px;
    border: 1px solid var(--border);
    border-radius: 8px;
    outline: none;
    color: var(--text);
    background: #fff;
  }
  .stat-number:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 4px var(--ring);
  }
  /* Submit button */
  #submit {
    background-color: var(--primary);
    color: #fff;
    border-radius: 8px;
    padding: 10px 16px;
    border: none;
    cursor: pointer;
    font-weight: 700;
    box-shadow: 0 6px 16px rgba(24,150,247,0.25);
    transition: background-color 0.15s ease, box-shadow 0.15s ease, transform 0.02s ease;
  }
  #submit:hover { background-color: var(--primary-hover); }
  #submit:active { transform: translateY(1px); }
  #submit:focus { outline: none; box-shadow: 0 0 0 4px var(--ring); }
</style>
</head>

<body>
<div class="container">
<h1>Character Information Form</h1>
<p>Please fill out the following form to create your character.</p>
<p>All fields are required.</p>

<form action="MeganFormInput.php" method="post">

  <!-- Name -->
  <label for="name">Character Name:</label>
  <input type="text" id="name" name="name"><br><br> 

  <!-- Class -->
  <label for="class">Class:</label>
  <select id="class" name="class">
    <option value="">Select a class</option>
    <option>Barbarian</option>
    <option>Bard</option>
    <option>Cleric</option>
    <option>Druid</option>
    <option>Fighter</option>
    <option>Monk</option>
    <option>Paladin</option>
    <option>Ranger</option>
    <option>Rogue</option>
    <option>Sorcerer</option>
    <option>Warlock</option>
    <option>Wizard</option>
  </select><br><br>

  <!-- Level -->
  <label for="level">Level:</label>
  <input type="number" id="level" name="level" min="1" max="20" value="1" step="1"><span class="helper">(1–20)</span><br><br>

  <!-- Race -->
  <label for="race">Race:</label>
  <select id="race" name="race">
    <option value="">Select a race</option>
    <option>Human</option>
    <option>Elf</option>
    <option>Dwarf</option>
    <option>Halfling</option>
    <option>Gnome</option>
    <option>Half-Elf</option>
    <option>Half-Orc</option>
    <option>Tiefling</option>
    <option>Dragonborn</option>
    <option>Orc</option>
  </select><br><br>

  <!-- Gender -->
  <label for="gender">Gender:</label>
  <input type="radio" id="gender" name="gender" value="Male">Male<br>
  <input type="radio" id="gender" name="gender" value="Female">Female<br>
  <input type="radio" id="gender" name="gender" value="Other" checked>Other<br><br>

  <!-- Alignment -->
  <label for="alignment">Alignment:</label>
  <input type="radio" id="alignment" name="alignment" value="Lawful Good">Lawful Good<br>
  <input type="radio" id="alignment" name="alignment" value="Neutral Good">Neutral Good<br>
  <input type="radio" id="alignment" name="alignment" value="Chaotic Good">Chaotic Good<br>
  <input type="radio" id="alignment" name="alignment" value="Lawful Neutral">Lawful Neutral<br>
  <input type="radio" id="alignment" name="alignment" value="True Neutral" checked>True Neutral<br>
  <input type="radio" id="alignment" name="alignment" value="Chaotic Neutral">Chaotic Neutral<br>
  <input type="radio" id="alignment" name="alignment" value="Lawful Evil">Lawful Evil<br>
  <input type="radio" id="alignment" name="alignment" value="Neutral Evil">Neutral Evil<br>
  <input type="radio" id="alignment" name="alignment" value="Chaotic Evil">Chaotic Evil<br><br>

  <!-- Stats -->
  <label for="strength">Strength:</label>
  <input type="number" class="stat-number" id="strength" name="strength" min="1" max="20" value="10" step="1"><span class="helper">(1–20)</span><br>
  <label for="dexterity">Dexterity:</label>
  <input type="number" class="stat-number" id="dexterity" name="dexterity" min="1" max="20" value="10" step="1"><span class="helper">(1–20)</span><br>
  <label for="constitution">Constitution:</label>
  <input type="number" class="stat-number" id="constitution" name="constitution" min="1" max="20" value="10" step="1"><span class="helper">(1–20)</span><br>
  <label for="intelligence">Intelligence:</label>
  <input type="number" class="stat-number" id="intelligence" name="intelligence" min="1" max="20" value="10" step="1"><span class="helper">(1–20)</span><br>
  <label for="wisdom">Wisdom:</label>
  <input type="number" class="stat-number" id="wisdom" name="wisdom" min="1" max="20" value="10" step="1"><span class="helper">(1–20)</span><br>
  <label for="charisma">Charisma:</label>
  <input type="number" class="stat-number" id="charisma" name="charisma" min="1" max="20" value="10" step="1"><span class="helper">(1–20)</span><br><br>

  <!-- Submit button -->
  <input type="submit" id="submit" value="Submit"><br><br>
</form>
</div>
</body>