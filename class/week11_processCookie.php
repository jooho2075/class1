<?php
/*
    $id = $_POST['id'];
    $ps = $_POST['ps'];

    // 쿠키 저장
    setcookie("id", $id);
    setcookie("password", $ps);
    
    // 쿠키 읽어오기
    echo "saved cookie id : ".$_COOKIE['id']."<br>";
    echo "saved cookie ps : ".$_COOKIE['password']."<br>";
*/
    setcookie("password", "");
    setcookie("id", "", time()-3600);
?>