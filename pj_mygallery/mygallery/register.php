<?php
    session_start(); 
    if(isset($_SESSION['username'])){
        header('Location: user.php');
    }
    if(isset($_SESSION['admin'])){
        header('Location: admin.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Gallery | Register</title>
    <link rel="stylesheet" href="bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.0.0-beta2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>


    
    <link rel="stylesheet" type="text/css" href="loading.css" />

</head>
<body>

    <div class="loader">
        <img src="image/loading2.gif" alt="Loading...">
    </div>
    <header class="sticky-top">

        <nav class="navbar navbar-light">
            <div class="container-fluid">
                <a class="navbarbrand ms-5">MY Gallery</a>
                <div class="navbar-nav d-inline">
                    <a class="btn" href="home.html"><img width="22" height="22" src="./image/iconhome.png" alt=""> home</a>
                    <span style="font-weight: 900;">|</span>
                    <a class="btn" href="login.php"><img width="22" height="22" src="./image/iconlogin.png" alt=""> login</a>
                </div>
            </div>
          </nav>

    </header>



     <section style="margin: 0px auto;">
        <div class="container" id="form-login">
            <div class="container-fluid">
                <form action="./php/register_db.php" method="POST" class="form-control">
                    <h1 class="text-login">My Gallery</h1>

                    <?php if(isset($_SESSION['error_re'])) : ?>
                        <div class="text-center alert alert-danger">
                            <h5 id="alert" style="font-family: fantasy; margin:0; padding: 0px;">
                            <?php 
                            echo $_SESSION['error_re']; 
                            unset($_SESSION['error_re']);
                            ?>
                            </h5>
                        </div>
                    <?php endif ?>

                    <?php if(isset($_SESSION['regis_succ'])) : ?>
                        <div class="text-center alert alert-success">
                            <h5 id="alert" style="font-family: fantasy; margin:0; padding: 0px;">
                            <?php 
                            echo $_SESSION['regis_succ']; 
                            unset($_SESSION['regis_succ']);
                            header('Refresh: 3; login.php');
                            ?>
                            </h5>
                        </div>
                    <?php endif ?>

                    <div class="input-group">
                        <span class="input-group-text"><img width="25" height="30" src="./image/iconper.png" alt=""></span>
                        <input type="text" name="username" class="form-control" placeholder="Enter your username">
                    </div>
                    <div class="input-group">
                        <span class="input-group-text"><img width="25" height="30" src="./image/iconemail.png" alt=""></span>
                        <input type="text" name="email" class="form-control" placeholder="Enter your email">
                    </div>
                    <div class="input-group">
                        <span class="input-group-text"><img style="padding: 5px 2px;" width="25" height="30" src="./image/iconpass.png" alt=""></span>
                        <input type="password" name="password" class="form-control" placeholder="Enter your password">
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn" name="btn_register">REGISTER</button>
                    </div>
                    <p class="text-control">You have a account? click here <a href="login.php">login</a> </p>
                </form>
            </div>
        </div>
    </section>

    <div class="footer-basic" style="margin: 10px auto;">
        <footer>
            <div class="social">
            <a href="https://www.facebook.com/nakharin.moksuwan" target="_blank"><img width="25px" height="30px" src="./image/fb.png" alt=""></a>
            <a href="https://www.instagram.com/nkr.msw/" target="_blank"><img width="25px" height="30px" src="./image/ig.png" alt=""></a>
            </div>
            <div class="list-item">
                <a href="home.html">HOME</a>
                <a href="login.php">LOGIN</a>
                <a href="">REGISTER</a>
            </div>
            <p>Website My Gallery ?? 2021</p>
            <p>Rajamangala Univwesity of Technology Rattanakosin</p>
        </footer>
    </div>
                        
    <script src="model.js" type="text/javascript"></script>
    <script src="bootstrap-5.0.0-beta2-dist/js/bootstrap.js"></script>
    <script src="bootstrap-5.0.0-beta2-dist/js/bootstrap.min.js"></script>
</body>
</html>