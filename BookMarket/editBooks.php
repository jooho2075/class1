<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./resources/css/bootstrap.min.css"  rel="stylesheet">
    <script type="text/javascript">
        function deleteConfirm(id) {
            if(confirm("해당 도서를 삭제합니다.") == true)
                location.href = "./deleteBook.php?id=" + id;
            else
                return;
        }
    </script>
    <title>도서 편집</title>
</head>
<body class="d-flex flex-column h-100">
    <?php
        require "./menu.php";
        require "./dbconn.php";
    ?>
    <br>
    <main>
        <div class="container py-5">
            <div class="p-5 mb-4 bg-body-tertiary rounded-3">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold">도서 편집</h1>
                    <p class="col-md-8 fs-4">Book Editing</p>
                </div>
            </div>
            <div class="row align-items-md-stretch text-center">
                <?php
                    $edit = $_GET["edit"];

                    $sql = "SELECT * FROM book";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($result)) {
                ?>

                <div class="col-md-4">
                    <div class="h-100 p-5">
                        <img src="./resources/images/<?php echo $row['b_fileName']; ?>" style="width: 100%">
                        <p><h2><?php echo $row["b_name"]; ?></h2></p>
                        <p><?php echo $row["b_author"]. " | ".$row["b_releaseDate"]; ?></p>
                        <p><?php echo mb_substr($row["b_description"], 0, 90, 'utf-8')."..."; ?></p>
                        <p><?php echo $row["b_unitPrice"]; ?>원</p>
                        <p>
                            <?php
                                if($edit == "update") {
                            ?>
                        </p>
                        <a href="./updateBook.php?id=<?php echo $row['b_id']; ?>">
                            <button class="btn btn-success" type="button">수정 &raquo;</button>
                        </a>
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <?php
                    }
                    mysqli_free_result($result);
                    mysqli_close($conn);
                ?>
            </div>
        </div>
    </main>
    <?php
        require "./footer.php";
    ?>
</body>
</html>