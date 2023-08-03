<?php
    session_start();

    if (!isset($_SESSION["usuario"])) {
        require("nonauthorized.php");
        die();
    }    
    
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>University</title>
        <link href="../output.css" rel="stylesheet">
    </head>
    <body>
        <div class="flex items-center justify-center text-blue-700 text-xl h-20">
              <?= $_SESSION["mensaje"]; ?>
        </div>
        <script src="https://cdn.tailwindcss.com"></script>
    </body>
    </html>    