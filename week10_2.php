<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exception ex2</title>
</head>
<body>
    <?php
        // catch(Exception $e) Exception 객체를 받음
        function exceptionHandler(Throwable $ex) { // Throwable이라는 객체를 받음
            echo "예외 처리 발생 : ", $ex->getMessage(), "\n";
            
            $logDate = date("Ymd");
            $dirName = "log";

            if(is_dir($dirName))
                opendir($dirName);
            else
                mkdir($dirName);

            $fileName = $logDate. "log";

            $fp = fopen("./log".$fileName, 'a+');
            fwrite($fp, "****************************************\r\n");
            fwrite($fp, "예외 발생 일시 : ".date("YmdHis"). "\r\n");
            fwrite($fp, "예외 코드 : ".$ex->getCode()."\r\n");
            fwrite($fp, "예외 메시지 : ".$ex->getMessage(). "\r\n");
            fwrite($fp, "예외 발생 파일명 : ".$ex->getFile(). "\r\n");
            fwrite($fp, "예외 발생한 줄 : ".$ex->getLine(). "\r\n");
            fclose($fp);
        }
        set_exception_handler("exceptionHandler");

        throw new Exception("사용자 지정 예외 핸들러")
    ?>
</body>
</html>