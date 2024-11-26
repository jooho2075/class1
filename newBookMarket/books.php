<!doctype html>
<html class="h-100" >   
<head>
  <title>도서 목록</title>
    <link href="./resources/css/bootstrap.min.css" rel="stylesheet"> 
    <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js" ></script>   
    <!-- Custom styles for this template -->
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
       <h1 class="display-5 fw-bold">도서 목록</h1>
       <p class="col-md-8 fs-4">BookList</p>
      </div>
   </div>
 
   <div class="row align-items-md-stretch text-center">
  <?php
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
        <p> <a href="./book.php?id=<?php echo $row['b_id']; ?>">
          <button class="btn btn-outline-secondary" type="button">상세 정보</button></a>       
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
