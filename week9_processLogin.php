<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인 페이지</title>
</head>
<body>
    <?php
        $id = $_POST['id'];
        $pass = $_POST['ps'];

        echo "<h3>로그인 성공!!</h3>";
        echo "<h4>ID : $id</h4>";
        echo "<h4>PASS : $pass</h4>";
    ?>
</body>
</html>