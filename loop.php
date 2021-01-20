<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>While</h1>
    <?php
    $a = 5;
    echo '1<br>';
    while ($a--) 
    {
        echo '2<br>';
    }
    $i = 0;
    while ($i < 3) 
    {
        echo '3<br>';
        $i += 1;
    }
    ?>
</body>

</html>