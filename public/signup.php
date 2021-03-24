<?php
session_start();
if (isset($_SESSION['user_role'])) {
    $role = $_SESSION['user_role'];
    if ($role !== 'admin') {
        header("Location:students.php");
        die();
    }
}

$username = $email = $email_taken = $user_taken =$taken = $pass='';

if (isset($_SESSION['emailerror'])) {
    $email = $_SESSION['email'];
    $taken = $_SESSION['emailerror'];
    $email_taken = "<span class='text-danger'> $taken </span>";
}

if (isset($_SESSION['usererror'])) {
    $username = $_SESSION['user'];
    $taken = $_SESSION['usererror'];
    $user_taken = "<span class='text-danger'> $taken </span>";

} else {
    $email_taken = "";
}

if (isset($_SESSION['passerror'])) {
    $taken = $_SESSION['passerror'];
    $pass = "<span class='text-danger' id='message'> $taken </span>";

}

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Sign Up</title>
</head>
<body>
<div class="card mx-auto card-info col-lg-6 col-md-8 col-sm-8 col-xl-4" style="padding: 1px;">
    <div class="card-header" style="padding-top: 5px; padding-bottom: 5px;">
        <h3 class="card-title text-center">Register Account</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="../authentication/signup.php">
        <div class="card-body" style="padding: 10px;">
            <div class="form-group row">
                <label for="email" class="col-form-label col-12"> Enter Email</label><br>
                <div class="col-12">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required
                    value="<?php echo $email; ?>">
                    <?php echo $email_taken; ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="username" class="col-form-label col-12"> Enter UserName</label><br>
                <div class="col-12">
                    <input type="text" class="form-control" id="username" name="username" placeholder="UserName"
                           required value="<?php echo $username; ?>">
                    <?php echo $user_taken; ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-form-label col-12">Enter Password</label>
                <div class="col-12">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                           required onkeyup="check()">
                </div>
            </div>
            <div class="form-group row">
                <label for="password2" class="col-form-label col-12">Repeat Password</label>
                <div class="col-12">
                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Password"
                           required onkeyup="check()">
                    <span id="message"></span>
                    <?php echo $pass; ?>
                </div>
            </div>

            <div class="form-group col">
                <label for="gender" class="col-form-label col-12 float-left font-weight-bold">Role</label>
                <div class="radio">
                    <label><input type="radio" name="role" value="student" onclick="student()"> Student </label>
                    <label><input type="radio" name="role" value="admin" onclick="admin()"> Admin </label>
                </div>
            </div>

            <div class="form-group row" id="admin-verify" style="display: none;">
                <label for="passcode" class="col-form-label col-12">Enter Account Registration Passcode</label>
                <div class="col-12">
                    <input type="number" class="form-control" id="passcode" name="passcode" placeholder="Password">
                </div>
            </div>

        </div>
        <div class="col text-center">
            <button type="submit" class="btn btn-lg btn-secondary col-12" id="submit" style=" margin-bottom: 10px;"
                    name="submit">
                Sign Up
            </button>
        </div>
        <div class="form-group text-center">
            <p>Already Have An Account? <a href="login.php">Login</a></p>
        </div>

    </form>
</div>


<script src="../js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>

</body>
</html>