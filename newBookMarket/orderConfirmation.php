<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>주문 정보</title>
  <link href="./resources/css/bootstrap.min.css" rel="stylesheet"> 
  <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="d-flex flex-column h-100">
  <?php
    require "./model.php";
    require "./menu.php";

    // 쿠키 객체를 통해 정보를 얻어오도록 $_COOKIE 작성
    // processShippingInfo.php와 동일한 명칭 사용
    $shipping_cartId = $_COOKIE["Shipping_cartId"];
    $shipping_name = $_COOKIE["Shipping_name"];
    $shipping_shippingDate = $_COOKIE["Shipping_shippingDate"];
    $shipping_country = $_COOKIE["Shipping_country"];
    $shipping_zipCode = $_COOKIE["Shipping_zipCode"];
    $shipping_addressName = $_COOKIE["Shipping_addressName"];
  ?>
  <br>
  <main>
    <div class="container py-5">
      <div class="p-5 mb-4 bg-body-tertiary rounded-3">
        <div class="container-fluid py-5">
          <h1 class="display-5 fw-bold">주문 정보</h1>
          <p class="col-md-8 fs-4">Order Info</p>
        </div>
      </div>

      <div class="row align-items-md-stretch alert alert-info text-center">
        <div class="col-md-12">
          <div class="p-5">
            <div>
              <h1>영수증</h1>
            </div>
            <!--얻어 온 정보 출력-->
            <div class="row justify-content-between">
              <div class="col-4" style="text-align:left">
                <strong>배송 주소</strong> <br> 성명 : <?= $shipping_name?><br>우편번호 : <?= $shipping_zipCode?><br> 주소 : <?= $shipping_addressName?>(<?= $shipping_country?>)<br>
              </div>
              <div class="col-4" style="text-align:right">
                <p><em>배송일: <?= $shipping_shippingDate?></em></p>
              </div>
            </div>
            <div>
              <table class="table table-hover">
                <tr>
                  <th>도서</th>
                  <th>#</th>
                  <th>가격</th>
                  <th>소계</th>
                </tr>
                <?php
                  session_start(); // 세션에 저장된 장바구니 정보를 얻어오도록 $_SESSION["cartlist"]작성하고 장바구니에 저장된 모든 도서 목록을 하나씩 가져와 출력
                  $sum = 0;
                  $cartList = "";
                  if(isset($_SESSION["cartList"]))
                    $cartList = $_SESSION["cartList"];

                  if($cartList == null)
                    $count = 0;
                    else $count = count($cartList);
                    for($i = 0; $i<$count; $i++, next($cartList)) {
                      
                      $id = key($cartList);
                      $book = $cartList[$id];
                      $total = $book["unitPrice"] * $book["quantity"];
                      $sum = $sum + $total;
                ?>
                <tr>
                  <td class="text-center"><em><?=$book["name"]?></em></td>
                  <td class="text-center"><?=$book["quantity"] ?></td>
                  <td class="text-center"><?=$book["unitPrice"] ?>원</td>
                  <td class="text-center"><?=$total ?>원</td>
                </tr>
                <?php
                    }
                ?>
                <tr>
                  <th></th>
                  <th></th>0
                  <th><strong>총액: </strong></th> <!--장바구니 총액 출력-->
                  <th><strong><?=$sum?> </strong></th>
                </tr>
              </table>

              <a href="./ShippingInfo.php?cartId=<?=$shipping_cartId?>"class="btn btn-secondary" role="button"> 이전 </a>
              <a href="./thankCustomer.php" class="btn btn-success" role="button"> 주문 완료 </a>
              <a href="./checkOutCancelled.php" class="btn btn-secondary" role="button"> 취소 </a>
            </div>
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