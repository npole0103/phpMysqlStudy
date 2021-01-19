<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>function</h1>
    <?php
    $str = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam iure
    , nulla consequuntur labore numquam eos quo. Quo, recusandae! Iste ve
    
    ro repudiandae ex placeat maiores ducimus, sequi impedit porro aut su
    scipit!";
    ?>

    <h2>Strlen()</h2>
    
    <?php
    echo strlen($str);
    ?>

    <h2>nl2br</h2>
    <?php
    echo nl2br($str);
    ?>
</body>
</html>