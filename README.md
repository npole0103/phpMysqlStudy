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

### Array

다음과 같이 배열을 선언하고 정의할 수 있음.
`$var = array(2, 3, 4, 5);`

C, C++과 배열 사용법이 많이 다르기 때문에 따로 공부가 필요함.

[php.ney Array_Functions](https://www.php.net/manual/en/ref.array.php)

### ect functions

get file list : `scandir($dir);`

count index elements : `count($list);`

get file contents : `file_get_contents("data/".$_GET['id']);`

put file contents : `file_put_contents('result.txt', sum2(2,7));`

### function2
``` html
    <?php
        function basic()
        {
            print("lorem<br>");
            print("lorem2<br>");
        }

        basic();
        basic();
    ?>
```

### Form & Post

``` html

    <form action="form.php">
        <p>
            <input type="text" name="title" placeholder="title">
        </p>
        <p>
            <textarea name="description"></textarea>
        </p>
        <p>
            <input type="submit">
        </p>
    </form>
```

``` html
<?php
    echo "<p>title : ". $_GET['title']. "</p>";
    echo "<p>description : ". $_GET['description']. "</p>";
?>
```

1. title과 description에 텍스트를 입력하고 submit 버튼을 누름.
2. Submit 버튼이 속해있는 form태그의 action 속성이 가르키는 URL로 바꿈.
3. URL 뒤에 name의 속성 값을 URL parameter로 해서 텍스트에 입력한 값과 함께 표시

`file_put_contents('data/'.$_GET['title'], $_GET['description']);`
Parameter : 경로, 파일명, 파일 내용

Form에 method 

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

get file list : `scandir($dir)`

주석은 C언어와 똑같음.

하나의 함수는 하나의 기능만 갖는다.

정보 시스템에서 가장 중요하게 체크해야할 기능 : Create Read Update Delete

URL을 통해서 서버쪽에 데이터를 전송하는 방식은 사용자가 데이터를 보내거나 지울 떄 사용하면 안됨. 취약점, 의도치 않는 에러 등

URL을 Parameter를 통해서 서버에 데이터를 전송하는 방식은 bookmark에서 사용하기 적합한 방식임.

POST 방식을 사용하면 데이터를 은닉해서 전달할 수 있음. 주소창도 parameter 값이 나타나지 않음.

정리하자면 중요하고 은닉되어야 하는 데이터는 POST 방식으로 보내야하고 bookmark 같은 사용자에게 노출되거나 링크를 제3자가 받았을 때 문제가 되지 않는 데이터인 경우는 URL parameter로(default 방식)으로 보내면 된다.

form 태그에 method="post"는 post방식 / 아무 옵션도 주지 않거나 method="get"으로 속성값을 준다면 get 방식.

HTML 에서 < form action="hi.php">가 있다면

태그는 form  
요소는 < form action="hi.php"> 전체  
속성은 action  
속성값은 hi.php  
※변수 : align, center 등등


---