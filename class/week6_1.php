<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET method test</title>
</head>
<body>
    <h2>GET 방식</h2>
    <form method="GET" action="process.php">
        ID : <input type="text" name="id"><br>
        PASS : <input type="password" name="ps"><br>
        <br>

        이름 : <input type="text" name="name" value="parkjooho"><br>

        <label>남성 : <input type="radio" name="gender" value="male" checked></label>
        <label>여성 : <input type="radio" name="gender" value="female"></label>
        <br>

        <label><input type="checkbox" name="hobby[]" value="등산" checked>등산</label>
        <label><input type="checkbox" name="hobby[]" value="낚시">낚시</label>
        <label><input type="checkbox" name="hobby[]" value="운동">운동</label>
        <br>
        <input type="submit" value="로그인">
    </form>
    <hr>

    <h2>POST 방식</h2>
    <form method="POST" action="process.php">
        ID : <input type="text" name="id"><br>
        PASS : <input type="text" name="ps"><br>
        <input type="submit" value="로그인"><br>
    </form>
    <hr>
</body>
</html>