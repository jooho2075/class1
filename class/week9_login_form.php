<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인 페이지</title>
    <script> // client side에서의 유효성 검사
        function checkLogin() {
            if(document.frm.id.value == "") {
                alert("아이디를 입력해 주세요!!");
                document.frm.id.focus();
                return false;
            }

            if(document.frm.id.value.length < 4 || document.frm.id.value.length >12) {
                alert("아이디를 4~12자리로 입력해주세요!!");
                document.frm.id.focus();
                return false;
            }

            for(i = 0; i < document.frm.id.value; i++) {
                var ch = document.frm.id.value.charAt(i);

                if((ch<'a' || ch>'z') && (ch>'A' || ch<'Z') && (ch>'0' || ch<'9')) {
                    alert("아이디는 영문 소문자만 입력 가능합니다!!");
                    document.frm.id.focus();
                    return false;
                }
            }

            if(document.frm.ps.value == "") {
                alert("비밀번호를 입력해 주세요!!");
                document.frm.ps.focus();
                return false;
            }
            
            if(document.frm.ps.value.length < 4) {
                alert("비밀번호는 4자리 이상으로 입력해 주세요!!");
                document.frm.ps.focus();
                return false;
            }

            if(isNaN(document.frm.ps.value)) {
                alert("비밀번호는 숫자만 입력 가능합니다!!");
                docuemnt.frm.ps.focus();
                return false;
            }
            
            document.frm.submit();
        }
    </script>
</head>
<body>
    <h2>로그인 하기</h2>
    <form name="frm" method="POST" action="week9_processLogin.php">
        <fieldset>
            <legend>로그인</legend>
            <p>아이디 : <input type="text" name="id" id="id"></p>
            <p>패스워드 : <input type="password" name="ps" id="ps"></p>
            <p><input type="submit" value="로그인하기" onclick="return checkLogin()"></p>
        </fieldset>
    </form>
</body>
</html>