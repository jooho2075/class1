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
        PASS : <input type="text" name="ps"><br>
        <input type="submit" value="로그인">
    </form>
    <hr>

    <h2>POST 방식</h2>
    <form method="POST" action="process.php">
        ID : <input type="text" name="id"><br>
        PASS : <input type="text" name="ps"><br>
        <input type="submit" value="로그인">
    </form> 
</body>
</html>