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

---

## 보안

filtering(필터링) : 들어오는 정보에서 문제가 있는 정보를 막아내는 것.

escaping(이스케이핑) : 문제 있는 정보가 이미 들어온 상태에서 사용자에게 노출될 떄 차단하는 것.

사용자가 SQL문을 주입하는 상황을 예측하고 사용자의 입력 정보를 불신해야한다.

### filtering

 `mysqli_real_escape_string($conn, Value)` : 주입 공격 기호(SQL 인젝션 등등)들을 문자로 치환해버리는 함수. 사용자의 입력을 받거나 $GET / $POST로 가져오는 값에 사용하면 공격을 필터링 할 수 있다. (특수 기호 앞에 백슬래쉬가 들어감)

### SQL Injection

`SELECT * FROM topic;-- WHERE id = 1;`  
-- 뒤에 있는 행은 전부 무시됨.(한칸 띄어야 함)

`mysqli_multi_query()` : 복수의 SQL문이 실횅이 됨. 그러나 보안에 취약함.

SQL Injection 공격으로 root 권한을 얻고, 계정을 만들어서 백도어를 만들 수도 있다. 또한 테이블도 삭제할 수 있으며 계정의 비밀번호 조회, 계정의 삭제 또한 가능하다.

## escaping

`<script>location.href="https://www.naver.com"</script> ` : 정보 입력창에 스크립트 태그를 이용하여 사용자를 다른 사이트로 보낼 수 있다.  
< > 를 $lt; $gt; 로 치환하면 이 방법을 막을 수 있다.

`htmlspecialchars()` : 위 함수는 꺽쇠를 치환해주는 함수임.

``` php
    <?php
        echo htmlspecialchars('<script>alert("hi")</script>');
    ?>
```





---

## etc

PHP 는  Middle-Ware라고도 한다. 웹과 데이터베이스 중간에서 매개 역할을 하기 떄문이다.

---
