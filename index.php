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
$delete_link = '';
$author = '';

if(isset($_GET['id']))
{
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    
    // JOIN된 테이블, topic과 author가 합쳐진 테이블을 가져옴
    $sql = "SELECT * FROM topic LEFT JOIN author ON topic.author_id = author.id WHERE topic.id={$filtered_id} LIMIT 1000";

    //쿼리문으로 한 줄 읽어옴
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    //데이터가 존재할 때 article에 담아서 보여줌
    $article['title'] = htmlspecialchars($row['title']);
    $article['description'] = htmlspecialchars($row['description']);
    $article['name'] = htmlspecialchars($row['name']);

    //id가 존재할 때만 업데이트 생성
    $update_link = '<a href="update.php?id='.$_GET['id'].'">Update</a>';

    //id가 존재할 때만 삭제 생성
    $delete_link = '
        <form action="process_delete.php" method="post">
            <input type="hidden" name="id" value="'.$_GET['id'].'">
            <input type="submit" value="Delete">
        </form>
    ';

    //id가 존재할 때만 author 출력
    $author = "<p>by {$article['name']}</p>";
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

    <!--특정 글을 눌렀을 때만 Update 버튼 생성-->
    <?=$update_link?>

    <!--특정 글을 눌렀을 때만 Delete 버튼 생성-->
    <?=$delete_link?>

    <h2><?=$article['title']?></h2>
    <?=$article['description']?>
    <?=$author?>
    
</body>
</html>