<?php
    echo "<h2>GET 방식</h2>";
    $id = "";
    $pass = "";
    if(isset($_GET["id"]))
        $id = $_GET["id"];
    if(isset($_GET["pass"]))
        $pass = $_GET["pass"];

    echo "ID : $id<br>";
    echo "Pass : $pass<br>";
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