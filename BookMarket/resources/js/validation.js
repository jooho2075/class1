function CheckAddBook() {
    var bookId = document.getElementById("bookId");
    var name = document.getElementById("name");
    var unitPrice = document.getElementById("unitPrice");
    var unitsInStock = document.getElementById("unitsInStock");
    var description = document.getElementById("description");
    var bookImage = document.getElementById("bookImage");

    // 상품 아이디 체크
    if(!check(/^ISBN[0-9]{4,12}$/, bookId, "[도서 코드]\nISBN과 숫자를 조합하여 4~12자까지 입력하세요\n첫 글자는 반드시 ISBN으로 시작하세요")) {
        return false;
    }

    // 상품명 체크
    if(name.value.length < 4 || name.value.length > 50) {
        alert("[도서명]\n최소 4자에서 최대 50자까지 입력하세요");
        name.select();
        name.focus();
        return false;
    }

    // 상품 가격 체크
    if(unitPrice.value.length == 0 || isNaN(unitPrice.value)) {
        alert("[가격]\n숫자만 입력하세요");
        unitPrice.select();
        unitPrice.focus();
        return false;
    }

    if(unitPrice.value < 0) {
        alert("[가격]\n음수를 입력할 수 없습니다");
        unitPrice.select();
        unitPrice.focus();
        return false;
    } else if(!check(/^d+(?:[.]?[\d]?[\d])?$/, unitPrice, "[가격]\n소수점 둘째 자리까지만 입력하세요")) {
        unitPrice.select();
        unitPrice.focus();
        return false;
    }

    // 재고 수 체크
    if(isNaN(unitsInStock.value)) {
        alert("[재고 수]\n숫자만 입력하세요");
        unitsInStock.select();
        unitsInStock.focus();
        return false;
    }

    // 상세 설명 체크
    if(description.value.length < 80) {
        alert("[상세 설명]\n최소 80자 이상 입력하세요");
        description.select();
        description.focus();
        return false;
    }

    // 업로드 파일 체크
    if(bookImage.value.length == "") {
        alert("[이미지]\n업로드 파일을 입력하세요");
        bookImage.select();
        bookImage.focus();
        return false;
    }

    function check(regExp, e, msg) {
        if(regExp.test(e.value)) {
            return true;
        }
        alert(msg);
        e.selct();
        e.focus();
        return false;
    }
    document.newBook.submit();
}