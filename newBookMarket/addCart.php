<?php
    // 요청 파라미터 아이디를 전송 받도록 $_GET작성
    // 전송 아이디가 없을 때 books.php로 이동하도록 header()함수 작성
    $bookId = $_GET["id"]; // url에서 넘어오는 id값
    if($bookId == null || $bookId == "") {
        header("Location:books.php");
        return;
    }
        require "./model.php";

    $book = getBookById($bookId); // 실제 book 정보를 읽어옴

    if($book == null) { // 도서 아이디에 대한 정보를 얻도록 getBookById()함수 호출하고 $book변수에 저장
        header("Location:exceptionNoBookId.php"); // 도서 정보 없으면 예외처리 페이지로 이동하도록 header()함수 작성
    }

    session_start(); // 장바구니 관련 세션 시작
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

    header("Location:book.php?id=".$bookId); // 요청 파라미터 아이디를 설정하여 book.php로 이동하도록 header()함수 작성
?>