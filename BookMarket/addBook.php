<!DOCTYPE html> <!-- 도서 등록 페이지-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css"  rel="stylesheet"> 
    <title>도서 등록</title>
</head>
<body class="d-flex flex-column h-100">
    <?php
        require "./menu.php";
    ?>
    <br>

    <main>
        <div class="container py-5">
            <div class="p-5 mb-4 bg-body-tertiary rounded-3">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold">도서 등록</h1>
                    <p class="col-md-8 fs-4">Add Book</p>
                </div>
            </div>
            <div class="row align-items-md-stretch">
                <div class="col-md-12">
                    <div clas="h-100 p-5">
                        <form name="newBook" action="./processAddBook.php" method="post"> <!--입력된 데이터를 서버로 전송하여 폼 데이터 처리-->
                        <!--action 속성값, method 방식:post-->
                            <div class="mb-3 row">
                                <label class="col-sm-2">도서코드</label>
                                <div class="col-sm-3">
                                    <input type="text" name="bookId" class="form-control"> <!--31,37,43,49 : input태그의 type속성갑을 text, name 속성값을 다음과 같이 작성-->
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2">도서명</label>
                                <div class="col-sm-3">
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2">가격</label>
                                <div class="col-sm-3">
                                    <input type="text" name="unitPrice" class="form-control">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2">저자</label>
                                <div class="col-sm-3">
                                    <input type="text" name="author" class="form-control">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2">상세정보</label>
                                <div class="col-sm-5">
                                    <textarea name="description" cols="50" rows="5" class="form-control" placeholder="100자 이상 적어주세요"></textarea>
                                    <!--name속성값을 description으로 작성-->
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2">분류</label>
                                <div class="col-sm-3">
                                    <input type="text" name="category" class="form-control"> <!--62,68,74 input type 속성값을 text로 작성하고 name 속성값을 다음과 같이 작성-->
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2">재고수</label>
                                <div class="col-sm-3">
                                    <input type="text" name="unitsInStock" class="form-control">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2">출판일</label>
                                <div class="col-sm-3">
                                    <input type="text" name="releaseDate" class="form-control">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2">상태</label>
                                <div class="col-sm-5">
                                    <input type="radio" name="condition" value="New" checked> 신규도서<!--input type을 radio로 작성하고 name 속성값을 condition으로 작성-->
                                    <input type="radio" name="condition" value="Old"> 중고도서
                                    <input type="radio" name="condition" value="EBook"> E-Book
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="submit" class="btn btn-primary" value="등록"> <!--입력된 데이터를 서버로 전송하도록 input type 속성값을 submit으로 작성-->
                                </div>
                            </div>
                        </form>
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