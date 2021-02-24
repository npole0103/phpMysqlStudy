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

//저자 정보를 가지고옴
$sql = "SELECT * FROM author";
$result = mysqli_query($conn, $sql);

$select_form = '<select name="author_id">';
while(($row = mysqli_fetch_array($result)) != NULL)
{
    $select_form = $select_form.'<option value='.$row['id'].'>'.$row['name'].'</option>';
}
$select_form = $select_form.'</select>';
/*
완성 된 태그는
<select name="author_id">
    <option value="id">저자정보1</option>
    <option value="id">저자정보2</option>
    <option value="id">저자정보3</option>
</select>

이렇게 된 태그는 옵션 중에 선택한 id값을 form 태그 내에서 author_id 라는 변수에 저장해서 보낸다.
*/
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
        <p><input type="text" name='title' placeholder="title"></p>
        <p><textarea name="description" placeholder="description"></textarea></p>
        <?=$select_form?>
        <p><input type="submit"></p>
    </form>
    
</body>
</html>