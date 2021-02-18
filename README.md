# phpMysqlStudy
PHP MySQL Study

## PHP & MySQL 연동 원리

1. 웹브라우저가 index.php를 요청
2. 웹 서버가 php에 해당되는 코드를 php에 넘기고 php 문법에 따라 해석함
3. php문 안에 있는 SQL 관련 코드를 MySQL에 request를 넘기고 response를 받음.

웹의 접근성 & 데이터베이스 데이터 효율적 관리

php와 MySQL을 연동할 수 있는 API는 3가지가 있다.
PDO Mysql은 객체를 사용하지만 오라클 같은 데이터베이스에 이식성이 좋으며
mysql은 더 이상 추천되지 않는 api이다. 

그래서 mysql improved로 진행한다.

Mysqli / PDO Mysql / Mysql

함수(procedual)와 객체지향(objective) 방식이 있는데 함수 방식을 사용할 것임.

`mysqli_connect()` : DB에서 로그인한 것과 같은 효과를 PHP에서 수행할 수 있다.

`mysqli_query()` : 커넥트한 DB에 Query문 전송

``` php
mysqli_query($conn, "
    INSERT INTO topic
    (title, description, created)
    VALUE(
        'MySQL',
        'MySQL is ..',
        NOW()
    )
");
```

`mysqli_error()` : sql문의 에러를 반환 해줌.

---

## 글쓰기 생성
``` php
<?php

$conn = mysqli_connect('localhost', 'root', '111111', 'opentutorials');


$sql = "
    INSERT INTO topic
        (title, description, created)
        VALUES(
            '{$_POST['title']}',
            '{$_POST['description']}',
            NOW()
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
echo $sql;

?>
```

`SELECT * FROM topic LIMIT 1000` : 많은 양의 데이터가 있을 때 SELECT를 해버리면 수십만개의 데이터를 가져오는 상황이 초래될 수 있다. 이를 방지하기 위해 'LIMIT 1000' 이라는 명령어를 입력할 수 있는데 이는 데이터가 몇개든 1000개까지만 보여준다.

`mysqli_fetch_array($result);` : mysqli_query에 SELECT 문을 실행시켰을 때 거기서 나온 값을 하나하나 받아오는 함수. 가져올 값이 없다면 NULL을 반환함.

``` php

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

```

## etc

PHP 는  Middle-Ware라고도 한다. 웹과 데이터베이스 중간에서 매개 역할을 하기 떄문이다.

---
