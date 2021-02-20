<?php

$conn = mysqli_connect("localhost", "root", "111111", "opentutorials");


$sql = "SELECT * FROM topic LIMIT 1000";
$result = mysqli_query($conn, $sql);

//글 목록 출력 부분
$list = '';
while(($row = mysqli_fetch_array($result)) != NULL)
{
    //title은 사용자가 입력한 정보이기 때문에 escaping 해줘야함
    $escaped_title = htmlspecialchars($row['title']);

    //<li><a href=\"index.php?id=10\"><a/></li>
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
    //id값과 title 값이 while문 실행에 따라 정적으로 바뀜
}


//글 제목 / 글 내용 출력 부분
//article array 생성해서 key-value 값 Default 초기화
$article = array(
    'title'=>'Welcome',
    'description'=>'Hello, Web'
    //연관 배열 key-value Default Setting
);
$update_link = '';

if(isset($_GET['id']))
{
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM topic WHERE id={$filtered_id} LIMIT 1000";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article['title'] = htmlspecialchars($row['title']);
    $article['description'] = htmlspecialchars($row['description']);

    //id가 존재할 때만 업데이트 생성
    $update_link = '<a href="update.php?id='.$_GET['id'].'">Update</a>';
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

    <form action="process_create.php" method="post">
        <p><input type="text" name='title' placeholder="title" value="<?=$article['title']?>"></p>
        <p><textarea name="description" placeholder="description"><?=$article['description']?></textarea></p>
        <p><input type="submit"></p>
    </form>
    
</body>
</html>