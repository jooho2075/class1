<!DOCTYPE html> <!--도서 상세정보 페이지-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./resources/css/bootstrap.min.css"  rel="stylesheet">
    <script type="text/javascript">
        function addToCart() {
            if(confirm("도서를 장바구니에 추가하시겠습니까?")) {
                document.addForm.submit();
            } else {
                document.addForm.reset();
            }
        }
    </script>
    <title>도서 정보</title>
</head>
<body class="d-flex flex-column h-100">
    <?php
        //require "./model.php";
        require "./menu.php";
        require "./dbconn.php";

        try {
            $id = $_GET["id"];

            $sql = "SELECT * FROM book WHERE b_id = '".$id."'";

            $result = mysqli_query($con, $sql);
            if(mysqli_num_rows($result) <= 0)
                throw new Exception();
            else $row = mysqli_fetch_aray($result);

            /*
            $book = getBookById($id);
            if($book == null) {
                throw new Exception();
            }
            */
    ?>
    <br>

    <main>
        <div class="container py-5">
            <div class="p-5 mb-4 bg-body-tertiary rounded-3">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold">도서 정보</h1>
                    <p class="col-md-8 fs-4">BookInfo</p>
                </div>
            </div>
            <?php
                $id = $_GET["id"]; // 도서 목록 페이지로부터 전달되는 도서 아이디를 전송받도록 $_GET변수 작성
                $book = getBookById($id); //도서 아이디를 통해 getBookById()함수를 호출하여 반환된 결과값을 도서정보 변수 $book에 저장
            ?>
            <div class="row align-items-md-stretch">
                <div class="col-md-5">
                    <img src="./resources/images/<?php echo $row['b_fileName']; ?>" style="width: 70%">
                </div>
                <div class="col-md-6">
                    <h2><?php echo $row["b_name"]; ?></h2> <!--31~38 : $book에 저장된 도서명, 도서코드...dmf cnffur-->
                    <p><?php echo $row["b_description"];?></p>
                    <p><b>도서코드 : </b><span class="badge text-bg-danger"><?php echo $id;?></span></p>
                    <p><b>저자</b> : <?php echo $row["b_author"];?></p>
                    <p><b>출판일</b> : <?php echo $row["b_releaseDate"];?></p>
                    <p><b>분류</b> : <?php echo $row["b_category"];?></p>
                    <p><b>재고</b> : <?php echo $row["b_unitsInStock"];?></p>
                    <p><?php echo $row["b_unitPrice"]; ?>원</p>
                    <p>
                        <form name="addForm" action="./addCart.php?id=<?php echo $id; ?>" method="post">
                            <a href="#" class="btn btn-info"> 도서주문 &raquo;</a> <!--도서주문 버튼-->
                            <a href="./cart.php" class="btn btn-warning"> 장바구니 &raquo;</a>
                            <a href="./books.php" class="btn btn-secondary"> 도서목록 &raquo;</a> <!--도서목록 버튼-->
                        </form>
                    </p>
                </div>
            </div>
        </div>
    </main>
    <?php
    mysqli_free_result($result);
    mysqli_close($conn);
    } catch(Exception $e) {
        require "./exceptionNoBookId.php";
    }
        require "./footer.php";
    ?>
    
</body>
</html>