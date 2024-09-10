<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2주차 실습 예제</title>
</head>
<body>
    <?php
        echo 'Hello PHP<br>';
        
        $a = "park";
        $password = "1234";

        echo "안녕하세요 {$a}님<br>"; //{}로 변수 묶어주기
        echo "hello ", $a," ", "nice to meet you<br>";
        echo "hello ". $a. " ". "nice to meet you<br>"; // comma랑 dot 모두 사용 가능
        //php는 문자열에서 +기능이 없음
        print("hello php"." my name is jooho");
    ?>

    <hr>
    <script>
        let pass = "12345";
        document.write("<br>hello " + "park");
    </script>

    <hr>
    <?php
        define("PI", 3.141592);
        echo PI;
        $PI = 3.1415952;
        echo $PI;

        $min = 8;
    ?>

    <h2>지금부터 <?= $min?>분간 휴식입니다.</h2>
    <h2>지금부터 <?php echo $min?>분간 휴식입니다.</h2>

    <hr>
    <?php
        $int  = 34;
        $float = 5.46;
        $str = "hello";

        echo var_dump($int)." = ".$int."<br>"; //var_dump data type을 알려줌
        echo var_dump($float)." = ".$float."<br>";
        echo var_dump($str)." = ".$str."<br>";

        echo "<hr>";

        echo "<h3>연산자 연습</h3>";
        
        $f = 30; $s = 20;
        $r =$f / $s;

        echo "30 / 20 = ", 30/20, "<br>";

    ?>
</body>
</html>