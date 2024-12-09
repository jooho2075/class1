<?php
    $conn = mysqli_connect("localhost:3307", "root", "", "class1"); // localhost 꼭 설정해주기!! 일단 내 노트북에서 되려면....
    // password는 없기 때문에 ""로 표현
    // "class1"이 phpMyAdmin의 DB명칭
    
    if(!$conn) {
        die("DB 연결 실패 : ".mysqli_connect_error());
    }
?>