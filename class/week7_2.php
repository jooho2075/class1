<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
    <h2>File Upload Test</h2>
    <form method="post" enctype="multipart/form-data" action="processFile.php">
        이름 : <input type="text" name=name><br>
        파일 : <input type="file" name=upfile><br>
        <hr>
        <input type="submit" value="전송하기"><br>
    </form>
</body>
</html>