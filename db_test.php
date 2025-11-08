<?php
$servername="mydb.itap.purdue.edu";
$username="kuo104";
$password="Lunchbox987";
$database="kuo104";

$conn=new mysqli($servername,$username,$password,$database);
if($conn->connect_error){
    die("DB connect failed: ".$conn->connect_error);
}
echo "✅ DB connected!";
$conn->close();
?>

