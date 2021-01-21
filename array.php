<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Array</h1>
    <?php
    $coworkers = array('npole0103', 'leezche', 'duru', 'taeho');
    echo $coworkers[1].'<br>';
    echo $coworkers[2].'<br>';
    echo $coworkers[3].'<br>';

    echo var_dump(count($coworkers)).'<br>';

    echo array_push($coworkers, 'graphittie').'<br>';

    echo var_dump($coworkers).'<br>';
    ?>
</body>
</html>