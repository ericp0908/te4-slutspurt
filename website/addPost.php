<?php require_once("db.php"); 
    session_start();
    if(isset($_SESSION['user_id'])){


    $date = date("Y/m/d");
    $sql = "INSERT INTO Post (title, date, content, user_id) VALUES('$_POST[title]','$date', '$_POST[content]', $_SESSION[user_id])";
    $result = db_execute($sql); 
    //echo(var_dump($result)); If using echo, i doesnt work
    header("Location: /index.php", true, 303);
    die();
    }
?>