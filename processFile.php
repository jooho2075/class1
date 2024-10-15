<?php
    $name = $_POST["name"];
    $file = $_FILES["upfile"];

    echo $file["name"]. "<br>";
    echo $file["tmp_name"]. "<br>";
    echo $file["size"]. "<br>";
    echo $file["type"]. "<br>";
    echo $file["error"]. "<br>";

    $savename = "./upload/". $file["name"]; // 저장할 경로와 원래 이름으로 해주기
    
    if(file_exists($savename)) {
        $savename = "./upload/". time().$file["name"];
    } // 파일 이름이 겹칠 때 해결하는 부분
    
    move_uploaded_file($file["tmp_name"], $savename);
?>