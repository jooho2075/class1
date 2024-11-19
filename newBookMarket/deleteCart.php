<?php
    session_start();
    $cartId = $_GET["cartId"];

    if($cartId == null || $cartId == "") {
        header("Location:cart.php");

        return;
    }

    // session_unset();도 동일하게 동작함
    session_destroy();

    header("Location:cart.php");
?>