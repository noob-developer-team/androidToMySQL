<?php
    include_once("Connectionmysqli.php");
    if($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        if(isset($_GET['username']) && isset($_GET['password']))
        {
            
            $username = $_GET['username'];
            $password = $_GET['password'];
            $query = "SELECT id, name FROM user where name = '$username' and password = '$password'";
            if ($result=mysqli_query($conn,$query))
            {
                if (mysqli_num_rows($result)>0){
                    // echo "success";
                    $json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
                    echo json_encode($json);
                } else {
                    // echo "failed";
                    $response['error'] = true; 
                    $response['message'] = 'There is no result';
                    echo json_encode($response);
                }
            }
            else
            {
                // echo "failed";
                $response['error'] = true; 
                $response['message'] = 'Invalid username or password';
                echo json_encode($response);
            }
        }
        mysqli_close($conn); 
    }
?>