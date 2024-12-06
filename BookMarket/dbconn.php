<?php
    $conn = mysqli_connect("localhost:3307", "root", "", "bookmarketdb");

    if(!$conn) {
        die('데이터베이스 연결 실패 : ' . mysqli_connect_error());
    }
?>