<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>주문 완료</title>
  <link href="./resources/css/bootstrap.min.css" rel="stylesheet"> 
  <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="d-flex flex-column h-100">
  <?php
    require "./menu.php";

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
          <h1 class="display-5 fw-bold">주문 완료</h1>
          <p class="col-md-8 fs-4">Order Completed</p>
        </div>
      </div>

      <div class="row align-items-md-stretch text-center">
        <h2 class="alert alert-danger">주문해주셔서 감사합니다!!</h2>
        <p>주문은 <?=$shipping_shippingDate?>에 배송될 예정입니다!!</p>
        <p>주문번호 : <?=$shipping_cartId?></p>
      </div>

      <div class="container">
        <p><a href="./books.php" class="btn btn-secondary"> &laquo;도서 목록</a></p>
      </div>

      <?php
        session_start();
        session_unset();

        setcookie("Shipping_cartId", "", 0);
        setcookie("Shipping_name", "", 0);
        setcookie("Shipping_shippingDate", "", 0);
        setcookie("Shipping_country", "", 0);
        setcookie("Shipping_zipCode", "", 0);
        setcookie("Shipping_addressName", "", 0);

      ?>
    </div>
  </main>
  <?php
    require "./footer.php";
  ?>
</body>
</html>