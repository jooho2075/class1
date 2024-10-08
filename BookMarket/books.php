
<!doctype html>
<html class="h-100" >
<head>    
    <title>Welcome</title>
    <script src="https://kit.fontawesome.com/935da45d29.js" crossorigin="anonymous"></script>
    <link href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css"  rel="stylesheet">     
    <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js" ></script> 
</head>
<body class="d-flex flex-column h-100">
<?php
    require "./model.php";
    require "./menu.php";
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
            $listOfBooks = getAllBooks();
            for($i=0; $i<count($listOfBooks); $i++) {
                $id = key($listOfBooks);
                $book = $listOfBooks[$id];
                next($listOfBooks);
        ?>
            <div class="col-md-4">
                <div class="h-100 p-5">
                    <h2><?php echo $book["name"]; ?></h2>
                    <P><?php echo $book["author"]. " | ".$book["releaseDate"]; ?></p>
                    <p><?php echo mb_substr($book["description"], 0, 90, 'utf-8'). "..."; ?></p>
                    <p><?php echo $book["unitPrice"]; ?>원</p>
                    <p>
                        <a href="./book.php?id=<?php echo $id; ?>">
                            <button class="btn btn-outline-secondary" type="button">상세 정보</button>
                        </a>
                    </p>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
</main>

<?php
require "./footer.php";
?>
</body>
</html>