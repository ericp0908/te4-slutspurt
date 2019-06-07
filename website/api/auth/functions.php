<?php
require_once("../../db.php");

function login($payload){
    session_start();
    $uName = $payload->username;
    $pWord = $payload->password;

    $sql = "SELECT * FROM User WHERE name = '$uName'";
    $result = db_execute($sql);
    $user = $result->fetch_assoc();
    
    if(password_verify($pWord, $user['password'])){
        echo json_encode($user);
        $_SESSION["user_id"] = $user['id'];
    }else{
        echo "Invalid Credentials";
    }
}

function currentUser(){
    session_start();
    return $_SESSION["user_id"];
}






?>