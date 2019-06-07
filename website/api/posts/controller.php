<?php
require("functions.php");


if($_SERVER['REQUEST_METHOD'] == "POST" && !isset($_GET['id'])){ //CREATE
    if(isset($_SESSION["user_id"])){
        $content = file_get_contents("php://input");
        $payload = json_decode($content);
        createPost($payload);
    }else{
        http_response_code (401);
    }
    
}
else if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET["id"])){ //SHOW'
    $id = $_GET["id"];
    echo showOne($id);
}
else if($_SERVER['REQUEST_METHOD'] == "GET"){ //LIST
    echo listPost();
    
    
}
else if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_GET["id"])){ //DELPOST
    if(isset($_SESSION["user_id"])){
        $payload = $_GET["id"]; 
        delPost($payload);
    }else{
        http_response_code (401);
    }
}
if($_SERVER['REQUEST_METHOD'] == "PATCH" && isset($_GET['id'])){ //UPDATE
    if(isset($_SESSION["user_id"])){
        $content = file_get_contents("php://input");
        $payload = json_decode($content);
        $id = $_GET['id'];
        updatePost($id, $payload);
    }else{
        http_response_code (401);
    }
}
?>