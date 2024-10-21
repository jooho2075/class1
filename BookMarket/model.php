<?php
  $BookArray = [ // $BookArray는 ISBN번호를 키로 갖는 연관 배열, 각 ISBN 번호는 책의 세부 정보를 포함한 또 다른 연관배열을 가리킴
    "ISBN1234" => ["name" => 'HTML5 웹 프로그래밍', "unitPrice" => 29000],
    "ISBN1235" => ["name" => 'JSP 웹 프로그래밍', "unitPrice" => 27000],
    "ISBN1236" => ["name" => '스프링 프레임워크', "unitPrice" => 30000]
  ]; // 도서목록 저장을 위한 다차원 배열 $BookArray(도서 ID를 키(인덱스)로 함)

  // 3개의 도서 정보에 대해 도서 ID를 키(인덱스)로 각각 저장,, ISBN1234-첫번째 도서의 키, ISBN1235-두번째 도서의 키, ISBN1236-세번째 도서의 키
  $BookArray["ISBN1234"]["author"] = "윤인성";
  $BookArray["ISBN1234"]["description"] = "이 책은 웹 프로그래밍을 시작하는 입문자를 위한 실습서입니다. 단계별 예제를 따라 하며 HTML5, CSS3, 자바스크립트의 기초를 익히고 jQuery와 실무에서 쓰이는 다양한 플러그인을 경험할 수 있습니다";
  $BookArray["ISBN1234"]["category"] = "IT모바일";
  $BookArray["ISBN1234"]["unitsInStock"] = 1000;
  $BookArray["ISBN1234"]["releaseDate"] = "2023/08/05";
  $BookArray["ISBN1234"]["condition"] = "N"; // 도서 id가 ISBN1234인 열 요소값으로 다음과 같이 저장함
  
  $BookArray["ISBN1235"]["author"] = "송미영";
  $BookArray["ISBN1235"]["description"] = "JSP의 이론적 개념 → 기본 실습 → 응용 실습 순의 단계별 학습이 가능합니다. 응용 실습이 합쳐져 최종적으로 쇼핑몰 하나를 완성하는 구성이라 배운 내용이 어디에 어떻게 적용되는지 알 수 있습니다.";
  $BookArray["ISBN1235"]["category"] = "IT모바일";
  $BookArray["ISBN1235"]["unitsInStock"] = 1000;
  $BookArray["ISBN1235"]["releaseDate"] =  "2018/10/08";
  $BookArray["ISBN1235"]["condition"] = "N"; // 도서 id가 ISBN1235인 열 요소값으로 다음과 같이 저장함

  $BookArray["ISBN1236"]["author"] = "김명호";
  $BookArray["ISBN1236"]["description"] = "스프링 프레임워크의 전체적인 구조와 핵심 이론을 다양한 예제 프로젝트를 통해 배울 수 있습니다. 전자 도서관 시스템의 여러 기능을 구현하며 스프링 MVC의 심화 개념과 실무 기술도 익힐 수 있습니다. ";
  $BookArray["ISBN1236"]["category"] = "IT모바일";
  $BookArray["ISBN1236"]["unitsInStock"] = 1000;
  $BookArray["ISBN1236"]["releaseDate"] = "2023/07/10";
  $BookArray["ISBN1236"]["condition"] = "N"; // 도서 id가 ISBN1236인 열 요소값으로 다음과 같이 저장함

  function getAllBooks() { // 전역변수 $BookArray에 저장된 모든 도서 정보를 반환, $BookArray 배열에 저장된 모든 책의 데이터를 가져옴
    global $BookArray; // 전역변수 $BookArray선언, global이라는 키워드 사용
    return $BookArray; // $BookArray 배열의 값 반환
  }

  // 도서 상세 정보 가져오는 함수
  function getBookById($id) { // 36~44-전역변수 $BookArray에 저장된 모든 도서 목록에서 도서 아이디와 일치하는 도서를 가져오는 함수 getBookById() 작성
    global $BookArray, $bookById; // 전역변수 $BookArray, $bookById(검색된 도서의 정보를 저장하는 변수) 선언
    for($i = 0; $i < count($BookArray); $i++) {
      if(array_key_exists($id, $BookArray)) { // 지정된 키 $id가 $BookArray배열에 존재하는지 확인
        $bookById = $BookArray[$id]; // $id와 일치하는 도서가 발견되면 해당 도서의 정보를 $bookById 변수에 저장
        break;
      }
    }
    return $bookById; // 검색된 도서의 정보 반환
  }

  // 신규 도서 데이터를 전역배열 $BookArray에 저장하는 함수 , 도서ID와 새로운 도서 정보를 받아 해당 도서를 배열에 저장
  function addBook($bookId, $nbook) {
    global $BookArray;
    // $bookId : 새로운 도서의 고유 ID(배열의 키로 사용)
    // $nbook : 새로 추가될 도서의 도서의 정보가 포함된 연관 배열, 배열에 포함된 정보를 사용해서 도서의 세부사항을 하나씩 $BookArray에 저장
    $BookArray[$bookId]["name"] = $nbook["name"];
    $BookArray[$bookId]["unitPrice"] = $nbook["unitPrice"];
    $BookArray[$bookId]["author"] = $nbook["author"];
    $BookArray[$bookId]["description"] = $nbook["description"];
    $BookArray[$bookId]["category"] = $nbook["category"];
    $BookArray[$bookId]["unitsInStock"] = $nbook["unitsInStock"];
    $BookArray[$bookId]["releaseDate"] = $nbook["releaseDate"];
    $BookArray[$bookId]["condition"] = $nbook["condition"];
  }
?>