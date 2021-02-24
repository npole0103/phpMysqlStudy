<?php

$conn = mysqli_connect('localhost', 'root', '111111', 'opentutorials');

$filtered = array(
    'title'=>mysqli_real_escape_string($conn, $_POST['title']),
    'description'=>mysqli_real_escape_string($conn, $_POST['description']),
    'author_id'=>mysqli_real_escape_string($conn, $_POST['author_id'])
);

$sql = "
    INSERT INTO topic
        (title, description, created, author_id)
        VALUES(
            '{$filtered['title']}',
            '{$filtered['description']}',
            NOW(),
            '{$filtered['author_id']}'
        )
";

$result = mysqli_query($conn, $sql);
if($result === false)
{
    echo '저장 에러. 관리자에게 문의바랍니다.';
    error_log(mysqli_error($conn));
}
else
{
    echo '글쓰기 성공 <a href="index.php">돌아가기</a>';
}

//잘 실행되었는지 sql문 확인
echo $sql;


?>