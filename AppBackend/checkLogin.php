<?php

if(isset($_POST['userLoginApp'])){
    $json = $_POST['userLoginApp'];
    $userLoginApp = json_decode($json, true);

    $username = $userLoginApp['email'];
    $password = $userLoginApp['password'];

    $sql = "SELECT password FROM User WHERE email = '$username'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $dbpassword = $row['password'];

        if ($dbpassword == $password) {
            echo "OK";
            return "OK";
            
        } 
    }else {
     echo "WRONG";
     return "WRONG";
 }


}

?>