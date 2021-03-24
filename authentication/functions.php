<?php

global $conn;
include "../connection.php";

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