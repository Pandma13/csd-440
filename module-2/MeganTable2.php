<?php
/*
    Megan Wheeler
    CSD 440
    Module 2
    8/23/2025

    Write a program that creates an HTML table using a PHP nested loop structure.
    In the loop structure you are to display a two dimensional table holding PHP
    generated random numbers in each cell.
    Do not use PHP to display the actual table tags.
    This will require several opening and closing PHP tags such as <?php ?>.
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Megan's 2nd Table Program</title>
</head>

<style>
    .table-container {
        display: flex;
        justify-content: center;
        width: 80%;
        margin: 0 auto;
    }
    table {
        table-layout: fixed;
        display: table;
        border-collapse: collapse;
        border: 3px solid #000;
    }
    td {
        padding: 8px;
        text-align: center;
        border: 2px solid #000;
    }
    h1 {
        font-size: 24px;
    }
    body {
        background-color: #f0f0f0;
        font-family: Arial, sans-serif;
        font-size: 16px;
        text-align: center;
    }
</style>

<body>

    <h1>Megan's 2nd Table Program</h1>

    <p>This program creates a table with 10 rows and 10 columns, and fills each cell with a random number between 1 and 100.</p>

    <!-- Create a table with 10 rows and 10 columns -->
    <div class="table-container">
    <table>
    <!-- Loop through each row -->
    <?php for ($i = 0; $i < 10; $i++) { ?>
        <tr>
        <?php for ($j = 0; $j < 10; $j++) { ?>
            <td>
                <?php echo rand(1, 100); ?>
            </td>
        <?php } ?>
        </tr>
    <?php } ?>
    </table>
    </div>
</body>
</html>