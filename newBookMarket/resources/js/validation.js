function CheckAddBook() { // checkAddBook()함수 : 폼 페이지 입력 항목의 데이터 검사
	// 변수 var로 선언, let으로 수정해도 상관없음
	var bookId = document.getElementById("bookId"); // ISBN1234 
	var name = document.getElementById("name");
	var unitPrice = document.getElementById("unitPrice");
	var unitsInStock = document.getElementById("unitsInStock");
	var description = document.getElementById("description");
	var bookImage = document.getElementById("bookImage");
	
	
	// 상품아아디 체크 - 정규 표현식과 일치하는지 확인
	if (!check(/^ISBN[0-9]{4,12}$/, bookId,
			"[도서 코드]\nISBN과 숫자를 조합하여 5~12자까지 입력하세요\n첫 글자는 반드시 ISBN로 시작하세요")) // 정규 표현식이 맞는지 확인하는 정규식
		return false; // [0-9]->숫자0~9가 오는지 확인, {4,11}->, $->끝까지 오는지 확인

	// 상품명 체크 - 문자열 길이 4~50글자인지 확인
	if (name.value.length < 4  || name.value.length > 50) { // name->도서명의 name을 입력하는 input
		alert("[도서명]\n최소 4자에서 최대 50자까지 입력하세요");
		name.select();
		name.focus();
		return false;
	}
	// 상품 가격 체크
	if (unitPrice.value.length == 0 || isNaN(unitPrice.value)) {
		alert("[가격]\n숫자만 입력하세요");
		unitPrice.select();
		unitPrice.focus();
		return false;
	}

	if (unitPrice.value < 0) { // 가격의 음수 여부 확인
		alert("[가격]\n음수를 입력할 수 없습니다");
		unitPrice.select();
		unitPrice.focus();
		return false;
	} else if (!check(/^\d+(?:[.]?[\d]?[\d])?$/, unitPrice,	"[가격]\n소수점 둘째 자리까지만 입력하세요")){ // d->숫자가 들어가야함(정규표현식 확인)
		unitPrice.select(); // ?-> 한자리수 의미
		unitPrice.focus();
		return false;
	}
		
	// 재고 수 체크 - 숫자 여부 확인
	if (isNaN(unitsInStock.value)) {
		alert("[재고 수]\n숫자만 입력하세요");
		unitsInStock.select();
		unitsInStock.focus();
		return false;
	}

	// 상세 설명 체크 - 문자열 길이 확인
	if (description.value.length < 80) {
		alert("[상세설명]\n최소 80자이상 입력하세요");
		description.select();
		description.focus();
		return false;
	}

	// 업로드 파일 체크 - 파일명의 문자열 길이가 0인지 확인
	if (bookImage.value.length =="") {
		alert("[이미지]\n업로드파일을 입력하세요 ");
		bookImage.select();
		bookImage.focus();
		return false;
	}

	function check(regExp, e, msg) { // regExp->정규표현식

		if (regExp.test(e.value)) {
			return true;
		}
		alert(msg);
		e.select();
		e.focus();
		return false;
	}
	// 폼 페이지에 입력된 데이터 값을 서버로 전송
	document.newBook.submit() // newBook이 form 자체를 가리킴(순수 HTML의 JS였다면 잘못된 문법, php에서만 가능한 문법)
}
// client side에서의 유효성 검사