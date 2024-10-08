<?php
    echo "<h2>GET 방식</h2>";
    $id = "";
    $pass = "";
    $name = "";
    $gender = "";
    $hobby = "";

    if(isset($_GET["id"]))
        $id = $_GET["id"];
    if(isset($_GET["pass"]))
        $pass = $_GET["pass"];
    if(isset($_GET["name"]))
        $name = $_GET["name"];
    if(isset($_GET["gender"]))
        $gender = $_GET["gender"];

    echo "ID : $id<br>";
    echo "Pass : $pass<br>";
    echo "Name : $name<br>";
    echo "Gender : $gender<br>";

    if(isset($_GET["hobby"])) {
        $hobby = $_GET["hobby"];
        for($i = 0; $i < count($hobby); $i++) {
            echo "$hobby[$i] ";
        }
    }
?>
<hr>

<?php
    echo "<h2>POST 방식</h2>";
    $id = "";
    $pass = "";
    if(isset($_POST["id"]))
        $id = $_POST["id"];
    if(isset($_POST["ps"]))
        $pass = $_POST["ps"];

    echo "ID : $id<br>";
    echo "Pass : $pass<br>";
?>