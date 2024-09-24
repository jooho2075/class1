<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Example</title>
</head>
<body>
    <?php
        $grade = ["j" => 98, "s" => 85, "d" => 89];
        $grade["k"] = 100;
        
        $sum = 0;

        foreach($grade as $name => $score) {
            $sum += $score;
            echo "이름 : $name". ", 점수 : $score<br>"; 
        }
        $avg = $sum / 4;
        echo "평균 : $avg<br>"
    ?>
    <hr>

    <?php
        $gradeArr = array(
            "park" => array("kor" => 98, "eng" => 99, "mat" => 100),
            "joo" => array("kor" => 96, "eng" => 93, "mat" => 89),
            "ho" => array("kor" => 78, "eng" => 90, "mat" => 80)
        );
        //$gradeArr["park]["kor"]

        foreach($gradeArr as $name => $score) {
            $sum = 0;
            echo "이름 : $name<br>";
            foreach($score as $lec => $num) {
                echo "과목 : $lec, 점수 : $num<br>";
                $sum += $num;
            }
            $avg = $sum / 3;
            echo "총점 : $sum, 평균 : $avg<br>";
            echo "============================<br>";
        }
    ?>
    <hr>
</body>
</html>