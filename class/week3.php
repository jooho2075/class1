<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3주차 실습 예제</title>
</head>
<body>
<!--practice3-1-->
    <?php
        $age = 20;

        if($age >= 18) {
            echo "당신의 나이는 18세 이상입니다.<br>";
            echo "당신은 투표할 자격이 있습니다.";
        }
    ?>
    <br>
    <br>

    <!--practice3-2-->
    <?php
        $num = 20;

        if($num % 2 == 0) {
            echo "{$num}은[는] 짝수입니다.";
        }
        else {
            echo "{$num}은[는] 홀수입니다.";
        }
    ?>
    <br>
    <br>

    <!--practice3-3-->
    <?php
        $grade = 85;
        echo "점수 : $grade<br>";

        if($grade > 90) {
            echo "A학점";
        } else if($grade > 80) {
            echo "B학점";
        } else if($grade > 70) {
            echo "C학점";
        } else if($grade > 60) {
            echo "D학점";
        } else {
            echo "F학점";
        }
    ?>
    <br>
    <br>

    <!--practice3-4-->
    <?php
        $num1 = 50;
        $num2 = 10;
        $num3 = 60;

        echo "3개의 숫자 : $num1, $num2, $num3<br>";

        if($num1 > $num2) {
            if($num1 > $num1) {
                echo "{$num1}은[는] 가장 큰 수입니다.<br>";
            } else {
                echo "{$num1}은[는] 가장 큰 수가 아닙니다.<br?";
            }
        } else {
            echo "{$num1}은[는] 가장 큰 수가 아닙니다.<br>";
        }
    ?>
    <br>
    <br>

    
</body>
</html>