<?php
session_start();

include("../connection.php");
include("functions.php");

if (isset($_POST['signin'])) {
    $user_email = htmlspecialchars(strip_tags($_POST['email']));
    $password = htmlspecialchars(strip_tags($_POST['password']));

    if (!empty($user_email) and !empty($password)) {
        //read from database
        $query = "select * from users where email = '$user_email' limit 1";

        $result = mysqli_query($conn, $query);
        //print_r($result);

        if ($result and mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            if ($user_data["userpassword"] === md5($password)) {
                $_SESSION['user_role'] = $user_data["role"];
                $_SESSION['email'] = $user_data['email'];
                if ($_SESSION['user_role'] === 'admin') {
                    header("Location: ../public/admin.php");
                } else{
                    header("Location: ../public/students.php");
                }
            } else {
                invalid_login_alert();
            }
        } else {

        }

    }
}
