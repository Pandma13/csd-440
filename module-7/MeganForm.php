<?php
/*
  Megan Wheeler
  CSD 440
  Module 7
  9/13/2025

  Instructions:
  Write a form program that will:
    1. prompt a user to enter seven different fields of data
    2. use a minimum of four different data type entries
    3. when the form is submitted to your PHP CGI it will:
      - verify all fields were populated
      - verify the data was correctly entered
    4. in your return it will:
      - display the data entered in a well formatted page
      - otherwise return an error display to report the problem
*/
echo "<html>";
echo "<head>";
echo "<title>Megan Form</title>";
echo "</head>"; 
echo "<body>";

$backgroundColours = array(
  'white' => '#FFFFFF',
  'red' => '#FF0000',
  'green' => '#00FF00',
  'blue' => '#0000FF',
);

$fontColours = array(
  'black' => '#000000',
  'orange' => '#FFA500',
  'yellow' => '#FFFF00',
  'purple' => '#800080',
);

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$favoriteAnimal = $_POST['favoriteAnimal'];
$backgroundColour = $backgroundColours[$_POST['backgroundColour']];
$fontColour = $fontColours[$_POST['fontColour']];
$fontSize = $_POST['fontSize'];

if (empty($name) || empty($email) || empty($message) || empty($favoriteAnimal) || empty($backgroundColour) || empty($fontColour) || empty($fontSize)) {
  echo "Error: All fields are required";
  exit;
}

echo "<body style='background-color: " . $backgroundColour . "; color: " . $fontColour . "; font-size: " . $fontSize . "px;'>";
echo "<h1>Megan Form Results</h1>";
echo "Name: " . $name . "<br>";
echo "Email: " . $email . "<br>";
echo "Message: " . $message . "<br>";
echo "Favorite Animal: " . $favoriteAnimal . "<br>";
echo "Background Colour: " . $_POST['backgroundColour'] . "<br>";
echo "Font Colour: " . $_POST['fontColour'] . "<br>";
echo "Font Size: " . $_POST['fontSize'] . "<br>";
echo "</body>";
echo "</html>";
?>