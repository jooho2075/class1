<!doctype html>
<html class="h-100" >   
<head>
  <title>도서 편집</title>
    <link href="./resources/css/bootstrap.min.css" rel="stylesheet"> 
    <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js" ></script>   
    <!-- Custom styles for this template -->
    <script type="text/javascript">
      function deleteConfirm(id) { // JS로 도서 삭제 여부 확인하는 함수 deleteConfirm()작성
        if(confirm("해당 도서를 삭제합니다!!") == true) {
          location.href = './deleteBook.php?id='+id;
        } else {
          return;
        }
      }
    </script>
</head>
<body class="d-flex flex-column h-100">
<?php    
    require "./menu.php";
    require "./dbconn.php"; // DB연결을 위한 외부파일 포함
?> 
<br>
 <main>
 <div class="container py-5">
   <div class="p-5 mb-4 bg-body-tertiary rounded-3">
     <div class="container-fluid py-5">
       <h1 class="display-5 fw-bold">도서 편집</h1>
       <p class="col-md-8 fs-4">BookList</p>
      </div>
   </div>
 
   <div class="row align-items-md-stretch text-center">
  <?php
    $edit = $_GET["edit"]; // update 또는 delete의 값이 들어올 수 있음

    // book 테이블의 필드값을 가져오기 위한 SELECT문 작성
    $sql = "SELECT * from book";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)) {
  ?>
    <div class="col-md-4">
      <div class="h-100 p-5">
        <img src="./resources/images/<?php echo $row['b_fileName']; ?>" style="width:100%">
        <h2><?php echo $row["b_name"]; ?></h2>
        <p><?php  echo $row["b_author"]. " | ".$row["b_releaseDate"]; ?> 		 
        <p><?php  echo mb_substr($row["b_description"], 0, 90, 'utf-8')."..."; ?> 
        <p><?php  echo $row["b_unitPrice"]; ?>원   
        <p>
          <?php
            if($edit == "update") {
          ?>
          <a href="./updateBook.php?id=<?=$row["b_id"]; ?>">
            <button class="btn btn-success" type="button">수정 &raquo;</button>
          </a>
          <?php
            } else if($edit == "delete") { // 요청 파라미터 edit의 값이 delete면 삭제버튼 출력하도록 작성
          ?>
          <a href="" onclick="deleteConfirm('<?= $row['b_id']; ?>')" class="btn btn-danger" role="button">삭제 &raquo;</a>
            <!-- 삭제 버튼 클릭 시 deleteConfirm 함수가 실행되도록 onclick속성 작성-->
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

</main>
<?php     
    require "./footer.php";
?>
</body>
</html>
