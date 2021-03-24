<?php
$role = '';
session_start();
if (isset($_SESSION['user_role'])) {
    $role = $_SESSION['user_role'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Index</title>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <?php
                if ($role !== 'student' and $role !== '') {
                    echo "<a class='nav-link active' href='public/students.php' hidden>Students Area</a>";
                } else {
                    echo "<a class='nav-link active' href='public/students.php'>Students Area</a>";
                }
                ?>
            </li>
            <li class="nav-item">
                <?php
                if ($role != 'admin' and $role !== '') {
                    echo "<a class='nav-link active' href='public/admin.php' hidden>Admin Area</a>";
                } else {
                    echo "<a class='nav-link active' href='public/admin.php'>Admin Area</a>";
                }
                ?>

            </li>

        </ul>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item navbar-toggler-right" style="cursor: pointer;">
                <a class="nav-link avatar dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown">
                    <img src="images/avatar.webp" height="40" class="rounded-circle z-depth-0" alt="avatar">
                </a>

                <?php
                if ($role !== ''):
                    ?>
                    <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary">
                        <a class="dropdown-item" href="public/logout.php">Logout</a>
                        <a class="dropdown-item" href="public/reset.php">Reset</a>
                    </div>
                <?php
                else:
                    ?>
                    <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary">
                        <a class="dropdown-item" href="public/login.php">Login</a>
                        <hr>
                        <a class="dropdown-item" href="public/signup.php">Sign Up</a>
                    </div>
                <?php
                endif;
                ?>
            </li>
        </ul>

    </div>
</nav>


<div class="container-fluid gridContainer">
    <!--Shoe Image Section-->
    <div class="col" id="item1">
        <img class="rounded" src="images/school.jpg" width="450" height="450" alt="recent shoe product">

    </div>

    <div class="col" id="item2">
        <p class="lead teex-center" id="school-description">
            School website software is a specialised form of Content Management System (CMS) hosted on a computer
            connected to the internet. It is commissioned by the school governors. It is designed and installed by a
            specialist computer software company. When it has been accepted, the client (the school) is responsible for
            maintaining the content; adding new content and changing elements of the visual design,the visitor to the
            site cannot make these changes but accesses the site to read the content. CMS may have additional modules
            that allow it to do additional tasks- like mass emailings, online registration for events or even online
            sales. The sites can be simple and follow proven models, with just the text and the images customised to the
            schools requirements or bespoke, or part of a larger management suite. (Wikipedia).

        </p>
    </div>
</div>

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>

</body>
</html>