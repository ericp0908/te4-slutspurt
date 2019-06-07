<?php
require_once("../../db.php");

function createPost($payload){
  
    if($payload != NULL && isset($payload->title) && isset($payload->content)){
        $date = date("Y/m/d");
        $sql = "INSERT INTO Post (title, date, content) VALUES('$payload->title','$date', '$payload->content')";
        $result = db_execute($sql);      
    }else{
        http_response_code (400);
    }
} 

function listPost(){
    $sql = "SELECT * FROM Post";
    $result = db_execute("$sql");
    $posts = $result->fetch_assoc();
    $arr = array();
    while($posts != null){
        array_push($arr,$posts);
        $posts = $result->fetch_assoc();
    }
    return ($jsonarr = json_encode($arr));
}

function showOne($id){
    $sql = "SELECT * FROM Post WHERE id = $id";
    $result = db_execute($sql);
    $post = $result->fetch_assoc();
    $arr = json_encode($post);
    return $arr;
}

function delPost($payload){
    if($payload != NULL ){
        $sql = "DELETE FROM Post WHERE id = $payload";
        $result = db_execute("$sql");
    }
    else{
        echo "it doesnt work";
    }
}

function updatePost($id, $payload){
    if($payload != NULL && isset($id)){
        $sql = "UPDATE Post SET title = '$payload->title', content = '$payload->content' WHERE id = $id";
        $result = db_execute("$sql"); 
    }
    else{
        echo "it doesnt work";
    }
}

?>
