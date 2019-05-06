<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>It Kinda works</h1>
    <?php
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
    
    $id = $_GET['id'];
    $sql = "SELECT * FROM User WHERE id = $id";  
    if (!$result = $db->query($sql)) {
        // Oh no! The query failed. 
        echo "Sorry, the website is experiencing problems.";

        // Again, do not do this on a public site, but we'll show you how
        // to get the error information
        echo "Error: Our query failed to execute and here is why: \n";
        echo "Query: " . $sql . "\n";
        echo "Errno: " . $db->errno . "\n";
        echo "Error: " . $db->error . "\n";
    }
    // Phew, we made it. We know our MySQL connection and query 
    // succeeded, but do we have a result?
    if ($result->num_rows === 0) {
        // Oh, no rows! Sometimes that's expected and okay, sometimes
        // it is not. You decide. In this case, maybe actor_id was too
        // large? 
        echo "We could not find a match for ID $aid, sorry about that. Please try again.";
        exit;
    }
  
    // Now, we know only one result will exist in this example so let's 
    // fetch it into an associated array where the array's keys are the 
    // table's column names
    $user = $result->fetch_assoc();
    echo $user['name'];


    $mysqli->close();

    ?>
    
</body>
</html>