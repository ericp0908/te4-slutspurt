<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Coronet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <title>Coronet</title>
</head>
<body>
    <?php require_once("db.php") ?>
    <div class="main">
        
        <div class="logo">
    
            <img src="pictures/coronet_logo.png" alt="logo" id="logo">
            
        
        </div>

        <div class="nav_bar">
            <a href="./newpost.php" id="bttn">New Post</a>
            <button type="button" id="bttn">Gallery</button>
            <button type="button" id="bttn">About</button>
            <button type="button" id="bttn">Contact</button>
        </div>
        <div class="body">
        <center>


        <form action="/addPost.php" method="post">
                <h2>Title:</h2> 
                <input type="text" id="title" name="title" size="20">
                <br>
                <br>
                <h2>Content:</h2> 
                <textarea id="content" name="content" ></textarea></textarea>
                <br>
                <br>
                <input type="submit" value="Post" id="bttn">
        </form>



        </center>
        </div>
                
       

    </div>


</body>
</html>

