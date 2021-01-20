# phpStudy
phpStudy

20/01/15 ~ 20/01/18 이사 다 끝나고 PHP + MySql 시작..

## 문법

### php 시작 코드
``` html
<?php
    php 코드
    echo 1;
    print(1);
?>
```

### Data types
Four scalar types : bool, int, float(floating-point number, aka double), string

Four compound types : array, object, callable, iterable

And finally two special types : resource, NULL

`var_dump();` 이 함수를 사용하면 인자에 들어간 값이 어떤 데이터 타입인지까지 같이 알려줌.

### Number
`echo 1+1;`

### String
Concatenation operator
``` html
    <?php
    echo "Hello"."World\n";
    echo strlen("hi");
    ?>
```

### Variable

변수 앞에 $표시를 붙여서 선언한다. 

`$var` `$name = "npole0103"`

### paramter

URL로 값을 전달하는 방법.

`$_GET['name'];` 을 echo로 표시하면 URL에 있는 ABC.php?name="1234"를 참조해
1234를 나타나게 해준다.

### function
`strlen(string type);` 문자열의 문자 갯수를 정수형으로 반환해주는 함수.

`nl2br(string type)` 띄어쓰기 된 부분을 자동으로 br태그로 치환해주는 함수.

`file_get_contents('./people.txt', true);` 파일 명에 대한 표현식을 나타내 줌. 

``` html
    <h1>WEB</h1>
    <ol>
        <li><a href="index.php?id=HTML">HTML</a></li>
        <li><a href="index.php?id=CSS">CSS</a></li>
        <li><a href="index.php?id=JavaScript">JavaScript</a></li>
    </ol>
    <h2>
        <?php
            echo $_GET['id'];
        ?>
    </h2>
    <?php
        echo file_get_contents("data/".$_GET['id']);
    ?>
```

### Comparison

[php.net 참고](https://www.php.net/manual/en/language.operators.comparison.php)

``` html
$a == $b	Equal	true if $a is equal to $b after type juggling.
$a === $b	Identical	true if $a is equal to $b, and they are of the same type.
$a != $b	Not equal	true if $a is not equal to $b after type juggling.
$a <> $b	Not equal	true if $a is not equal to $b after type juggling.
$a !== $b	Not identical	true if $a is not equal to $b, or they are not  of the same type.
$a < $b	    Less than	true if $a is strictly less than $b.
$a > $b	    Greater than	true if $a is strictly greater than $b.
$a <= $b	Less than or equal to	true if $a is less than or equal to $b.
$a >= $b	Greater than or equal to	true if $a is greater than or equal to $b.
$a <=> $b	Spaceship	An int less than, equal to, or greater than zero when $a is less than, equal to, or greater than $b, respectively.
```

### Conditional

C, C++과 확연히 차이나는 부분은 없음.

### Iteration(Loop)

C, C++과 확연히 차이나는 부분 없음. 하지만 변수 사용시 $기호를 사용한다는 것이 다소 주의가 필요.

``` html
    while ($i < 3) 
    {
        echo '3<br>';
        $i += 1;
    }
```
---
## etc

PHP 이용하면 웹페이지를 자동으로 생성해 줌.

bitnami wamp을 깔아야 php 이용 가능함.

C:\Bitnami\wampstack-7.4.14-0\apache2\htdocs

localhost(127.0.0.1) or 할당 받은 내부아이피로 접속 가능

/php/php.ini 을 열고
display_errors = On // 에러 정보를 보여줌.
opcache.enable = 0  // php 파일을 수정하면 바로 반영되게끔 해줌.
로 변경 후 저장. Restat All 해주면 적용 됨.





---