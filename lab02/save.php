<meta charset="UTF-8">
<?php
    // connect database 
    $db_host = "localhost";
    $db_user = "s61160229";
    $db_password = "noo0912213923";
    $db_name = "s61160229";

    $mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);
    $mysqli->set_charset("utf8");

//    echo "<pre>";
//     print_r($_POST);
//     echo"</pre>";
    $empno = $_POST['empno'];
    $emp_name = $_POST['name'];
    $emp_email = $_POST['email'];
    $emp_passwd = md5($_POST['password']);
    $sql = "INSERT 
    INTO emp (empno, emp_name, emp_email, emp_passwd) 
    VALUES (?, ?, ?, ?)";
    
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ssss", $empno, $emp_name, $emp_email, $emp_passwd);
$stmt->execute();
// echo $stmt->affected_rows . " row inserted.";
header("location: emplist.php");
?>