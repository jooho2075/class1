<?php
    $id = $_GET["id"];

    require "./dbconn.php";

    $sql = "SELECT * FROM book WHERE b_id = '$id'";

    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) <= 0)
        echo "일치하는 도서가 없습니다.";
    else {
        $sql = "DELETE FROM book WHERE b_id = '$id'";
        $result = mysqli_query($conn, $sql);
    }

    mysqli_close($conn);
    Header("Location:editBooks.php?edit=delete");
?>