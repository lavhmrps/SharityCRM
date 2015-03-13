<?php
/*Finn ut av hva dette gjør*/
ob_start();

include '../phpBackend/connect.php';

if (isset($_POST['combination'])) {
    $json = $_POST['combination'];
    $combination = json_decode($json, true);



    $organizationNr = $combination['organizationNr'];
    $password = $combination['password'];
    
    $sql = "SELECT * FROM Organization WHERE organizationNr = '$organizationNr'";
    $result = mysqli_query($connection, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $dbpassword = $row['password'];

        if($password == $dbpassword) {
            session_start();
            $_SESSION['organizationNr'] = $organizationNr;
            echo "OK";    
        } else {
           echo "WRONG";
       }
   }else{
    echo "NULL";
}
}



    //login check 4 admin
if (isset($_POST['adminCombination'])) {
    $jsonAdmin = $_POST['adminCombination'];
    $adminCombination = json_decode($jsonAdmin, true);



    $username = $adminCombination['username'];
    $password = $adminCombination['password'];
    
    $sql = "SELECT * FROM Admin WHERE username = '$username'";
    $result = mysqli_query($connection, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $dbpassword = $row['password'];

        if ($dbpassword == $password) {
            session_start();

                //$_SESSION['name'] = $row['name'];
            
            $_SESSION['username'] = $username;
                //$_SESSION['backgroundimgURL'] = $row['backgroundimgURL'];
                //$_SESSION['password'] = $password; //skal dette være her? Er det safe at password lagres i session?
            echo "OK";

            
        } 
    }else {
       echo "WRONG";
   }
}


ob_end_flush();
?>