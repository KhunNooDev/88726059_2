<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link href='https://fonts.googleapis.com/css?family=Alegreya' rel='stylesheet'>
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
    <h1>New Emp [<a href="newemp.html">+</a>]</h1>
   
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
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    } else {
        // connect success, do nothing
    }

    // select data from tables
    $limit = ($_GET['limit']<>"")? $_GET['limit'] : 10;
    $sql = "SELECT *
            FROM emp
            ORDER BY 1
            LIMIT 0, $limit";
    $result = $mysqli->query($sql);

    if (!result) {
            echo ("Error: ". $mysqli->error);
    } else {
        $html = "<table border='1'>";
        $html.= "<tr>";
        $html.= "<th>Emp no</th>";
        $html.= "<th>Name</th>";
        $html.= "<th>Email</th>";
        $html.= "</tr>";
        while($row = $result->fetch_object()){ 
            $html.= "<tr>";
            $html.= "<td>$row->empno</td>";
            $html.= "<td>$row->emp_name</td>";
            $html.= "<td>$row->emp_email</td>";
            $html.= "</tr>";
            }
            $html.= "</table>";
            echo $html;
    }
    ?>
</body>
</html>
