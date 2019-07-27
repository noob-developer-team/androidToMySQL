<?php
require_once("Connectionmysqli.php");
if ($_SERVER['REQUEST_METHOD'] =='POST'){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pid = $_POST['pid'];
    $sql = "INSERT INTO userlogin (Name,Password,PID) VALUES ('$username', '$password', '$pid')";
    if(mysqli_query($conn,$sql)){
        echo "Success signup";
    }else{
        echo "Could not signup";
    }
    
}else{
    echo 'error';
}

?>