<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- script 자바스크립트로 해석하겠다 -->
    
    <!--
    <script>
        alert('hi');
    </script>
    -->
    
    <?php
        echo htmlspecialchars('<script>alert("hi")</script>');
    ?>
</body>
</html>