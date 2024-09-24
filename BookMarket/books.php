<?php
  $BookArray = [
    "ISBN1234" => ["name" => 'HTML5 웹 프로그래밍', "unitPrice" => 29000],
    "ISBN1235" => ["name" => 'JSP 웹 프로그래밍', "unitPrice" => 27000],
    "ISBN1236" => ["name" => '스프링 프레임워크', "unitPrice" => 30000]
  ];

  $BookArray["ISBN1234"]["author"] = "윤인성";
  $BookArray["ISBN1234"]["description"] = "이 책은 웹 프로그래밍을 시작하는 입문자를 위한 실습서입니다. 단계별 예제를 따라 하며 HTML5, CSS3, 자바스크립트의 기초를 익히고 jQuery와 실무에서 쓰이는 다양한 플러그인을 경험할 수 있습니다";
  $BookArray["ISBN1234"]["category"] = "IT모바일";
  $BookArray["ISBN1234"]["unitsInStock"] = 1000;
  $BookArray["ISBN1234"]["releaseDate"] = "2023/08/05";
  $BookArray["ISBN1234"]["condition"] = "N";
  
  $BookArray["ISBN1235"]["author"] = "송미영";
  $BookArray["ISBN1235"]["description"] = "JSP의 이론적 개념 → 기본 실습 → 응용 실습 순의 단계별 학습이 가능합니다. 응용 실습이 합쳐져 최종적으로 쇼핑몰 하나를 완성하는 구성이라 배운 내용이 어디에 어떻게 적용되는지 알 수 있습니다.";
  $BookArray["ISBN1235"]["category"] = "IT모바일";
  $BookArray["ISBN1235"]["unitsInStock"] = 1000;
  $BookArray["ISBN1235"]["releaseDate"] =  "2018/10/08";
  $BookArray["ISBN1235"]["condition"] = "N";

  $BookArray["ISBN1236"]["author"] = "김명호";
  $BookArray["ISBN1236"]["description"] = "스프링 프레임워크의 전체적인 구조와 핵심 이론을 다양한 예제 프로젝트를 통해 배울 수 있습니다. 전자 도서관 시스템의 여러 기능을 구현하며 스프링 MVC의 심화 개념과 실무 기술도 익힐 수 있습니다. ";
  $BookArray["ISBN1236"]["category"] = "IT모바일";
  $BookArray["ISBN1236"]["unitsInStock"] = 1000;
  $BookArray["ISBN1236"]["releaseDate"] = "2023/07/10";
  $BookArray["ISBN1236"]["condition"] = "N";
?>

<!doctype html>
<html class="h-100" >
<head>    
    <title>Welcome</title>
    <script src="https://kit.fontawesome.com/935da45d29.js" crossorigin="anonymous"></script>
    <link href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css"  rel="stylesheet">     
    <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js" ></script>   
</head>
<body class="d-flex flex-column h-100">
   

<header>
  <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./welcome.php">
                <!--            
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                    <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                </svg>
                -->
                <i class="fa-solid fa-book-open"></i>
                <span class="fs-5">BookMarket</span> 
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">                 
                <ul class="navbar-nav me-auto mb-2 mb-md-0">    
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./welcome.php">Home</a>
                    </li>                                             
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>               
            </div>
        </div>
    </nav>
</header>

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
          for($i = 0; $i < 3; $i++) {
            $id = "ISBN" . (1234+$i);
          ?>
            <div class="col-md-4">
                <div class="h-100 p-5">
                    <h2><?php echo $BookArray[$id]["name"]; ?></h2>
                    <P><?php echo $BookArray[$id]["author"]. " | ".$BookArray[$id]["releaseDate"]; ?></p>
                    <p><?= mb_substr($BookArray[$id]["description"], 0, 90, 'utf-8'). "..."; ?></p>
                    <p><?= $BookArray[$id]["unitPrice"]; ?>원</p>
                </div>
            </div>
          <?php
            }
          ?>
        </div>
        <!--
        <div class="row">
            <div class="col-6" style="border:1px solid red">Col-1</div>
            <div class="col-3" style="border:1px solid red">Col-2</div>
            <div class="col-3" style="border:1px solid red">Col-3</div>
        </div>
    </div>
        -->
</main>

<footer class="footer mt-auto py-3 bg-body-tertiary">
    <div class="container">
        <span class="text-body-primary"> &copy; BookMarket</span>
    </div>
</footer>
</body>
</html>