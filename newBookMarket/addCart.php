<?php
    $bookId = $_GET["id"]; // url에서 넘어오는 id값
    if($bookId == null || $bookId == "") {
        header("Location:books.php");
        return;
    }
        require "./model.php";

    $book = getBookById($bookId); // 실제 book 정보를 읽어옴

    if($book == null) {
        header("Location:exceptionNoBookId.php");
    }

    session_start();
    if(isset($_SESSION["cartlist"])) {
        $count = count($_SESSION["cartlist"]); // 주문된 책의 총 종류
        $goodsList = $_SESSION["cartlist"];

        $cnt = 0;
        $goodsQnt = "";
        for($i = 0; $i < $count; $i++) {
            $goodsid = key($goodsList);
            $goods = $goodsList["$goodsid"];
            if($goodsid == $bookId) {
                $cnt++;
                $goods["quantity"] = $goods["quantity"] + 1;
                $_SESSION["cartlist"]["bookId"] = $goods;

                break;
            }
            next($goodsList);
        }

        if($cnt == 0) {
            $goods = getBookById($bookId);
            $goods["quantity"] = 1;
            $_SESSION["cartlist"]["bookId"] = $goods; // 새롭게 내용 추가
        }
    }
    else {
        $book = getBookById($bookId);
        $book["quantity"] = 1;
        $_SESSION["cartlist"]["$bookId"] = $book;
    }

    header("Location:book.php?id=".$bookId);
?>