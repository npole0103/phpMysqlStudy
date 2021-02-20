<?php

$conn = mysqli_connect('localhost', 'root', '111111', 'opentutorials');


settype($_POST['id'], 'integer');
$filtered = array(
    'id'=>mysqli_real_escape_string($conn, $_POST['id'])
);

$sql = "
    DELETE
        FROM topic
        WHERE id = {$filtered['id']}
";

$result = mysqli_query($conn, $sql);
if($result === false)
{
    echo '삭제 에러. 관리자에게 문의바랍니다.';
    error_log(mysqli_error($conn));
}
else
{
    echo '삭제했습니다. <a href="index.php">돌아가기</a>';
}

//잘 실행되었는지 sql문 확인
echo $sql;

?>