<?php
    $filename = "data.txt";
    $str = "Hello, My name is ParkJooHo\n";

    if(file_exists($filename)) {
        $handle = fopen("data.txt", "a+"); // r+, w+, a+ etc
        fwrite($handle, $str);
        fclose($handle);

        $handle = fopen($filename, "r");
        $str = fread($handle, filesize($filename));
        echo $str;
        
        fclose($handle);
    }
?>