<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // "photo" 키가 존재하는지 확인
        if (isset($_FILES["photo"])) {
            // 파일 업로드 오류 코드 확인
            if ($_FILES["photo"]["error"] == 0) {
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                $filename = $_FILES["photo"]["name"];
                $filetype = $_FILES["photo"]["type"];
                $filesize = $_FILES["photo"]["size"];

                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (!array_key_exists($ext, $allowed)) {
                    die("오류 : 올바른 파일 형식을 선택하세요");
                }

                $maxsize = 5 * 1024 * 1024;
                if ($filesize > $maxsize) {
                    die("오류 : 파일 크기가 허용된 한도보다 큽니다");
                }

                $original_filename = $filename;
                if (in_array($filetype, $allowed)) {
                    $filename = time() . $filename;
                }
                // 파일 업로드 처리
                if (move_uploaded_file($_FILES["photo"]["tmp_name"], "c:/upload/" . $filename)) {
                    echo "이름 : " . htmlspecialchars($_POST['name']) . "<br>";
                    echo "제목 : " . htmlspecialchars($_POST['subject']) . "<br>";
                    echo "-------------------------------<br>";
                    echo "실제 파일명 : " . htmlspecialchars($original_filename) . "<br>";
                    echo "저장 파일명 : " . htmlspecialchars($filename) . "<br>";
                    echo "파일 콘텐츠 유형 : " . htmlspecialchars($filetype) . "<br>";
                    echo "파일 크기 : " . htmlspecialchars($filesize) . "<br>";
                } else {
                    echo "파일 업로드 중 오류가 발생했습니다.";
                }
            } else {
                echo "오류 : 파일 업로드 실패. 코드: " . $_FILES["photo"]["error"];
            }
        } else {
            echo "오류 : 파일이 전송되지 않았습니다.";
        }
    } else {
        echo "잘못된 요청입니다.";
    }
?>
