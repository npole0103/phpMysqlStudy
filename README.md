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

## etc

PHP 는  Middle-Ware라고도 한다. 웹과 데이터베이스 중간에서 매개 역할을 하기 떄문이다.

---
