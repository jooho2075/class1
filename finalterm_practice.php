<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Practice</title>
</head>
<body>
    <h1>Chapter8. 파일 입출력과 업로드</h1>
    <ol>파일 입출력 개요
        <li>파일 열기(생성) : fopen() => 특정 경로에 저장된 파일 열기</li>
        <li>파일 읽기/쓰기 : fread(), fwrite(), fgets(), fputs()</li>
        <li>파일 닫기 : fclose() => 파일 읽기 또는 쓰기 작업 완료 후 종료</li>
    </ol>
    <h3>예제 8-1. 파일에 구구단 저장하기</h3>
    <?php
    /*
        $file = "gugudan.txt";
        $handle = fopen($file, "w"); // 파일을 쓰기 권한으로 열기

        if(file_exists($file)) {
            for($x = 2; $x<=+9; $x++) {
                for($y = 1; $y<=9; $y++) {
                    $str = $x. " X ". $y. "= ".($x*$y). "\n";
                    fwrite($handle, $str);
                }
            }
            fclose($handle);
            echo "파일 쓰기 성공";
        } else {
            echo "파일 쓰기 실패";
        }
    */
    ?>
    <hr>

    <h3>예제 8-2. 파일에 구구단 읽어오기</h3>
    <div>fread() : 설정된 최대 바이트만큼 읽는데 사용</div>
    <div>fgets() : 파일에서 데이터를 한 번에 한 줄씩 읽는데 사용</div>
    <div>fgetc() : 파일에서 데이터를 한 번에 한 글자씩 읽는 데 사용</div>
    <div>readfile() : 파일에서 데이터를 한 번에 모두 읽는 데 사용</div>
    <?php
    /*
        $file = "gugudan.txt";
        $handle = fopen($file, "r"); // 파일을 읽기 권한으로 열기

        if(file_exists($file)) { // 서버 측에 파일이 있는지 확인
            while(!feof($handle)) { // feof 메서드를 사용하여 파일의 끝부분까지 도달할  때까지 파일의 내용을 한 줄씩 읽어 저장하고 이를 출력 
                $content = fgets($handle);
                echo $content."<br>";
            }
            fclose($handle);
            echo "파일 읽기 성공";
        } else {
            echo "파일 읽기 실패";
    */
    ?>
    <hr>

    <h3>파일 업로드를 위한 웹페이지(form 태그 사용)</h3>
    <div>method 속성은 반드시 POST</div>
    <div>enctype 속성은 반드시 multipart/form-data로 설정</div>
    <div>action 속성은 파일 업로드를 처리할 PHP파일로 설정</div>
    <div>input태그의 type속성은 file로 설정</div>
    <div>여러 파일을 업로드 하려면 2개 이상의 input태그를 사용하고 name속성에 서로 다른 값 설정</div>
    예시 : form method="POST" enctype="multipart/form-data" action="process.php"
    <div>파일 업로드 처리에는 move_uploaded_file()함수 사용</div>
    <div>매개변수 : $from - 업로드된 파일의 이름 // $to - 이동된 파일의 저장경로</div>
    <div>업로드된 파일 처리 : $_FILES 사용</div>
    <ul>
        <li>$_FILES['file']['tmp_name'] : 웹 서버의 임시 디렉토리에 업로드된 파일</li>
        <li>$_FILES['file']['name'] : 업로드된 파일의 실제 이름</li>
        <li>$_FILES['file']['size'] : 업로드된 파일의 크기</li>
        <li>$_FILES['file']['type'] : 업로드된 파일의 MIME유형</li>
        <li>$_FILES['file']['error'] : 파일 업로드와 관련된 오류 코드</li>
    </ul>

    <h3>예제8-3. 파일 업로드 및 정보 출력하기 // 예제8-4. 여러 파일 업로드 및 정보 출력하기</h3>
    <form metho="POST" enctype="multipart/form-data" action="fileupload_process1.php">
        <p>이름 : <input type="text" name="name"></p>
        <p>제목 : <input type="text" name="subject"></p>
        <p>파일 : <input type="file" name="photo"></p>
        <p><input type="submit" value="파일 업로드"></p>
        <p></p>
    </form>
    <hr>

    <h3>파일 다운로드</h3>
    <ul>readfile() 함수의 매개변수와 역할
        <li>$filename : 읽고 있는 파일명</li>
        <li>$use_include_path : 선택적 매개변수로 include_path에서 파일을 검색하려면 true로 설정</li>
        <li>$context : 컨텍스트 스트림 리소스</li>
    </ul>
</body>
</html>