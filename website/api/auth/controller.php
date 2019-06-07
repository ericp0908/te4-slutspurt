<?php
require("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $content = file_get_contents("php://input");
    $payload = json_decode($content);
    login($payload);    
}
else if($_SERVER['REQUEST_METHOD'] == "DELETE"){
    echo "it works";
    logout();
}
else if($_SERVER['REQUEST_METHOD'] == "GET"){
    echo currentUser();
}
?>

