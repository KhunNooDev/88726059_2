<html>
<head>
    <meta charset="UTF-8">
    <style>
    body {
        font-family: 'Alegreya';
        font-size: 16px;
        background-color: #000000;
        color: #FFFFFF;
    }
    </style>
</head>
<body>
    <h2>Emp Edit</h2> 
    <?php
    // connect database 
    $db_host = "localhost";
    $db_user = "s61160229";
    $db_password = "noo0912213923";
    $db_name = "s61160229";

    $mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);
    $mysqli->set_charset("utf8");

    // check connection error 
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ")" . $mysqli->connect_error;
    } else {
        // connect success, do nothing
    }

    // get empno from query string
    $empno = $_GET['empno'];
    
    // Executes a prepared Query
    $sql = "SELECT *
            FROM emp
            WHERE empno = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $empno);
    $stmt->execute();
    
    // Gets a result set from a prepared statement
    $result = $stmt->get_result();

    if (!result) {
            echo ("Error: ". $mysqli->error);
    } else {
        // fetch a row from result set
        $row = $result->fetch_object();
    ?>
    <!-- put values back to form -->
    <form action="save_edit.php" method="post">
        Emp No : <?php echo $row->empno;?>
        <input type="hidden" name="empno"
                    value="<?php echo $row->empno;?>">
        <br />
        Name : 
        <select name="emp_prefix">
            <option value="นาย" <?php echo $row->emp_prefix=="นาย"?"selected":"";?>>นาย</option>
            <option value="นางสาว" <?php echo $row->emp_prefix=="นางสาว"?"selected":"";?>>นางสาว</option>
            <option value="นาง" <?php echo $row->emp_prefix=="นาง"?"selected":"";?>>นาง</option>
        </select>
        <input type="text" name="emp_name" maxlength="50"
                    value="<?php echo $row->emp_name;?>">
        <br />
        Gender :
                <input type="radio" name="emp_gender" value="M" <?php echo $row->emp_gender=="M"?"checked":"";?>> Male
                <input type="radio" name="emp_gender" value="F" <?php echo $row->emp_gender=="F"?"checked":"";?>> Female
        <br />
        Birthday : <input type="date" name="emp_birthdate" value="<?php echo $row->emp_birthdate;?>">
        <br />
        Email : <input type="email" name="emp_email" maxlength="50"
                    value="<?php echo $row->emp_email;?>">
        <br />
        Salary : <input type="text" name="emp_salary" maxlength="7" value="<?php echo $row->emp_salary;?>">
        <p>
            <input type="submit" value="Update">
        </p>
    </form>
    <?php
    }
    ?>
</body>
</html>