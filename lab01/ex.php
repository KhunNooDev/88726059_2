<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link href='https://fonts.googleapis.com/css?family=Alegreya' rel='stylesheet'>
    <style>
    body {
        font-family: 'Alegreya';
        font-size: 16px;
    }
    </style>
</head>

<body>
    <?php
    // connect database 
    $db_host = "localhost";
    $db_user = "wittawas";
    $db_password = "witty1234";
    $db_name = "wittawas";

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
            FROM actor
            ORDER BY 1 DESC
            LIMIT 0, $limit";
    $result = $mysqli->query($sql);

    if (!result) {
            echo ("Error: ". $mysqli->error);
    } else {
        while($row = $result->fetch_object()){ 
                echo "<div>";
                echo "$row->actor_id, $row->first_name, $row->last_name, $row->last_update";
                echo "</div>";
            } 
    }
    ?>
    <hr />
    <?php 
    // insert a record by prepare and bind
    // The argument may be one of four types:
    //  i - integer
    //  d - double
    //  s - string
    //  b - BLOB
    $sql = "INSERT 
            INTO actor (first_name, last_name) 
            VALUES (?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $firstname, $lastname);
    $firstname = "เธงเธดเธ—เธงเธฑเธช";
    $lastname = "เธเธฑเธเธเธธเธกเธเธดเธเธ”เธฒ";
    $stmt->execute();
    echo $stmt->affected_rows . " row inserted, ", "last insert id is $mysqli->insert_id.<br/>";

    // delete a record by prepare and bind
    $sql = "DELETE 
            FROM actor 
            WHERE actor_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $row_id);
    $row_id = $mysqli->insert_id;
    $stmt->execute();
    echo $mysqli->affected_rows. " row deleted.<br/>";

    // update a record
    $sql = "UPDATE actor 
            SET first_name = ?, 
                last_name = ? 
            WHERE actor_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssi", $firstname, $lastname, $row_id);
    $firstname = "Wittawas";
    $lastname = "Puntumchinda";
    $row_id = 215;
    $stmt->execute();
    echo $stmt->affected_rows . " row inserted.<br/>";
    ?>
    <hr>
</body>