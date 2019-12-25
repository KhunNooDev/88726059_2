<meta charset="UTF-8">
<?php
    // connect database 
    $db_host = "localhost";
    $db_user = "s61160229";
    $db_password = "noo0912213923";
    $db_name = "s61160229";

    $mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);
    $mysqli->set_charset("utf8");

    // echo "<pre>";
    // print_r($_POST);
    // echo"</pre>";
    $empno = $_GET['empno'];
    $sql = "DELETE
        FROM emp
        WHERE empno = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $empno);
    $stmt->execute();
// echo $stmt->affected_rows . " row inserted.";
header("location: emplist.php");
?>