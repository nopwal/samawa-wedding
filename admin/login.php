<?php 
session_start();
require 'functions.php';

//cek cookie
if (isset($_COOKIE['id_admin']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id_admin'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM admin WHERE id_admin = $id");
    $row = mysqli_fetch_assoc($result);

    //cek cookie dan username
    if ($key === hash('sha256', $row['username'])) {
        // code...
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION['login'])) {
    // code...
    header("Location: index.php");
    exit;
}

if (isset($_POST["login"])) {
    // code...
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;
            $_SESSION['id_admin'] = $row['id_admin'];
            $_SESSION['username'] = $row['username'];

            // cek remember me
            if(isset($_POST["remember"])){
                //buat cookie
                setcookie('id_admin', $row['id_admin'], time()+60);
                setcookie('key', hash('sha256', $row['username']), time()+60);
            }

            header("Location: index.php");
            exit;
        }
    }
    $error = true;
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- SEO Meta Tags -->
    <meta name="description" content="Tivo is a HTML landing page template built with Bootstrap to help you crate engaging presentations for SaaS apps and convert visitors into users.">
    <meta name="author" content="Inovatik">
    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content="" /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>Login ke Sistem | Samawa</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="../home/css/bootstrap.css" rel="stylesheet">
    <link href="../home/css/fontawesome-all.css" rel="stylesheet">
    <link href="../home/css/swiper.css" rel="stylesheet">
    <link href="../home/css/magnific-popup.css" rel="stylesheet">
    <link href="../home/css/styles.css" rel="stylesheet">
    
    <!-- Favicon  -->
    <link rel="icon" href="../home/images/favicon.png">
</head>
<body data-spy="scroll" data-target=".fixed-top">
    
    <!-- Preloader -->
    <div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->
    
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container">

            <!-- Image Logo -->
            <a class="navbar-brand" href="../"><img src="../home/images/logo.png" alt="alternative"></a> 
            
            <!-- Mobile Menu Toggle Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-awesome fas fa-bars"></span>
                <span class="navbar-toggler-awesome fas fa-times"></span>
            </button>
            <!-- end of mobile menu toggle button -->

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="../#header">HOME <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="../#features">FEATURES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="../#pricing">PRICING</a>
                    </li>
                </ul>
            </div>
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->

    <!-- Header -->
    <header id="header" class="ex-2-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <br><br><h1>Log In - Admin</h1>
                    <p>Login <a class="white" href="../login/">Client</a></p>
                    <!-- Sign Up Form -->
                    <div class="form-container">
                        <form role="form" action="" method="post" name="login">
                            <fieldset>
                                <?php if (isset($error)) : ?>
                                    <p style="color:red; font-style: italic;">username / password salah </p>
                                <?php endif; ?>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" id="username" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" id="password" required>
                                </div>
                                
                                <div class="form-group">
                                <button name="login" type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                                </div>
                                <div class="form-message">
                                <div id="smsgSubmit" class="h3 text-center hidden"></div>
                                </div>
                            </fieldset>
                        </form>
                    </div> <!-- end of form container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->

    <!-- Scripts -->
    <script src="../home/js/jquery.min.js"></script>
    <script src="../home/js/popper.min.js"></script>
    <script src="../home/js/bootstrap.min.js"></script>
    <script src="../home/js/jquery.easing.min.js"></script>
    <script src="../home/js/swiper.min.js"></script>
    <script src="../home/js/jquery.magnific-popup.js"></script>
    <script src="../home/js/validator.min.js"></script>
    <script src="../home/js/scripts.js"></script>
</body>
</html>