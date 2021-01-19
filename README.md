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