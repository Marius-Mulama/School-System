<?php
include "connection.php";

function alreadyRegistered($mail){
    $query = "select * from users where email = '$mail' ";

    if (!empty($conn)) {
        $result = mysqli_query($conn,$query);

        if($result and mysqli_num_rows($result) >0 ){
            return true;
        }else{
            return false;
        }
    }

}

function usernameTaken($user){
    $query = "select * from users where username = '$user' ";
    if (!empty($conn)) {
        $result = mysqli_query($conn,$query);
        if($result and mysqli_num_rows($result) >0 ){
            return true;
        }else{
            return false;
        }
    }

}

function passwordMatch($pass1, $pass2){
    if($pass1 === $pass2){
        return true;
    }else{
        return false;
    }
}

function checkAdminCode($code){
    $admincode= 1234;
    if($code === $admincode){
        return  true;
    }else{
        return false;
    }
}

function invalid_login_alert() {

    // Display the alert box; note the Js tags within echo, it performs the magic
    echo "<script>alert('Invalid Login Credentials');</script>";
}