<?php
    // 연결 생성
    $conn = mysqli_connect("localhost:3307", "root", "", "class1");

    // 연결 확인
    if(!$conn) {
        die("DB 연결 실패 : ". mysqli_connect_error());
    }

    echo "DB 연결 성공 " .mysqli_get_host_info($conn);
?>