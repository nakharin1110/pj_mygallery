<?php
    session_start();
    require_once 'php/connect.php';
    if(isset($_SESSION['username'])){
        header('Location: user.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Gallery | EditUser</title>
    <link rel="stylesheet" href="bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.0.0-beta2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="model.css">
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
                    <p class="text-user"><img width="22" height="24" src="./image/iconper.png" alt=""> <?php if(isset($_SESSION['admin'])){echo $_SESSION['admin'];} ?></p>
                    <span style="font-weight: 900;">|</span>
                    <a class="btn" href="logout.php?a_logout"><img width="22" height="22" src="./image/iconlogout.png" alt=""> logout</a>
                </div>
            </div>
          </nav>

    </header>

    <?php
    $updateUser = $_REQUEST['userid'];
    $sql_sel = $conn->prepare("SELECT * FROM user_tb WHERE id = :id");
    $sql_sel->bindParam(":id", $updateUser);
    $sql_sel->execute();
    $rowUser = $sql_sel->fetch(PDO::FETCH_ASSOC);
    ?>

     <section style="margin: 0px auto;">
        <div class="container" id="form-login">
            <div class="container-fluid">
                <form action="php/edituser_db.php" method="POST" class="form-control">
                    <h1 class="text-login">My Gallery</h1>
                    <div class="input-group">
                        <span class="input-group-text"><img width="25" height="30" src="./image/iconID.png" alt=""></span>
                        <input type="text" name="iduser" class="form-control disabled" readonly value="<?php echo $rowUser['id'];?>">
                    </div>
                    <div class="input-group">
                        <span class="input-group-text"><img width="25" height="30" src="./image/iconper.png" alt=""></span>
                        <input type="text" name="username" class="form-control" readonly value="<?php echo $rowUser['username'];?>">
                    </div>
                    <div class="input-group">
                        <span class="input-group-text"><img width="25" height="30" src="./image/iconemail.png" alt=""></span>
                        <input type="text" name="email" class="form-control" value="<?php echo $rowUser['email'];?>">
                    </div>
                    <div class="input-group">
                        <span class="input-group-text"><img style="padding: 5px 2px;" width="25" height="30" src="./image/iconpass.png" alt=""></span>
                        <input type="text" name="password" class="form-control" value="<?php echo $rowUser['password'];?>">
                    </div>
                    <div class="d-grid gap-2 col-6">
                        <button type="submit" id="btn-upload" name="btn_editUser" class="btn btn-success">EDIT</button>
                        <a href="admin.php" id="btn-cancel" class="btn btn-danger">CANCEL</a>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <div class="footer-basic">
        <footer>
            <div class="social">
                <a href="https://www.facebook.com/nakharin.moksuwan" target="_blank"><img width="25px" height="30px" src="./image/fb.png" alt=""></a>
                <a href="https://www.instagram.com/nkr.msw/" target="_blank"><img width="25px" height="30px" src="./image/ig.png" alt=""></a>
            </div>
            <p>Website My Gallery © 2021</p>
            <p>Rajamangala Univwesity of Technology Rattanakosin</p>
        </footer>
    </div>


    <script src="model.js" type="text/javascript"></script>
    <script src="bootstrap-5.0.0-beta2-dist/js/bootstrap.js"></script>
    <script src="bootstrap-5.0.0-beta2-dist/js/bootstrap.min.js"></script>
</body>
</html>