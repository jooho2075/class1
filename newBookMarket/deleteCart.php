<?php
    session_start();
    $cartId = $_GET["cartId"]; // 요청 파라미터 cartId를 전송받도록 $_GET["cartId"] 작성

    if($cartId == null || $cartId == "") {
        header("Location:cart.php");

        return;
    }

    // session_unset();도 동일하게 동작함
    session_destroy();

    header("Location:cart.php"); // 전송된 cartId가 없으면 cart.php로 이동하도록 header()함수 작성
?>