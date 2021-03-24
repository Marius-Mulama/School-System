<?php
session_start();
include("../connection.php");
include("functions.php");
//$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
$errors = array('email' => '', 'password' => '');
if (isset($_POST['reset'])) {
    if (!empty($_POST['email'])) {
        $email = htmlspecialchars(strip_tags($_POST['email']));
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email must be a valid email address';
        } else {

            try {
                $query = "select id from users where email = '$email' ";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) < 1) {
                    $errors['email'] = "Email Does Not Exist";
                    $_SESSION['reseterror'] = $errors['email'];
                } else {
                    $email = htmlspecialchars(strip_tags($_POST['email']));
                }
            } catch (Exception $ex) {
                print_r($ex);
            }

            $email = htmlspecialchars(strip_tags($_POST['email']));
        }

    } else {
        $errors['email'] = 'Empty email address';
    }

    if (!empty($_POST['password'])) {
        $password = htmlspecialchars(strip_tags($_POST['password']));
        if (!empty($_POST['password2'])) {
            $passwordconfirm = htmlspecialchars(strip_tags($_POST['password2']));

            if (passwordMatch($password, $passwordconfirm)) {
                $encrypted_pass = md5(strval($password));
            } else {
                $errors['password'] = "Passwords Dont Match";
            }
        } else {
            $errors['password'] = "Please confirm Password";
        }
    } else {
        $errors['email'] = 'Empty Password ';
    }

    if (array_filter($errors)) {
        //$_SESSION['user']= $email;
        header("Location: reset.php");
    } else {
        $email = htmlspecialchars(strip_tags($_POST['email']));
        $password = htmlspecialchars(strip_tags($_POST['password']));
        $encrypted_pass = md5(strval($password));

        $query = "UPDATE users SET userpassword='$encrypted_pass' WHERE email='$email'";

        try {
            mysqli_query($conn, $query);
            $_SESSION['reset'] = 'Success';
            header("Location: ../public/login.php");
            die;
        } catch (Exception $ex) {
            echo "Connection Error";
        }

    }
}


/*if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();*/