<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>WEB</h1>
    <ol>
        <li><a href="index.php?id=HTML">HTML</a></li>
        <li><a href="index.php?id=CSS">CSS</a></li>
        <li><a href="index.php?id=JavaScript">JavaScript</a></li>
    </ol>
    <h2>
        <?php
            echo $_GET['id'];
        ?>
    </h2>
    Lorem ipsum dolor sit amet consectetur adipisi
    cing elit. Consequuntur, quo quam a modi fugit, doloremque voluptatib
    us hic, rem ab tempore tempora molestias excepturi eaque non voluptatu
    m sit at placeat sequi?
</body>

</html>