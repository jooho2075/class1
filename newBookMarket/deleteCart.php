<?php
    session_start();
    $cartId = $_GET["cartId"];

    if($cartId == null || $cartId == "") {
        header("Location:cart.php");

        return;
    }

    session_destroy();

    header("Location:cart.php");
?>