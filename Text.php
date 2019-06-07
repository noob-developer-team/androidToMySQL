<?php
    include_once("Connectionmysqli.php");
    if($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        echo "GET";
    }
    else if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST['username']) && isset($_POST['password']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $query = "SELECT * FROM userlogin where name = '$username' and password = '$password'";
            $result = mysqli_query($conn, $query);
            $finalResult = mysqli_num_rows($result);
            if($finalResult > 0 ){
                echo "success_login";
                exit;
            }else{
                echo "Incorrect_log";
                exit;
            }
        }
    }
?>