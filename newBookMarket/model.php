<?php

  $handle = fopen("domain.dat", "r"); //파일 열기

  global $BookArray;
  while(!feof($handle)){ 

    $array =  explode("|", fgets($handle));
    $id = trim($array[0]);

    $BookArray[$id]["name"] = trim($array[1]);
    $BookArray[$id]["unitPrice"] = trim($array[2]);
    $BookArray[$id]["author"] = trim($array[3]);
    $BookArray[$id]["description"] = trim($array[4]);
    $BookArray[$id]["category"] = trim($array[5]);
    $BookArray[$id]["unitsInStock"] = trim($array[6]);
    $BookArray[$id]["releaseDate"] =trim($array[7]);
    $BookArray[$id]["condition"] = trim($array[8]);
    $BookArray[$id]["filename"] = trim($array[9]);
    $BookArray[$id]["quantity"] = trim($array[10]); // 주문 수량을 이용하려는 목적
  }

  fclose($handle);

 
  function getAllBooks(){
    global    $BookArray;
    return   $BookArray;
  }

  function getBookById($id){
    global    $BookArray, $bookById;   
    for ($i = 0; $i <count($BookArray); $i++) {
      if (array_key_exists($id,   $BookArray)){       
         $bookById =   $BookArray[$id];         
         break;          
       }        
    }     
    return $bookById;
  }
  
  function addBook($bookId, $nbook) {
    global    $BookArray;
    $BookArray[$bookId]["name"] =  $nbook["name"];
    $BookArray[$bookId]["unitPrice"] =  $nbook["unitPrice"];
    $BookArray[$bookId]["author"] =  $nbook["author"];
    $BookArray[$bookId]["description"] =  $nbook["description"];
    $BookArray[$bookId]["category"] =  $nbook["category"];
    $BookArray[$bookId]["unitsInStock"] =  $nbook["unitsInStock"];
    $BookArray[$bookId]["releaseDate"] =  $nbook["releaseDate"];
    $BookArray[$bookId]["condition"] =  $nbook["condition"];
    
  }

?>