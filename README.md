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

``` php
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

리다이렉션 : 다른 페이지로 방향을 바꿔준다.
`header('Location: /index.php?id='.$_POST['title']);`

PHP echo 단축 태그인 <?=$var?>
`<?php echo $_GET['id']; ?>` 와 `<?=$_GET['id']?>`는 같은 표현임.

파일명 바꾸기
``` php
<?php
rename("/tmp/tmp_file.txt", "/home/user/login/docs/my_file.txt");
?>
```

값 자체를 가져올 땐 `$_GET['ABC']`로 가져옴.  
ex) `isset($_GET['ABC'])`

문자열에서 값을 가져올 땐 `<?=$_GET['ABC']?>`(echo 단축 태그)로 사용함.  
ex) `<a href="delete_process.php?id=<?=$_GET['id']?>">Delete</a>`

### Refactoring

lib 폴더 : 프로그래밍에서 재사용할만한 코드나 로직을 잘 정리해둔 것을 도서관이라고 한다. 이를 축약해서 lib으로 칭한다.

`require('lib/print.php');`
설정된 경로에 있는 코드를 사용할 수 있게끔 해줌.
C언어나 C++로 치면 #include 같은 느낌.

모듈화를 하다보면 정의했던 것을 또 호출하게 될 수가 있는데
이는 C언어나 C++에서는 `#pragma once`로 해결된다.

PHP에서는 이를 `require_once();`로 해결할 수 있다.
`require_once('lib/print.php');`

### 보안 XSS

Cross Site Scripting : 웹사이트에다가 스크립트 태그를 주입하는 것임.

강제로 다른 사이트로 이동시킨다던지, 로그인을 대신 한다던지, 정보를 유출한다던지 등등의 행위를 할 수 있음.

``` javascript
XSS 
<script>
alert("babo");
location.href="https://www.naver.com"
</script> 
```

보안적으로 막는 방법
`htmlspecialchars();` 사용하기

Example `echo htmlspecialchars('<script>alert("babo");</script>');`

이렇게 하게 되면 꺽쐬 기호가 $lt; $gt;로 치환이 됨.

하지만 이런식으로 쓰게 된다면 img태그나 줄바꿈 등 필수적으로 필요한 태그들을
못 사용할 수 있다. 이떄 strip_tags를 사용하면 모든 태그를 다 날려버림과 동시에 옵션을 지정해서 원하는 태그들은 살릴 수 있다.

**사용자가 입력한 정보를 무조건 불신하라**

### 보안 파일 경로 보호

root 폴더에 password.txt가 존재한다고 가정.

http://172.30.1.58/index.php?id=../password.txt 를 입력하면 패스워드 탈취 가능.

`basename();`로 예방 가능. 경로를 제외한 파일 이름만 선택해주는 함수.

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
요소는 `<form action="hi.php">` 전체  
속성은 action  
속성값은 hi.php  
※변수 : align, center 등등

URL 리다이렉션 : 출력 방향을 바꾸는 것.  
URL 리다이렉션(URL redirection← URL 넘겨주기)은 이용 가능한 웹 페이지를 하나 이상의 URL 주소로 만들어주는 월드 와이드 웹 기법이다. URL 포워딩(URL forwarding)이라고도 한다. 넘겨받은 URL을 웹 브라우저가 열려고 하면 다른 URL의 문서가 열리게 된다.

링크를 건다는 것은 $_GET 방식임.

**GET/POST에 대한 탐구**  
*사전 지식*  

HTTP 패킷 : 클라이언트가 서버로 요청했을 때 보내는 데이터를 말함. HTTP 프로토콜을 사용함.

HTTP 패킷의 구조는 크게 헤더와 바디로 나뉘어진다. 헤더에는 다음과 같은 정보가 담긴다.
1. 7가지 HTTP 메서드 방식 중 무엇을 썼는지
2. 클라이언트의 정보
3. 브라우저의 정보
4. 접속할 URL

등등이 있다.

보통 바디는 비어있는데 특정 데이터를 담아서 서버에게 요청을 보낼 수 있다.

*GET*  

웹사이트 주소 뒤에  ?를 시작으로 URL의 끝을 알리면서 데이터 표현의 시작을 알린다. URL 파라미터에 Key=Value가 전달되는데, 이때 URL에 붙이므로
HTTP 패킷의 헤더에 포함되어 서버에 요청된다. 따라서 GET 방식에서는 바디에 특별한 내용 없이 빈 상태로 보내어진다. 그렇기 때문에 바디의 데이터를 설명하는 Content-Type이라는 헤더 필드가 들어가지 않는다.

이렇게 되면 특정 페이지를 다른 사람에게 접속할 수 있게 하며, 또한 간단한 데이터를 보내도록 설계되어 데이터를 보내는 양의 한계가 존재한다.

*POST*

POST 방식은 GET 방식과 달리 데이터 전송을 기반으로 하는 요청 메소드이다.

GET 방식은 URL에 데이터를 붙여서 보내는 반면, POST방식은 URL에 붙여서 보내지 않고 바디에다가 데이터를 넣어서 보낸다. 따라서 헤더 필드 중 바디의 데이터를 설명하는 Content-Type이라는 헤더 필드가 들어가고 어떤 데이터 타입인지 명시한다.

*정리*

POST든 GET이든 보내는 데이터는 전부 클라이언트 측에서 볼 수 있다. 단지 GET방식은 URL에 데이터가 표시되어 별다른 노력없이 볼 수 있다. 두 방식 전부 보안을 생각한다면 암호화를 해야한다.

GET방식이 POST 방식보다 속도가 빠르다. 이유는 GET 방식의 요청은 캐싱(한번 접근 후, 다음에 접근할 때 저장된 데이터를 보여주는 기술)때문에 빠르다.

++두 방식 다 보안을 생각한다면 암호화를 해야한다고 말한다.  
여기서 말하는 암호화는 클라이언트-서버간 통신 중 제3자가 정보를 탈취하는 것을 막는 암호화를 말한다. (클라이언트는 자신이 보내는 데이터를 알고 디버거에 표시하기 때문에 뭘 하던 정보를 알 수가 있기 때문에 암호화 대상이 아니다)

결론은 SSL/TLS를 적용시키면 GET/POST 똑같이 동작하며 데이터 통신간에 간에 암호화가 되는 것이지, 클라이언트는 GET 방식으로는 URL이며 POST 방식으로는 Chrome 디버거 네트워크를 통해서 데이터를 HTTP와 같이 들여다 볼 수 있다.

[Get과 Post 차이](https://blog.naver.com/wholsr/222162421238)

[POST + SSL](https://stackoverflow.com/questions/45484576/does-https-make-post-data-encrypted)

[GET + SSL](https://okky.kr/article/288696)

[HTTPS 데이터에서 평문을 얻어내는 법 2016 - HEIST 공격](https://blog.alyac.co.kr/751)

[HTTPS SSL/TLS](https://blog.naver.com/minhyupp/222117306836)


---