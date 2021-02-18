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

//article array 생성해서 key-value 값 Default 초기화
$article = array(
    'title'=>'Welcome',
    'description'=>'Hello, Web'
    //연관 배열 key-value Default Setting
);

if(isset($_GET['id']))
{
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM topic WHERE id={$filtered_id} LIMIT 1000";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article['title'] = $row['title'];
    $article['description'] = $row['description'];
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
    <h1><a href="index.php">WEB</a></h1>
    <ol>
        <?=$list
        //PHP TEXT LIST CODE
        ?>
    </ol>

    <a href="create.php">Create</a>

    <h2><?=$article['title']?></h2>
    <?=$article['description']?>
    
</body>
</html>