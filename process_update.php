<?php

$conn = mysqli_connect('localhost', 'root', '111111', 'opentutorials');


settype($_POST['id'], 'integer');
$filtered = array(
    'id'=>mysqli_real_escape_string($conn, $_POST['id']),
    'title'=>mysqli_real_escape_string($conn, $_POST['title']),
    'description'=>mysqli_real_escape_string($conn, $_POST['description'])
);

$sql = "
    UPDATE topic
        SET
            title =  '{$filtered['title']}',
            description = '{$filtered['description']}'
        WHERE
            id = {$filtered['id']}
";

$result = mysqli_query($conn, $sql);
if($result === false)
{
    echo '업데이트 에러. 관리자에게 문의바랍니다.';
    error_log(mysqli_error($conn));
}
else
{
    echo '업데이트 성공 <a href="index.php">돌아가기</a>';
}

//잘 실행되었는지 sql문 확인
echo $sql;

?>