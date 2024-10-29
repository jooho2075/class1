<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Midterm Practice
    </title>
</head>
<body>
    <h1>Chapter2</h1>
    <h3>php 파일 생성 위치</h3>
    <p>xampp->htdocs에 폴더 만들어서 php파일 만들기</p>
    <hr>

    <h1>Chapter2 - PHP 기초 문법</h1>
    <p>
        <?php
            echo "&lt;?php?&gt;안에 필요한 내용 쓰기<br>";
            echo "변수 선언할 때 \$변수이름 형식으로 선언<br>";
            echo "여러 문자열을 출력할 때는 쉼표(,)/마침표(.)로 구분해서 echo문에 전달<br>";
            echo "모든 변수는 \$기호로 시작하고 영어의 대소문자 또는 _로 시작하며 숫자로 시작 불가<br>";
        ?>
    </p>

    <h3>이름, 폰번호, 주소, 이메일 주소를 변수로 저장해서 출력하는 프로그램</h3>
    <?php
        $name = "박주호";
        $phoneNumber = 01062467765;
        $adress = "경기도 광명";
        $email = "juho2075@naver.com";

        echo "이름 : {$name}<br>";
        echo "이름 : {$phoneNumber}<br>";
        echo "이름 : {$adress}<br>";
        echo "이름 : {$email}<br>";
    ?>

    <h3>거스름돈 계산 프로그램</h3>
    <?php
        $money = 3000;
        $price = 800;
        $num = 3;

        $change = $money - ($price * $num);

        echo "물건 가격 : {$price}<br>";
        echo "구매 개수 : {$num}<br>";
        echo "지불액 : {$money}<br>";
        echo "거스름돈 : {$change}<br>";
    ?>
    <hr>

    <h1>Chapter3 - 제어문</h1>
    <h3>누적 합계 구하기</h3>
    <?php
        $sum = 0;
        for($i=1; $i<=10; $i++) {
            $sum += $i;
        }
        echo "1~10까지의 합 : {$sum}<br>";
    ?>

    <h3>현재 접속 일시 표시하기</h3>
    <p>date()함수의 형식 지정자</p>
    <p>
        Y: 4자리 연도 (예: 2024)<br>
        m: 2자리 월 (01부터 12)<br>
        d: 2자리 일 (01부터 31)<br>
        H: 24시간 형식의 시 (00부터 23)<br>
        i: 분 (00부터 59)<br>
        s: 초 (00부터 59)<br>
        l: 요일의 전체 이름 (예: Monday, Tuesday)<br>
        F: 월의 전체 이름 (예: January, February)<br>
        j: 0이 없는 날짜 (예: 1부터 31)<br>
    </p>
    <?php
        echo "예시<br>";
        $date = date("Y/m/d");
        $hour = date("H");
        $minute = date("i");
        $second = date("s");
        $time = $hour . " : " . $minute . " : " . $second;
        echo "현재 시간 => {$date} " . "{$time}<br>";
    ?>
    <hr>

    <h1>Chapter4. 배열과 문자열</h1>
    <p>배열 유형</p>
    <p>$배열명 = []; // $배열명 = array(); // $배열명[0] = "";</p>
    <p>
        연관배열 : 1차원 배열인 숫자 배열과 기능적으로 매우 유사하지만 인덱스를<br> 
        사용자 정의 문자열로 지정하기 때문에 배열 요소에 접근하는 키와 값 사이에 강력한 연관관계 설명 가능<br>
        $배열명 = ["키이름1" => 값1....];<br>
        $배열명 = array("키이름1" => 값1);<br>
        $배열명["키이름1"] = 값1;<br>
        다차원 배열 : 하나 이상의 배열을 포함하는 중첩배열<br>
        => 동시에 여러 배열에 값 할당 가능, 데이터 유형이 달라도 됨, 관련 데이터를 함께 그룹화 가능<br>
        => 배열 크기가 커지면 복잡도 증가<br>
    </p>
    <p>연관배열 이용해서 평균 구하기</p>
    <?php
        $gradeArr["홍길동"] = 79;
        $gradeArr["홍길순"] = 90;
        $gradeArr["홍길인"] = 70;
        $sum = 0;

        foreach($gradeArr as $name => $grade) {
            $sum += $grade;
            echo "이름 : ". $name. " // 점수 : ". $grade. "<br>";
        }
        echo "합계 : ". $sum. "<br>";
        echo "평균 : ". $sum/3;
    ?>
    <p>2차원 배열로 합과 평균 구하기</p>
    <?php
        $gradeArr = array(
            array("홍길동", 85,80,79),
            array("홍길순", 75,80,99),
            array("홍길인", 85,80,94)
        );
        echo $gradeArr[0][0],"";
        echo $gradeArr[0][1],"";
        echo $gradeArr[0][2],"";
        echo $gradeArr[0][3],"";
        echo "<br>---------------<br>";

        for($row = 0; $row<3; $row++) {
            $sum = 0;
            for($col = 0; $col<4; $col++) {
                echo $gradeArr[$row][$col]." ";
                if($col!=0) {
                    $sum += $gradeArr[$row][$col];
                }
            }
            echo "=> ";
            echo "합계 : ". $sum;
            echo "평균 : ". $sum/3;
            echo "<br>";
        }
    ?>

    <p>
        문자열 작은따옴표, 큰따옴표로 묶음 // 문자열에는 길이 제한 없음<br>
        문자열에 큰따옴표, 작은따옴표 출력 방법 : \", \'<br>
    </p>
    <hr>
    
    <h1>Chapter5. 함수: 페이지 모듈화하기</h1>
    <p>사용자 정의 함수</p>
    <p>
        function 함수명() 함수 본문<br>
        함수 이름은 문자나 밑줄로 시작하고 숫자는 사용 불가<br>
        함수 이름에 공백 넣으면 안됨<br>
        의미 있는 함수명 사용하기<br>
    </p>
    <p>값 전달(call by value) 방식</p>
    <p>
        함수 내부에서 매개변수의 값을 수정하여도 함수를 호출할 때 전달된 인수의 실제 값은 수정되지 않는 방식
    </p>
    <p>참조 전달(call by reference) 방식</p>
    <p>
        함수 내부에서 매개변수를 수정하면 함수를 호출할 때 전달된 인수의 실제 값이 수정되는 방식
    </p>
    <p>
        내장 함수 : php 엔진에 미리 정의된 라이브러리 함수<br>
        => 날짜, 숫자, 문자열과 같은 다양한 함수를 제공함<br>
        "date_default_timezone_set(Asia/Seoul)" : 대한민국 서울의 시간 제공<br>
        수학 관련 : "abs()-절대값" // "ceil()-큰 정수값" // "sqrt()-양수의 제곱근" // "rand()-난수생성" 
    </p>
    <p>외부 파일 포함하는 함수</p>
    <p>
        'include("경로명/파일명")'<br>
        'require("경로명/파일명")'<br>
        공통점 : 지정된 파일의 모든 텍스트를 가져와 해당 함수를 사용하는 파일에 복사<br>
        차이점 : include()는 문제가 발생하면 경고 생성 후 진행하는 반명 require()는 실행을 중단함<br>
        'include_once()', 'require_once()'는 같은 파일이 두 번 이상 포함됐을 때 충돌하는 상황을 방지하기 위함
    </p>
    <hr>
    
    <h1>Chapter6. Get&Post 방식</h1>
    <p>Get방식</p>
    <p>
        HTML문서를 가져오기 위해 web server에 URL 요청하는데 사용<br>
        URL형태로 표시되어 북마크 가능(URL길이에 제한이 있음)<br>
        클라이언트에 보이는 모든 데이터 검색 가능<br>
        이름 또는 값 쌍으로 URL에 전송데이터(요청파라미터)를 추가할 수 있음<br>
        이름, 비밀번호와 같은 민감한 정보를 전달하는데 적합하지 않음(정보가 URL에 그대로 노출됨)<br>
        form 태그에서 method 속성을 통해서 form페이지에 입력된 데이터가 흐르는 방식으로 GET지정함<br><br>
        GET방식으로 데이터 전달 : &lt;form method=&quot;GET&quot;&gt;<br>
        Get방식으로 데이터 받기 : '$_GET["요청 파라미터 이름"]'<br>
    </p>
    <p>GET 사용 예시</p>
    <form method="GET">
        <p>
            ID : <input type="text" name="id">
            PW : <input type="text" name="password">
        </p>
        <button type="submit" value="login">LOG IN</button>
    </form>
    <?php
        echo "ID : ". $_GET["id"]. "<br>";
        echo "PW : ". $_GET["password"]. "<br>";
    ?><br>

    <p>Post방식</p>
    <p>
        리소스를 생성하거나 업데이트하기 위해 데이터를 서버로 보내는데 사용됨<br>
        클라이언트 측에서 특정 리소스/데이터를 생성하거나 다시 쓰기 위해 지정된 서버로 데이터를 보내는데 사용<br>
        Post방식으로 전송된 데이터는 URL에 표시되지 않음(해당 페이지 북마크 불가능)<br>
        Post방식의 요청은 요청 본문과 쿼리 문자열에서 입력을 가져옴<br>
        민감한 정보를 서버에 안전하게 전달 가능<br>
        전달 데이터의 양에 제한이 없어 데이터의 길이에도 제한이 없음<br><br>
        POST방식으로 데이터 전달 : &lt;form method=&quot;POST&quot;&gt;<br>
        POST 방식으로 데이터 받기 : '$_POST["요청 파라미터 이름"]'<br>
    </p>
    <p>POST 사용 예시</p>
    <form method="POST">
        <p>
            ID : <input type="text" name="id2">
            PW : <input type="text" name="password2">
        </p>
        <button type="submit" value="login">LOG IN</button>
    </form>
    <?php
        echo "ID : ". $_POST["id2"]. "<br>";
        echo "PW : ". $_POST["password2"]. "<br>";
    ?><br>
    <p>$_REQUEST 변수</p>
    <p>
        GET/POST 방식으로 전송된 데이터를 가져오는데 사용함<br>
        '$_REQUEST["요청 파라미터명"]'<br>
    </p>
    <p>REQUEST 사용 예시</p>
    <?php
        echo "ID : ". $_REQUEST["id3"]. "<br>";
        echo "PW : ". $_REQUEST["password3"]. "<br>";
    ?>
    <form method="POST">
        <p>
            ID : <input type="text" name="id3">
            PW : <input type="text" name="password3">
        </p>
        <button type="submit" value="login">LOG IN</button>
    </form>
    <br>
    <hr>
    
    <h1>Chapter7. 폼 태그 : 도서 등록 페이지 만들기</h1>
    <h3>회원가입</h3>
    <form action="form_process.php" name="member" metho="post">
        <p>아이디 : 
            <input type="text" name="id">
            <input type="button" value="아이디 중복 검사">
        </p>
        <p>비밀번호 : <input type="password" name="passwd"></p>
        <p>이름 : <input type="text" name="name"></p>
        <p>연락처 : <input type="text" name="num1">-<input type="text" name="num2">-<input type="text" name="num3"></p>
        <p>성별 : <input type="radio" name="gender" value="남성" checked>남성 <input type="radio" name="gender" value="여성">여성</p>
        <p>취미 : 
            <input type="checkbox" name="hobby1" value="독서" checked>독서
            <input type="checkbox" name="hobby2" value="운동">운동
            <input type="checkbox" name="hobby3" value="영화">영화    
        </p>
        <p>
            <textarea name="comment" cols="30" rows="3" placeholder="가입인사 입력!!"></textarea>
        </p>
        <p><input type="submit" value="가입하기"> <input type="reset" value="다시쓰기"></p>
    </form>
    <hr>

    <h1>Chapter8. 폼 태그 : 도서 등록 페이지 만들기</h1>
    <h3>입출력 주요 함수</h3>
    <p>
        file_exists() : 파일이나 디렉토리가 존재하는지 확인<br>
        fopen() : 파일 또는 url을 연다<br>
        fclose() : 열린 파일 포인터를 닫음<br>
        fwrite() : 파일에 데이터를 씀<br>
        fread() : 파일로부터 데이터를 읽는다<br>
        feof() : 파일의 끝에 도달했는지 확인<br>
        copy() : 파일 복사<br>
        file_get_contents() : 전체 파일을 문자열로 읽어옴<br>
        unlink() : 파일 삭제<br>
        filesize() : 파일의 크기 구함<br>
        rename() : 파일명 변경<br>
        mkdir() : 새 디렉토리 생성<br>
    </p>

    <h3>fopen()함수의 형식</h3>
    <p>
        resource fopen(<br>&nbsp
            string $filename, // 파일 경로 및 이름<br>&nbsp
            string $mode, // 스트림에 필요한 액세스 유형 지정<br>&nbsp
            bool $use_include_path = false, // 선택적 매개변수로 파일을 검색하려는 경우 1이나 true로 설정가능<br>&nbsp
            ?resource $context = null // 컨텍스트 스트림 리소스<br>
        )
    </p>
    
    <h3>$mode의 모드 종류</h3>
    <p>
        r : 읽기 전용으로 파일 열기<br>
        r+ : 읽고 쓰기 위해 파일 열기<br>
        w : 쓰기 전용으로 파일을 열고 파일의 내용 삭제, 파일이 존재하지 않으면 php는 파일 생성을 시도함<br>
        w+ : 읽기 및 쓰기용으로 파일의 내용을 지움, 파일이 존재하지 않으면 php는 파일 생성을 시도함<br>
        a : 쓰기 전용으로 파일을 열고, 파일 끝에 기록하여 파일 내용을 보존함, 파일이 존재하지 않으면 php는 파일 생성을 시도함<br>
        a+ : 읽고 쓰기 위해 파일을 열고, 파일 끝에 기록하여 파일 내용을 보존함, 파일이 존재하지 않으면 php는 파일 생성을 시도함<br>
    </p>
    
    <h3>fclose()함수 형식</h3>
    <p>
        fclose(resource $stream) : bool // $stream : 파일의 포인터 리소스<br>
    </p>
    
    <h3>파일 열기 및 닫기 예시</h3>
    <p>
        $handle = fopen("data.txt", "r");<br>
        $handle = fclose($handle);
    </p>
    
    <h3>파일 쓰기 주요 함수 유형</h3>
    <p>
        fwrite() : 파일에서 데이터를 한 번에 한 줄씩 쓰는데 사용<br>
        fputs() : 파일에서 데이터를 한 번에 한 줄씩 쓰는데 사용<br>
        file_put_contents() : 파일에서 데이터를 한 번에 쓰는데 사용<br>
    </p>

    <h3>fwrite(), fputs() 형식</h3>
    <p>
        int fwrite(resouce $stream, string $data, ?int $length = null)<br>
        int fputs(resouce $stream, string $data, ?int $length = null)
    </p>

    <h3>fwrite(), fputs() 매개변수와 역할</h3>
    <p>
        $stream : 파일의 포인터 리소스<br>
        $data : 쓰일 문자열<br>
        $length : 쓰일 문자열의 길이<br>
    </p>

    <h3>fwrite() 사용 예시</h3>
    <p>
        $file = "data.txt";<br>
        $str = "hello";<br>
        $handle = fopen($file, "w");<br>
        if(file_exists($file)) {<br>&nbsp
            fwrite($handle, $str);<br>&nbsp
            fclose($handle);<br>&nbsp
            echo "파일쓰기 성공";<br>
        } else {<br>&nbsp&nbsp
            echo "파일쓰기 실패";<br>
        }
    </p>

    <h3>파일 읽기</h3>
    <p>파일 읽기 함수 유형</p>
    <p>
        fread() : 설정된 최대 바이트만큼 읽는데 사용<br>
        fgets() : 파일에서 데이터를 한 번에 한 줄씩 읽는데 사용<br>
        fgetc() : 파일에서 데이터를 한 번에 한 글자씩 읽는데 사용<br>
        file_get_contents() : 파일에서 데이터를 한 번에 모두 읽는데 사용<br>
        readfile() : 파일에서 데이터를 한 번에 모두 읽는데 사용<br>
    </p>

    <h3>fread(), fgets()의 형식</h3>
    <p>
        string fread(resource $stream, int $length);<br>
        string fgets(resource $stream, int $length = null);<br>
        $stream : 파일의 포인터 리소스 // $length : 쓰일 문자열의 길이
    </p>

    <h3>fread() 함수 사용 예</h3>
    <p>
        $file = "data.txt";<br>
        $handle = fopen($file, "r");<br>
        $content = fread($handle, filesize($file));<br>
        echo $content. "br";<br>
        fclose($handle);
    </p>

    <h3>파일 업로드를 위한 웹 페이지 - form 태그 규칙</h3>
    <p>
        method = "POST", enctype = "multipart/form-data"<br>
        action = "php파일 이름"<br>
        input type = "file", name = "요청 파라미터명"<br>
    </p>

    <h3>파일 업로드 처리</h3>
    <p>
        bool move_upload_file(string $from, string $to)<br>
        $from : 업로드된 파일의 이름<br>
        $to : 이동된 파일의 저장 경로<br>
    </p>
    <h3>업로드된 파일의 정보 얻기 - $_FILES의 변수</h3>
    <p>
        $_FILES['file']['tmp_name'] : 웹 서버의 임시 디렉토리에 업로드된 파일<br>
        $_FILES['file']['name'] : 업로드된 파일의 실제 이름<br>
        $_FILES['file']['size'] : 업로드된 파일의 크기(바이트)<br>
        $_FILES['file']['type'] : 업로드된 파일의 MIME유형<br>
        $_FILES['file']['error'] : 파일 업로드와 관련된 오류 코드<br>
    </p>

    <h1>프로젝트 만드는 순서</h1>
    <p>
        <ol>
            <li>Chapter1. htdocs에 폴더 만들기</li>
            <li>Chapter2. 시작페이지(welcome.php)만들기 => 부트스트랩 / 폰트어썸 적용</li>
            <li>Chapter3. 현재시간 적용하기(welcome.php파일 / tagline아래쪽에) // header("Refresh:5") 웹 페이지가 일정 시간 이후에 자동으로 새로고침 되도록 하는 함수</li>
            <li>Chapter4. 도서목록 만들기(2차원 배열로 / books.php에서 배열 부분 가져오기)
                ->books.php에 도서 목록 출력페이지 만들기, 도서 상세설명 요약 표시 작성하기
                -> welcome에서 link,script태그 가져오기
            </li>
            <li>Chapter5. 모듈화</li>
                <ul>
                    <li>menu.php(머리글)파일 만들기 : welcome.php에서 header부분 가져오기</li>
                    <li>footer.php(바닥글)만들기 : welcome.php에서 footer부분 가져오기</li>
                    <li>시작페이지(welcome.php) 모듈화하기</li>
                    <li>model.php만들기 : 도서 데이터를 저장 관리하는 php페이지 작성 / books.php의 배열 부분 가져오기</li>
                    <li>books.php(모듈화)에 require model,menu(body태그 뒤) // require footer해주기(main태그 뒤)</li>
                    <li>model.php에 도서목록 가져오는 함수(getAllBooks()) 정의하기</li>
                    <li>books.php에 도서목록 호출하는 함수(listOfBooks부분 확인하기) 정의하기</li>
                    <li>welcome.php에서 접속일시를 한국으로 맞춰주기</li>
                </ul>
            <li>Chapter6. GET&POST해주기</li>
                <ul>
                    <li>model.php파일에 도서 상세 정보를 가져오는 함수(getBookById()) 만들기</li>
                    <li>books.php에 상세정보 버튼 만들기</li>
                    <li> 도서 상세정보 페이지 만들기(book.php 만들기)</li>
                </ul>
            <li>Chapter7. Form 태그 - 도서등록 페이지 만들기</li>
                <ul>
                    <li>menu.php에 도서등록 메뉴 추가</li>
                    <li>addBook.php 파일 추가</li>
                    <li>model.php에 신규도서 데이터를 저장하는 함수(addBook()) 만들기</li>
                    <li>processAddBook.php파일 만들기(신규도서 등록 페이지)</li>
                </ul>
        </ol>
    </p>
    <hr>
</body>
</html>