<?php
session_start();

include 'connect.php';
$connect = getDBConnection();

$score = $_GET['score'];

$sql= "INSERT INTO scores (username, score) VALUES (:username, :score)";
$data= array(":username" => $_SESSION['username'], ":score"=> $score);

$stmt=$connect->prepare($sql);
$stmt->execute($data);

echo $score;
//Adding new score to database

//Retrieving total times quiz has been submitted and average score for this user

//Encoding data using JSON

?>