<!doctype html> <!--시작페이지 모듈화-->
<html class="h-100" >
<head>    
    <title>Welcome</title>
    <script src="https://kit.fontawesome.com/935da45d29.js" crossorigin="anonymous"></script>
    <link href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css"  rel="stylesheet">     
    <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js" ></script>   
</head>
<body class="d-flex flex-column h-100">

<?php
    require "./menu.php"; // require함수를 이용해서 menu.php파일의 내용을 포함함
?>

<?php
     $greeting = "도서 쇼핑몰에 오신 것을 환영합니다";
     $tagline = "Welcome to Web Market!";
?>

<br>
 <main > 
    <div class="container py-5">
        
        <div class="p-5 mb-4 bg-body-tertiary rounded-3"><!--제목영역-->
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold"><?php echo $greeting ?></h1>
                <p class="col-md-8 fs-4">BookMarket</p>
            </div>
        </div> <!--제목영역-->
        
        <div class="row align-items-md-stretch text-center"> <!--본문영역-->
            <div class="col-md-12">
                <div class="h-100 p-5"> <!--접속 일시-->
                    <h2><?php echo $tagline ?></h2>
                    <?php
                    //header("Refresh:5"); // refresh the time every 5 seconds
                    date_default_timezone_set("Asia/Seoul");
                    echo "현재 접속 일시 : ". date("Y/m/d H:i:s A"); // 연/월/일 시:분:초 AM(PM) 형태로 반환되도록 date()함수를 Y/m/d H:i:s A형식으로 작성
                    ?>
                </div>
            </div> 
        </div> <!--본문영역-->
    </div>
</main>

<?php
    require "./footer.php"; // require함수를 이용해서 footer.php파일의 내용을 포함함
?> <!--바닥글 영역-->
</body>
</html>