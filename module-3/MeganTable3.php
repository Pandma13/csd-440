<?php
/*
    Megan Wheeler
    CSD 440
    Module 3
    8/23/2025

    Starting with the PHP table created in Module 2, write a function that will be
    used to generate the value to be displayed in each cell.
    The function will take two random numbers as the parameters and will then return
    the sum.
    The function is to be placed in an external file.
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Megan's 3rd Table Program</title>
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

    <h1>Megan's 3rd Table Program</h1>

    <p>This program creates a table with 10 rows and 10 columns, and fills each cell with a sum of two random numbers.</p>

    <!-- Create a table with 10 rows and 10 columns -->
    <div class="table-container">
    <table>
    <!-- Loop through each row -->
    <?php require __DIR__ . '/MeganAddRandomNumbers.php';
        for ($i = 0; $i < 10; $i++) { ?>
        <tr>
        <?php for ($j = 0; $j < 10; $j++) { ?>
            <td>
                <?php echo addRandomNumbers(rand(1, 100), rand(1, 100)); ?>
            </td>
        <?php } ?>
        </tr>
    <?php } ?>
    </table>
    </div>
</body>
</html>