<?php
/**
 * Megan Wheeler
 * CSD 440
 * Assignment 10
 * September 29, 2025

 * Assignment:
 *  - Write a form program that prompts a user to enter a minimum of 8 different fields of data.
 *  - When the form is submitted to your PHP CGI, use the function json_encode to encode your data into a JSON format.
 *  - Then, in your return, display the data in the JSON format inside a well-formatted output display,
 *    otherwise you will return an error display to report the problem.
 */

// Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405);
  echo 'Method Not Allowed';
  exit;
}

// Use session to transfer results to results page (PRG pattern)
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

function sanitize_text(string $value): string {
  return trim(filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
}

function read_int(string $key, int $min, int $max): array {
  $raw = filter_input(INPUT_POST, $key, FILTER_VALIDATE_INT);
  if ($raw === null || $raw === false) {
    return [null, "$key must be an integer between $min and $max."];
  }
  if ($raw < $min || $raw > $max) {
    return [null, "$key must be between $min and $max."];
  }
  return [(int)$raw, null];
}

$errors = [];

$name = isset($_POST['name']) ? sanitize_text($_POST['name']) : '';
if ($name === '') { $errors[] = 'Name is required.'; }

$class = isset($_POST['class']) ? sanitize_text($_POST['class']) : '';
$allowedClasses = [
  'Barbarian','Bard','Cleric','Druid','Fighter','Monk','Paladin','Ranger','Rogue','Sorcerer','Warlock','Wizard'
];
if ($class === '' || !in_array($class, $allowedClasses, true)) { $errors[] = 'Class selection is invalid.'; }

[$level, $levelErr] = read_int('level', 1, 20);
if ($levelErr) { $errors[] = $levelErr; }

$race = isset($_POST['race']) ? sanitize_text($_POST['race']) : '';
$allowedRaces = [
  'Human','Elf','Dwarf','Halfling','Gnome','Half-Elf','Half-Orc','Tiefling','Dragonborn','Orc'
];
if ($race === '' || !in_array($race, $allowedRaces, true)) { $errors[] = 'Race selection is invalid.'; }

$allowedGenders = ['Male','Female','Other'];
$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
if (!in_array($gender, $allowedGenders, true)) { $errors[] = 'Gender selection is invalid.'; }

$allowedAlignments = ['Lawful Good','Neutral Good','Chaotic Good','Lawful Neutral','True Neutral','Chaotic Neutral','Lawful Evil','Neutral Evil','Chaotic Evil'];
$alignment = isset($_POST['alignment']) ? $_POST['alignment'] : '';
if (!in_array($alignment, $allowedAlignments, true)) { $errors[] = 'Alignment selection is invalid.'; }

[$strength, $strengthErr] = read_int('strength', 1, 20);
if ($strengthErr) { $errors[] = $strengthErr; }
[$dexterity, $dexterityErr] = read_int('dexterity', 1, 20);
if ($dexterityErr) { $errors[] = $dexterityErr; }
[$constitution, $constitutionErr] = read_int('constitution', 1, 20);
if ($constitutionErr) { $errors[] = $constitutionErr; }
[$intelligence, $intelligenceErr] = read_int('intelligence', 1, 20);
if ($intelligenceErr) { $errors[] = $intelligenceErr; }
[$wisdom, $wisdomErr] = read_int('wisdom', 1, 20);
if ($wisdomErr) { $errors[] = $wisdomErr; }
[$charisma, $charismaErr] = read_int('charisma', 1, 20);
if ($charismaErr) { $errors[] = $charismaErr; }

$hasErrors = count($errors) > 0;

$payload = null;
if (!$hasErrors) {
  $payload = [
    'name' => $name,
    'class' => $class,
    'level' => $level,
    'race' => $race,
    'gender' => $gender,
    'alignment' => $alignment,
    'stats' => [
      'strength' => $strength,
      'dexterity' => $dexterity,
      'constitution' => $constitution,
      'intelligence' => $intelligence,
      'wisdom' => $wisdom,
      'charisma' => $charisma
    ]
  ];
}

// Prepare session payload and redirect to results page
$_SESSION['form_result'] = [
  'errors' => $errors,
  'payload' => $payload,
];

header('Location: MeganFormResults.php');
exit;