<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>도서 목록</title>
    <link href="./resources/css/bootstrap.min.css" rel="stylesheet"> 
    <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="d-flex flex-column h-100">
    <?php
        require "./model.php";
        require "./menu.php";
    ?>
    <br>
    <main>
        <div class="container py-5">
            <div class="p-5 mb-4 bg-body-tertiary rounded-3">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold">장바구니</h1>
                    <p class="col-md-8 fs-4">CartList</p>
                </div>
            </div>

            <div class="row align-items-md-stretch text-center">
                <?php
                    session_start();
                    $cartId = session_id(); // session id 값을 읽어 옴
                ?>
                <div class="col-md-12">
                    <div class="p-5">
                        <table width="100%">
                            <tr>
                            <td style="text-align:left"><a href="./deleteCart.php?cartId=<?=$cartId?>" class="btn btn-danger">삭제하기</a></td>
                            <td style="text-align:right"><a href="./shippingInfo.php?cartId=<?=$cartId?>" class="btn btn-success">주문하기</a></td>
                            </tr>
                        </table>
                    </div>
                    <div>
                        <table class="table table-hover">
                            <tr>
                                <th>도서</th>
                                <th>가격</th>
                                <th>수량</th>
                                <th>소계</th>
                                <th>비고</th>
                            </tr>
                            <?php
                                $sum = 0; // total 금액
                                $cartList = ""; // 전체 리스트를 가져옴
                                if(isset($_SESSION["cartlist"])) {
                                    $cartList = $_SESSION["cartlist"];
                                }

                                if($cartList == null) {
                                    $count = 0;
                                } else {
                                    $count = count($cartList);
                                }

                                for($i = 0; $i < $count; $i++, next($cartList)) {
                                    // 도서 리스트 하나씩 출력하기
                                    $id = key($cartList);
                                    $book = $cartList[$id];
                                    $total = $book["unitPrice"] * $book["quantity"];
                                    $sum = $sum + $total;
                            ?>
                            <tr>
                                <td width="20%"><?=$id ?> - <?=$book["name"]?></td>
                                <td width="10%"><?=$book["unitPrice"] ?></td>
                                <td width="10%"><?=$book["quantity"] ?></td>
                                <td width="10%"><?=$total ?></td>
                                <td width="10%">
                                    <a href="./removeCart.php?id=<?=$id ?>" class="badge text-bg-danger">삭제</a>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>총액</th>
                                <th><?=$sum ?></th>
                                <th></th>
                            </tr>
                        </table>
                    </div>

                    <div class="col-md-2">
                        <a href="./books.php" class="btn btn-secondary"> &laquo; 쇼핑 계속하기</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
        require "./footer.php";
    ?>
</body>
</html>