<?php
    session_start();
    $bookId = $_GET["id"];

    if($bookId == null || $bookId == "") {
        header("Location:books.php");
        return;
    }
        require "./model.php";

    $book = getBookById($bookId);

    if($book == null) {
        header("Location:exceptionNoBookId.php");
    }

    $cartList = $_SESSION["cartlist"];
    $count = count($_SESSION["cartlist"]);
    $goodsList = $_SESSION["cartlist"];

    for($i = 0; $i < $count; $i++) { // 상품 리스트 하나씩 확인하기
        $goodsid = key($goodsList);
        $goods = $goodsList[$goodsid];
        if($goodsid == $bookId) {
            unset($_SESSION["cartlist"][$bookId]);
        }
            next($goodsList);
    }

    header("Location:cart.php");
?>