<script src="https://kit.fontawesome.com/aba1a85aaa.js" crossorigin="anonymous"></script>
<?php
    session_start();
    if(isset($_SESSION['sessionID']))
        $sessionID = $_SESSION['sessionID'];
?>

<header>
  <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/class1/newBookmarket/welcome.php">                 
                <i class="fa-solid fa-book-open"></i>
                <span class="fs-5">BookMarket</span> 
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">            
                
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/class1/newbookmarket/welcome.php">Home</a>
                </li>                      
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/class1/newBookmarket/books.php">도서 목록</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/class1/newBookmarket/addBook.php">도서 등록</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/class1/newBookmarket/editBooks.php?edit=update">도서 수정</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/class1/newBookmarket/deleteBook.php?edit=delete">도서 삭제</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/class1/newBookmarket/cart.php">장바구니</a>
                </li> 
            </ul>

            <ul class="navbar-nav me-right mb-2 mb-md-0">
                <?php
                    if(empty($sessionID) || $sessionID == null) {
                ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/class1/newBookMarket/member/loginMember.php">로그인</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/class1/newBookMarket/member/addMember.php">회원가입</a>
                </li>
                <?php
                    } else {
                ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/class1/newBookMarket/member/logoutMember.php">로그아웃</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/class1/newBookMarket/member/updateMember.php">회원수정</a>
                </li>
                <?php
                    }
                ?>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>               
            </div>
         </div>
    </nav>
</header>