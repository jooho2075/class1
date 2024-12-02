<?php
    session_start();

    $id = $_POST['id'];
    $pass = $_POST['ps'];

    // session에 정보 저장
    $_SESSION['id'] = $id;
    $_SESSION['pass'] = $pass;

    // session 정보 읽어오기
    echo "saved session id : ".$_SESSION['id']."<br>";
    echo "saved session pass : ".$_SESSION['pass']."<br>";

    echo "<hr>";
    echo "세션 정보 삭제 후";
    //unset($_SESSION['id']); // 일부를 지우는 것

    session_unset(); // 전부 지우는 것
    //session_destroy(); // session자체를 닫아버림 -> session_start()를 다시 해줘야 함

    echo "saved session id : ".$_SESSION['id']."<br>";
    echo "saved session pass : ".$_SESSION['pass']."<br>";
?>