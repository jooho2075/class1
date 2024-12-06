
<!doctype html> <!--books.php가 본문 영역-->
<html class="h-100" >
<head>    
    <title>Welcome</title>
    <script src="https://kit.fontawesome.com/935da45d29.js" crossorigin="anonymous"></script>
    <link href="./resources/css/bootstrap.min.css"  rel="stylesheet">     
    <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js" ></script> 
</head>
<body class="d-flex flex-column h-100">
<?php
    //require "./model.php"; // require()함수를 이용해 도서 데이터의 저장 및 관리를 담당하는 model.php파일의 내용 표시
    require "./menu.php"; // require()함수를 이용해서 머리글에 해당하는 menu.php파일의 내용 포함
    require "./dbconn.php";
?>

<?php
    $greeting = "도서목록";
    $tagline = "Welcome to Web Market!";
?>  
<br>

<main >
    <div class="container py-5">
        <div class="p-5 mb-4 bg-body-tertiary rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold"><?php echo $greeting ?></h1>
                <p class="col-md-8 fs-4">BookList</p>
            </div>
        </div> 

        <div class="row align-items-md-stretch text-center">
        
        <?php
            $sql = "SELECT * FROM book";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)) {
            /*
            $listOfBooks = getAllBooks(); // model.php의 getAllBooks()함수 호출하여 전역변수 $BookArray의 모든 정보를 가져와서 $listOfBooks라는 변수에 저장
            for($i=0; $i<count($listOfBooks); $i++) { // $listOfBooks배열의 도서 갯수만큼 실행하도록 반복문 작성, count()함수는 배열의 길이 반환해서 배열에 저장된 도서의 갯수만큼 반복 수행                $id = key($listOfBooks); // 다차원 배열에 저장된 도서 정보를 얻어오기 위한 배열의 키에 해당하는 도서 id인 ISBN1234,1235,1236을 자동계산하도록 작성
                $id = key($listOfBooks);
                $book = $listOfBooks[$id]; // $id에 저장된 ISBN을 사용해서 $listOfBooks 배열에서 해당 도서의 정보를 가져옴
                next($listOfBooks); // next()함수는 배열의 내부 포인터를 다음 배열로 이동
            */
        ?> <!--전체요약 : $listOfBooks에 저장된 도서목록을 순회하며 각 도서의 ISBN과 해당 도서정보를 하나씩 처리-->
            <div class="col-md-4">
                <div class="h-100 p-5">
                    <a href="processDownLoadImage.php?file=<?php echo urlencode($book['filename']); ?>">
                        <img src="./resources/images/<?php echo $row['b_fileName']; ?>" style="width: 100%">
                    </a>
                    <h2><?php echo $row["b_name"]; ?></h2> <!--$BookArray에 저장된 도서명, 저자, 출판일, 도서 상세 정보, 가격을 출력하도록 echo문 작성-->
                    <P><?php echo $row["b_author"]. " | ".$row["b_releaseDate"]; ?></p>
                    <p><?php echo mb_substr($row["b_description"], 0, 90, 'utf-8'). "..."; ?></p> <!--도서 상세설명 줄여서 표기하도록-->
                    <p><?php echo $row["b_unitPrice"]; ?>원</p>
                    <p>
                        <a href="./book.php?id=<?php echo $row['b_id']; ?>">
                            <button class="btn btn-outline-secondary" type="button">상세 정보</button> <!--상세정보 버튼-->
                        </a>
                    </p>
                </div>
            </div>
            <?php
                }
                mysqli_free_result($result);
                mysqli_close($conn);
            ?>
        </div>
</main>

<?php
require "./footer.php"; // require()함수를 이용해서 바닥글에 해당하는 footer.php파일의 내용 포함
?>
</body>
</html>