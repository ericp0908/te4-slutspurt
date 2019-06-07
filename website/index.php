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
            <a href="./newpost.php" id="bttn">Post</a>
            <button type="button" id="bttn">Gallery</button>
            <button type="button" id="bttn">About</button>
            <button type="button" id="bttn">Contact</button>
        </div>
        <div class="body">
        <center>
            <?php
            session_start();
            
            
            if(isset($_SESSION['user_id'])){
                $id = $_SESSION['user_id'];
                $result = db_execute("SELECT * FROM User WHERE id = $id");
                // Now, we know only one result will exist in this example so let's 
                // fetch it into an associated array where the array's keys are the 
                // table's column names
                $user = $result->fetch_assoc();

                echo "Id: ".$id."<br>";
                echo "Logged in as ".$user['name']."<br>";
              
                
            } 
            else{
                echo "Not Logged in <br>";   
                readfile('./login_form.php');
            }
            ?>

            <?php
            if(isset($_SESSION['user_id'])){
            $posts = "SELECT * FROM Post WHERE user_id = $id ORDER BY id DESC";  
            $result = db_execute($posts);
            $posts = $result->fetch_all();
            foreach($posts as $post) {
                echo "<hr> Title: <h1>".$post[3]."</h1>";
                echo "Content: <h3>".$post[2]."</h3>";
                
                
            }
        }
        else if(isset($_SESSION['error'])) {
            echo $_SESSION['error'];
            $_SESSION['error'] = [];
        }
        unset($_SESSION['error']);

        
            ?>
        
        
       
        

        <div class="weatherThing">
                <div class="locationIcon">
                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                    <path fill="#000000" d="M15,12H16.5V16.25L19.36,17.94L18.61,19.16L15,17V12M23,16A7,7 0 0,1 16,23C13,23 10.4,21.08 9.42,18.4L8,17.9L2.66,19.97L2.5,20A0.5,0.5 0 0,1 2,19.5V4.38C2,4.15 2.15,3.97 2.36,3.9L8,2L14,4.1L19.34,2H19.5A0.5,0.5 0 0,1 20,2.5V10.25C21.81,11.5 23,13.62 23,16M9,16C9,12.83 11.11,10.15 14,9.29V6.11L8,4V15.89L9,16.24C9,16.16 9,16.08 9,16M16,11A5,5 0 0,0 11,16A5,5 0 0,0 16,21A5,5 0 0,0 21,16A5,5 0 0,0 16,11Z" />
                    </svg>
                </div>
            <div class="Location">

            </div>
                <div class="timeIcon">
                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                    <path fill="#000000" d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M16.2,16.2L11,13V7H12.5V12.2L17,14.9L16.2,16.2Z" />
                    </svg>
                </div>
            <div class="TimeAndDate">
            
            </div>
            <div class="TempIcon">
                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                <path fill="#000000" d="M17,17A5,5 0 0,1 12,22A5,5 0 0,1 7,17C7,15.36 7.79,13.91 9,13V5A3,3 0 0,1 12,2A3,3 0 0,1 15,5V13C16.21,13.91 17,15.36 17,17M11,8V14.17C9.83,14.58 9,15.69 9,17A3,3 0 0,0 12,20A3,3 0 0,0 15,17C15,15.69 14.17,14.58 13,14.17V8H11Z" />
                </svg>
            </div>
            <div class="Temp">
               

            </div>

             <div class="weatherIcon">
                <svg style="width:24px;height:24px" viewBox="0 0 24 24" class="cloudIcon">
                <path fill="#000000" d="M6,19A5,5 0 0,1 1,14A5,5 0 0,1 6,9C7,6.65 9.3,5 12,5C15.43,5 18.24,7.66 18.5,11.03L19,11A4,4 0 0,1 23,15A4,4 0 0,1 19,19H6M19,13H17V12A5,5 0 0,0 12,7C9.5,7 7.45,8.82 7.06,11.19C6.73,11.07 6.37,11 6,11A3,3 0 0,0 3,14A3,3 0 0,0 6,17H19A2,2 0 0,0 21,15A2,2 0 0,0 19,13Z" />
                </svg>
                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                <path fill="#000000" d="M12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9M12,2L14.39,5.42C13.65,5.15 12.84,5 12,5C11.16,5 10.35,5.15 9.61,5.42L12,2M3.34,7L7.5,6.65C6.9,7.16 6.36,7.78 5.94,8.5C5.5,9.24 5.25,10 5.11,10.79L3.34,7M3.36,17L5.12,13.23C5.26,14 5.53,14.78 5.95,15.5C6.37,16.24 6.91,16.86 7.5,17.37L3.36,17M20.65,7L18.88,10.79C18.74,10 18.47,9.23 18.05,8.5C17.63,7.78 17.1,7.15 16.5,6.64L20.65,7M20.64,17L16.5,17.36C17.09,16.85 17.62,16.22 18.04,15.5C18.46,14.77 18.73,14 18.87,13.21L20.64,17M12,22L9.59,18.56C10.33,18.83 11.14,19 12,19C12.82,19 13.63,18.83 14.37,18.56L12,22Z" />
                </svg>
            </div>

            <div class="weather">
            </div>

            <div class="rainIcon">
                <svg style="width:24px;height:24px" viewBox="0 0 24 24" class="rainIcon">
                <path fill="#000000" d="M9,12C9.53,12.14 9.85,12.69 9.71,13.22L8.41,18.05C8.27,18.59 7.72,18.9 7.19,18.76C6.65,18.62 6.34,18.07 6.5,17.54L7.78,12.71C7.92,12.17 8.47,11.86 9,12M13,12C13.53,12.14 13.85,12.69 13.71,13.22L11.64,20.95C11.5,21.5 10.95,21.8 10.41,21.66C9.88,21.5 9.56,20.97 9.7,20.43L11.78,12.71C11.92,12.17 12.47,11.86 13,12M17,12C17.53,12.14 17.85,12.69 17.71,13.22L16.41,18.05C16.27,18.59 15.72,18.9 15.19,18.76C14.65,18.62 14.34,18.07 14.5,17.54L15.78,12.71C15.92,12.17 16.47,11.86 17,12M17,10V9A5,5 0 0,0 12,4C9.5,4 7.45,5.82 7.06,8.19C6.73,8.07 6.37,8 6,8A3,3 0 0,0 3,11C3,12.11 3.6,13.08 4.5,13.6V13.59C5,13.87 5.14,14.5 4.87,14.96C4.59,15.43 4,15.6 3.5,15.32V15.33C2,14.47 1,12.85 1,11A5,5 0 0,1 6,6C7,3.65 9.3,2 12,2C15.43,2 18.24,4.66 18.5,8.03L19,8A4,4 0 0,1 23,12C23,13.5 22.2,14.77 21,15.46V15.46C20.5,15.73 19.91,15.57 19.63,15.09C19.36,14.61 19.5,14 20,13.72V13.73C20.6,13.39 21,12.74 21,12A2,2 0 0,0 19,10H17Z" />
                </svg>
            </div>
            <div class="rain">  
            </div>
            



            
            
        </div>
        </center>
       <form action="/clear.php">
       <input type="submit" value="Logout"></form>

       

    </div>

<script src="weather.js"></script>
<script src="jquery.js"></script>

</body>
</html>

