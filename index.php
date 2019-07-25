<?php
require_once("connection.php");

$db = new connection("localhost", "3305", "androidfinal", "root", "");

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if ($_GET['url'] == "user")
    {
        echo json_encode($db->query("SELECT * FROM userlogin"));
    }else if ($_GET['url'] == "findStudent")
    {
        $username = $_REQUEST['username'];
        echo json_encode($db->query("SELECT * FROM studentinfo where name = '$username'"));
    }
    else if ($_GET['url'] == "findAllStudent")
    {
        echo json_encode($db->query("SELECT * FROM studentinfo"));
    }
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if($_GET['url'] == 'Login')
    {
        if(isset($_REQUEST['username']) && isset($_REQUEST['password']))
        {
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];
            $query = "SELECT * FROM userlogin where name = '$username' and password = '$password'";
            $result = $db->query($query);
            $row=0;
            while($row<count($result))
            {
                $row++;
            }
            if($row = 1){
                echo "Success";
                exit;
            }else{
                echo "Incorrect_log";
                exit;
            }
        }
    }
    if($_GET['url'] == 'student')
    {
        if(isset($_REQUEST['name']))
        {
            $username = $_REQUEST['name'];
            $query = "SELECT * FROM studentinfo where name = '$username'";
            $result = $db->query($query);
            $row=0;
            while($row<count($result))
            {
                $row++;
            }
            if($row = 1){
                echo "Success";
                exit;
            }else{
                echo "Incorrect_log";
                exit;
            }
        }
    }
} else {
        http_response_code(405);
}
?>
