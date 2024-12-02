<?php
    // 연결 생성
    $conn = mysqli_connect("localhost:3307", "root", "", "class1");

    // 연결 확인
    if(!$conn) {
        die("DB 연결 실패 : ". mysqli_connect_error());
    }

    echo "DB 연결 성공" .mysqli_get_host_info($conn)."<br>";

    // $sql = "insert into student(name, password) values('ho', '3456')";
    // $sql = "update student set name='hohohohoho' where id=4";
    // $sql = "delete from student where id=4";
    // mysqli_query($conn, $sql);

    $sql = "select * from student";
    $result = mysqli_query($conn, $sql);

    echo "레코드 수 : ";
    echo mysqli_num_rows($result)."<br>"; // 결과의 갯수를 읽어줌

    while($row = mysqli_fetch_array($result)) {
        // echo $row['id']; -> 단독 변수인 경우 인덱스를 문자열로 반드시 표시
        echo "ID : $row[id] | "; // 문자열 내부에 사용될 경우 인덱스는 그대로 따옴표 없이 사용 
        echo "NAME : $row[name] | ";
        echo "PASS : $row[password]<br>";
    }

    mysqli_free_result($result);

    mysqli_close($conn);
?>