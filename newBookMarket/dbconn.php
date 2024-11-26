<?php
    $conn = mysqli_connect("localhost:3307", "root", "", "class1");

    if(!$conn) {
        die("DB 연결 실패 : ".mysqli_connect_error());
    }
?>