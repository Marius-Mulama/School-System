<?php
session_start();
if (isset($_SESSION['user_role'])) {
    $role = $_SESSION['user_role'];
    if ($role !== 'student') {
        header("Location:admin.php");
        die();
    }
} else {
    header("Location:login.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Students</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../index.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="students.php">Student Area <span class="sr-only">(current)</span></a>
            </li>
        </ul>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item navbar-toggler-right" style="cursor: pointer;">
                <a class="nav-link avatar dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown">
                    <img src="../images/avatar.webp" height="40" class="rounded-circle z-depth-0" alt="avatar">
                </a>
                <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary">
                    <a class="dropdown-item" href="logout.php">Logout</a>
                    <a class="dropdown-item" href="reset.php">Reset</a>
                </div>
            </li>
        </ul>

    </div>
</nav>

<h1>Students Area</h1>
<?php
require '../connection.php';
?>
<div>
    <form action="../connection.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $id; ?>">
        <div class="form-group">
            <input type="text" name="studentName" id="studentName" class="form-control" placeholder="student Name"
                   value="<?php echo $name ?>" required="">
            <span><?php echo $nameErr ?></span>
        </div>
        <div class="form-group">
            <input type="email" name="studentEmail" id="studentEmail" class="form-control" placeholder="Email"
                   value="<?php echo $email ?>" required="">

        </div>
        <div class="form-group">
            <input type="text" name="studentPhone" id="phone" class="form-control" placeholder="Enter Phone Number"
                   value="<?php echo $phone ?>" required="">

        </div>
        <div class="form-group">
            <select name="studentGender" class="form-control" required="">
                <option value="<?php echo $gender ?>"><?php echo $gender ?></option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

        </div>
        <div class="form-group">
            <input type="number" name="studentAge" id="studentAge" class="form-control" placeholder="Age"
                   value="<?php echo $age ?>" required="">


        </div>

        <div class="form-group">
            <label for="profileImage" style="padding: 10px;">Upload Student Image</label>
            <input type="file" name="studentImage" id="studentImage" value="<?php echo $studentImage ?>"
                   class="form-control">
        </div>


        <?php
        if ($update == true):
            ?>
            <div class="form-group">
                <input type="submit" name="update" id="update" class="btn btn-warning" value="Update Student Details">
            </div>
        <?php
        else:
            ?>
            <div class="form-group">
                <input type="submit" name="save" id="save" class="btn btn-success" value="Upload Student Details">
            </div>
        <?php
        endif;
        ?>
    </form>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>

</body>


</html>
