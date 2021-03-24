<?php
session_start();

$conn = null;
include("../connection.php");
include("functions.php");


$email = $username = $password = $passwordconfirm = $encrypted_pass = $role = '';
$role = 'student';
$errors = array('email' => '', 'username' => '', 'registered' => '', 'password' => '', 'role' => '');

if (isset($_POST['submit'])) {

    if (!empty($_POST['email'])) {
        $email = htmlspecialchars(strip_tags($_POST['email']));
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email must be a valid email address';
        } else {

            try {
                $query = "select id from users where email = '$email' ";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    $errors['email'] = "Email Already in use";
                } else {
                    $email = htmlspecialchars(strip_tags($_POST['email']));
                }
            } catch (Exception $ex) {
                print_r($ex);
            }
        }

    } else {
        $errors['email'] = 'Empty email address';
    }

    if (!empty($_POST['username'])) {
        $username = strtolower(htmlspecialchars(strip_tags($_POST['username'])));

            try {
                $query = "select id from users where username = '$username' ";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                    $errors['username'] = 'Username Taken';
                } else {
                    $username = strtolower(htmlspecialchars(strip_tags($_POST['username'])));

                }

            } catch (Exception $ex) {
                print_r($ex);
            }
            $username = strtolower(htmlspecialchars(strip_tags($_POST['username'])));
        }

    } else {
        $errors['username'] = 'Empty User Name';
    }
    if (!empty($_POST['password'])) {
        $password = htmlspecialchars(strip_tags($_POST['password']));
        if (!empty($_POST['password2'])) {
            $passwordconfirm = htmlspecialchars(strip_tags($_POST['password2']));

            if (passwordMatch($password, $passwordconfirm)) {
                $encrypted_pass = md5(strval($password));
            } else {
                $errors['password'] = "Passwords Did Not Match";
            }
        } else {
            $errors['password'] = "Please confirm Password";
        }
    } else {
        $errors['email'] = 'Empty Password';
    }

    if (!empty($_POST['role'])) {
        $role = htmlspecialchars(strip_tags($_POST['role']));
        if (!empty($_POST['passcode'])) {
            $code = htmlspecialchars(strip_tags($_POST['passcode']));
            $code = (int)$code;
            if (checkAdminCode((int)$code)) {
                $role = "admin";
            } else {
                $role = "student";
            }
        } else {
            $role = "student";
        }
    } else {
        $errors['role'] = "select role";
    }

    if (array_filter($errors)) {
        echo "Invalid";
        $_SESSION['usererror'] = $errors['username'];
        $_SESSION['emailerror'] = $errors['email'];
        $_SESSION['passerror'] = $errors['password'];

        $_SESSION['user'] = $username;
        $_SESSION['email'] = $email;

        print_r($errors);
        header("Location: ../public/signup.php");
    } else {
        $email = htmlspecialchars(strip_tags($_POST['email']));
        $username = strtolower(htmlspecialchars(strip_tags($_POST['username'])));
        $password = htmlspecialchars(strip_tags($_POST['password']));
        $encrypted_pass = md5(strval($password));

        $query = "insert into users(username, email, userpassword, role) values ('$username', '$email', '$encrypted_pass','$role')";

        try {
            mysqli_query($conn, $query);
            echo "<script>alert('Registration Successful')</script>";
            header("Location: ../public/login.php");
            die;
        } catch (Exception $ex) {
            echo "Connection Error";
        }


}
