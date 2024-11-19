<?php
    $cartId = $_GET["cartId"]; // 주문자 정보를 cookie에 저장

    setcookie("Shipping_cartId", $_POST["cartId"], time()+24*60*60); // 24시간*60분*60초

    setcookie("Shipping_name", $_POST["name"], time()+24*60*60);
    setcookie("Shipping_shippingDate", $_POST["shippingDate"], time()+24*60*60);
    setcookie("Shipping_country", $_POST["country"], time()+24*60*60);
    setcookie("Shipping_zipCode", $_POST["zipCode"], time()+24*60*60);
    setcookie("Shipping_addressName", $_POST["addressName"], time()+24*60*60);

    header("Location:orderConfirmation.php");
?>