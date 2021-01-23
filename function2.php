<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Function</title>
</head>
<body>
    <h1>Function</h1>
    <h2>Basic</h2>
    <?php
        function basic()
        {
            print("lorem<br>");
            print("lorem2<br>");
        }

        basic();
        basic();
    ?>

    <h2>parameter & argument</h2>
    <?php
    function sum($left, $right)
    {
        print($left + $right);
        print("<br>");
    }
    sum(2, 4);
    sum(4, 6);
    ?>
</body>
</html>