<?php

function filterBookId($field){ // 도서 아이디가 정규 표현식과 일치하는지 검사하는 함수
  $field = filter_var(trim($field)); // trim->앞뒤 공백 제거   
 
  if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^ISBN[0-9]{4,11}$/")))){ // FILTER_VALIDATE_REGEXP->정규 표현식이 맞는지 검사
      return $field;
  } else{
      return FALSE;
  }
}    

function filterName($field){ // 도서명의 문자길이가 맞는지 확인

  $field = filter_var(trim($field));    

  if(strlen($field) >= 4 && strlen($field)<= 50){
      return $field;
  } else{
      return FALSE;
  }
}   

function filterPrice($field){ // 도서 가격이 유효한 정수 또는 실수인지 검사
  if(filter_var(trim($field), FILTER_VALIDATE_INT) || filter_var(trim($field), FILTER_VALIDATE_FLOAT) ){
      return $field;
  } else{
      return FALSE;
  }
}   

function filterPriceFloat($field){     

  $field = filter_var(trim($field));    
 
  if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[\d]*\.?[\d]{0,2}$/")))){
      return $field;
  } else{
      return FALSE;
  }
}   

function filterStock($field){ // 재고 수가 유효한 정수인지 확인
 
  if(filter_var(trim($field), FILTER_VALIDATE_INT)){
      return $field;
  } else{
      return FALSE;
  }
}   

function filterDescription($field){ // 상세 설명의 문자길이가 80자 이상인지 확인
     
  $field = filter_var(trim($field));
  if(!empty($field) && strlen($field) >= 80){
      return $field;
  } else{
      return FALSE;
  }
}   

$bookIdErr =  $nameErr = $unitPriceErr = $descriptionErr = $unitsInStockErr = $bookImageErr = "";


if($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookId = $_POST["bookId"];
    $name = $_POST["name"];
    $unitPrice = $_POST["unitPrice"];
    $author = $_POST["author"];
    $description = $_POST["description"];	
    $category = $_POST["category"];
    $unitsInStock = $_POST["unitsInStock"];
    $releaseDate = $_POST["releaseDate"];		 
    $condition = $_POST["condition"];  
    $filename = $_FILES["bookImage"]["name"];


    if(empty($bookId)){
      $bookIdErr  = "도서코드를 입력하세요";
    } else{      
        if(filterBookId($bookId) == FALSE){ // bookId 체크
            $bookIdErr  = "ISBN과 숫자를 조합하여 5~12자까지 입력하세요";    
        }
    }

    if(empty($name )){ // 도서명 체크
      $nameErr  = "도서명을 입력하세요";
    } else{    
      if(filterName($name ) == FALSE){             
          $nameErr  = "최소 4자에서 최대 50자까지 입력하세요"; 
      }
    }

    if(empty($unitPrice)){ // 가격 체크
      $unitPriceErr = "가격을 입력하세요";
    } else{ 
      if(filterPrice($unitPrice) == FALSE){          
        $unitPriceErr =  "숫자만 입력하세요";         
      }
      else if (filterPrice($unitPrice) < 0)   
        $unitPriceErr ="양수를 입력하세요";
      else {      
        if(filterPriceFloat($unitPrice) == FALSE){          
          $unitPriceErr =  "소수점 둘째 자리까지만 입력하세요";         
      }
    }     
  }

  if(empty( $unitsInStock)){ // 재고수 체크
    $unitsInStockErr = "재고수를 입력하세요";
  } else{    
      if(filterStock( $unitsInStock)== FALSE){        
        $unitsInStockErr =  "숫자만 입력하세요";
      }  
  }


  if(empty($description)){      
      $descriptionErr = "상세설명을 입력하세요"; 
  } else{    
      if(filterDescription($description) == FALSE){            
          $descriptionErr = "최소 80자이상 입력하세요";
      }
  }  


  if ( empty(  $filename )){
      $bookImageErr = "업로드파일을 입력하세요"; 
  }


  if($bookIdErr =="" && $nameErr =="" && $unitPriceErr =="" && $descriptionErr =="" && $unitsInStockErr =="" && $bookImageErr =="")
  {
    $target_path = "resources/images/"; // 서버 파일 저장 경로
    $ext = pathinfo($filename, PATHINFO_EXTENSION); // pathinfo()함수로 파일 경로에서 확장자를 얻어와 폼 페이지에서 입력한 도서 아이디와 확장자를 연결하여 새로운 이미지 파일명 만듬
    $filename = $bookId.".".$ext;
    
    // move_uploaded_file()함수 : 업로드한 이미지를 서버에 저장
    if ( move_uploaded_file($_FILES["bookImage"]["tmp_name"], $target_path . $filename)) {
      require "./dbconn.php"; // require "./dbconn.php"추가
      
      // book 테이블의 새로운 필드값 삽입을 위한 INSERT문 작성
      $sql = "INSERT INTO book (b_id, b_name, b_unitPrice, b_author, b_description, 
              b_category, b_unitsInStock, b_releaseDate, b_condition, b_fileName) VALUES
              ('$bookId', '$name', '$unitPrice', '$author', '$description', '$category', '$unitsInStock',
              '$releaseDate', '$condition', '$filename')";
      
      // 쿼리문 실행을 위한 함수 작성, 쿼리문이 성공하면 book.php페이지로 이동
      if(mysqli_query($conn, $sql))
        Header("Location:books.php"); 
      else{  
        echo "파일이 업로드되지 않았습니다. 다시 시도해 주세요!";  
      }  
    }
    require "./addBook_Error.php";
  }
  }
?>