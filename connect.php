<?php

function getDBConnection() {
    
    // //C9 db info
    $host = "localhost";
    $dbName = "csumb_quiz";
    $username = getenv("C9_USER");
    $password = "";
    
    // $host ="us-cdbr-iron-east-04.cleardb.net";
    // $dbname = "heroku_fbd4b4d55effd90";
    // $username = "b82d7117e10da5";
    // $password = "89053b12";
    
    
    //when connecting from Heroku
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $host = $url["host"];
        $dbName = substr($url["path"], 1);
        $username = $url["user"];
        $password = $url["pass"];
    } 
    
    try {
        //Creates a database connection
        $dbConn = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
    
        // Setting Errorhandling to Exception
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }
    catch (PDOException $e) {
       echo "Problems connecting to database!";
       exit();
    }
    
    
    return $dbConn;
}

?>