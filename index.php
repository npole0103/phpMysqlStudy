<?php

$conn = mysqli_connect("localhost", "root", "111111", "opentutorials");


$sql = "SELECT * FROM topic LIMIT 1000";
$result = mysqli_query($conn, $sql);
$list = '';
while(($row = mysqli_fetch_array($result)) != NULL)
{
    //<li><a href=\"index.php?id=10\"><a/></li>
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
    //id값과 title 값이 while문 실행에 따라 정적으로 바뀜
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB</title>
</head>
<body>
    <h1>WEB</h1>
    <ol>
        <?=$list
        //PHP TEXT LIST CODE
        ?>
    </ol>

    <a href="create.php">Create</a>

    <H2>Welcome</H2>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus
    , consectetur ratione sed veritatis dolore aperiam est reprehend
    erit repellat! Sit similique omnis eveniet sequ
    i laborum autem veniam assumenda commodi est possimus.
    
</body>
</html>