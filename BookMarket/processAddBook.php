<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // new book 추가 isset()
        // 28~36 : 폼 페이지에서 입력된 값을 얻어오도록 요청 파라미터명(bookId, name, unitPrice...)으로
        // $_POST 전역변수를 사용해서 작성)
        $bookId = $_POST["bookId"];  
        $name = $_POST["name"];
        $unitPrice = $_POST["unitPrice"];
        $author = $_POST["author"];
        $description = $_POST["description"];
        $category = $_POST["category"];
        $unitsInStock = $_POST["unitsInStock"];
        $releaseDate = $_POST["releaseDate"];
        $condition = $_POST["condition"];
        $filename = $_FILES['bookImage']['name'];

        $target_path = "resources/images/";

        $ext = pathinfo($filename, PATHINFO_EXTENSION); // PATHINFO_EXTENSION -> 확장자 뽑아주는 역할, $ext가 확장자명이 됨
        $filename = $bookId.".".$ext;

        if(move_uploaded_file($_FILES["bookImage"]["tmp_name"], $target_path .$filename)) {
            $handle = fopen("domain.dat", "a"); // 파일 열기
            $book_info = "$bookId | $name | $unitPrice | $author | $description | $category | $unitsInStock | $releaseDate | $condition | $filename";
            fwrite($handle, "\n".$book_info);

            fclose($handle);

            Header("Location:books.php");
        } else {
            echo "파일이 업로드되지 않았습니다. 다시 시도해 주세요!";
        }
    }
?>