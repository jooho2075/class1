<?php
    session_start();
    $bookId = $_GET["id"]; // 요청 파라미터 아이디를 전송받도록 $_GET작성하고 전송된 아이디가 없으면 books.php로 이동하도록 header()함수 작성

    if($bookId == null || $bookId == "") {
        header("Location:books.php");
        return;
    }
        require "./model.php";

    // 도서 아이디에 대한 도서 정보를 얻어오도록 getBookById()함수 호출하고 $book 변수에 저장
    $book = getBookById($bookId);

    if($book == null) { // 정보가 없으면 exceptioNoBookId로 이동하도록 header()함수 작성
        header("Location:exceptionNoBookId.php");
    }

    $cartList = $_SESSION["cartlist"]; // 장바구니인 cartlist에 등록된 모든 도서를 가져오도록 $_SESSION["cartlist"] 작성
    $count = count($_SESSION["cartlist"]);
    $goodsList = $_SESSION["cartlist"];

    for($i = 0; $i < $count; $i++) { // 상품 리스트 하나씩 확인하기, 등록된 모든 도서를 가져와 요청 파라미터 아이디와 같으면 cartlist에서 삭제하도록 작성
        $goodsid = key($goodsList);
        $goods = $goodsList[$goodsid];
        if($goodsid == $bookId) {
            unset($_SESSION["cartlist"][$bookId]);
        }
            next($goodsList);
    }

    header("Location:cart.php"); // cart.php로 이동하도록 header()함수 작성
?>