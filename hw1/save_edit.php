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
    // echo "</pre>";

    $empno=$_POST['empno'];
    $emp_name=$_POST['emp_name'];
    $emp_email=$_POST['emp_email'];
    $emp_prefix = $_POST['emp_prefix'];
    $emp_gender = $_POST['emp_gender'];
    $emp_birthdate = $_POST['emp_birthdate'];
    $emp_salary = $_POST['emp_salary'];
    $sql = "UPDATE 
                emp
            SET
                emp_name = ?,
                emp_email = ?,
                emp_prefix = ?, 
                emp_gender = ?, 
                emp_birthdate = ?, 
                emp_salary = ?
            WHERE empno = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sssssss", $emp_name, $emp_email, $emp_prefix, $emp_gender, $emp_birthdate, $emp_salary, $empno);
    $stmt->execute();
    // echo $stmt->affected_rows . " row inserted.";
header("location:emplist.php");
?>