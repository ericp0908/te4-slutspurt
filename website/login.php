<?php
            if ( isset($_POST['name'])  && isset($_POST['password']) && !empty($_POST['name'] ) && !empty($_POST['password']) ) {
            }
            DEFINE('DB_USERNAME', 'root');
            DEFINE('DB_PASSWORD', 'root');
            DEFINE('DB_HOST', 'localhost');
            DEFINE('DB_DATABASE', 'Coronet');
        
            $db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
            if ($db->connect_errno) {
                // The connection failed. What do you want to do? 
                // You could contact yourself (email?), log the error, show a nice page, etc.
                // You do not want to reveal sensitive information
            
                // Let's try this:
                echo "Sorry, this website is experiencing problems.";
            
                // Something you should not do on a public site, but this example will show you
                // anyways, is print out MySQL error related information -- you might log this
                echo "Error: Failed to make a MySQL connection, here is why: \n";
                echo "Errno: " . $db->connect_errno . "\n";
                echo "Error: " . $db->connect_error . "\n";
                
                // You might want to show them something nice, but we will simply exit
                exit;
            }
            
            $name = $_POST['name'];
            $sql = "SELECT * FROM User WHERE name = '$name'";  
            if (!$result = $db->query($sql)) {
                // Oh no! The query failed. 
                echo "Sorry, the website is experiencing problems. Is broken";
        
                // Again, do not do this on a public site, but we'll show you how
                // to get the error information
                echo "Error: Our query failed to execute and here is why:<br>";
                echo "Query: " . $sql . "<br>";
                echo "Errno: " . $db->errno . "<br>";
                echo "Error: " . $db->error . "<br>";
            }
            // Phew, we made it. We know our MySQL connection and query 
            // succeeded, but do we have a result?
            if ($result->num_rows === 0) {
                // Oh, no rows! Sometimes that's expected and okay, sometimes
                // it is not. You decide. In this case, maybe actor_id was too
                // large? 
                header("Location: /index.php", true, 303);
                // echo "We could not find a match for ID $aid, sorry about that. Please try again.";
                exit;
            }
          
            // Now, we know only one result will exist in this example so let's 
            // fetch it into an associated array where the array's keys are the 
            // table's column names
            $user = $result->fetch_assoc();
            
        
            //kontrollera password
            if($user['password'] === $_POST['password']){
                setcookie("user_id", $user['id']);
            }
                header("Location: /index.php", true, 303);
                die();
            $mysqli->close();
        ?>