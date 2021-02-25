<?php

$conn = mysqli_connect('localhost', 'root', '111111', 'opentutorials');


settype($_POST['id'], 'integer');
$filtered = array(
    'id'=>mysqli_real_escape_string($conn, $_POST['id']),
    'name'=>mysqli_real_escape_string($conn, $_POST['name']),
    'profile'=>mysqli_real_escape_string($conn, $_POST['profile'])
);

$sql = "
    UPDATE author
        SET
            name =  '{$filtered['name']}',
            profile = '{$filtered['profile']}'
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
    header('Location: author.php?id='.$filtered['id']);
}
//잘 실행되었는지 sql문 확인
echo $sql;

?>