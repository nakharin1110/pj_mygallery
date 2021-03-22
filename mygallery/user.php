<?php
  require_once 'php/connect.php';

  session_start(); 
  if(isset($_SESSION['admin'])){
      header('Location: admin.php');
  }
  if(!isset($_SESSION['username'])){
    header('Location: login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Gallery | User</title>
  <link rel="stylesheet" href="bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap-5.0.0-beta2-dist/css/bootstrap.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="model.css">
  <link rel="stylesheet" href="./css/lightbox.css">
  <link rel="stylesheet" href="./css/lightbox.min.css">
  <script src="./js/lightbox-plus-jquery.min.js"></script>
  <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
  <link rel="stylesheet" href="loading.css">


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
          
          <p class="text-user"><img width="22" height="24" src="./image/iconper.png" alt=""> <?php if(isset($_SESSION['username'])){echo $_SESSION['username'];} ?></p>
          <span style="font-weight: 900;">|</span>
          <a class="btn" href="logout.php?a_logout"><img width="22" height="22" src="./image/iconlogout.png" alt=""> logout</a>
        </div>
      </div>
    </nav>

  </header>

  
  <div class="container text-center" id="card-img">
    <div class="text">
      <div class="text-control m-3">
        <h1>My gallery</h1>
        <h3>Your picture in the system</h3>
      </div>
      
      <div class="btn-upload m-3">
        <a href="upload.php" class="btn btn-success" id="btnupload">upload file</a>
      </div>
    </div>

    <?php if(isset($_SESSION['login_succ'])) : ?>
                <div class="text-center alert alert-success">
                    <h3 id="alert" style="font-family: fantasy;">
                        <?php 
                            echo $_SESSION['login_succ']; 
                            unset($_SESSION['login_succ']);
                        ?>
                    </h3>
                </div>
    <?php endif ?>
    <?php if(isset($_SESSION['error_up'])) : ?>
                <div class="text-center alert alert-danger">
                    <h3 id="alert" style="font-family: fantasy;">
                        <?php 
                            echo $_SESSION['error_up']; 
                            unset($_SESSION['error_up']);
                        ?>
                    </h3>
                </div>
    <?php endif ?>
    <?php if(isset($_SESSION['upload_succ'])) : ?>
                <div class="text-center alert alert-success">
                    <h3 id="alert" style="font-family: fantasy;">
                        <?php 
                            echo $_SESSION['upload_succ']; 
                            unset($_SESSION['upload_succ']);
                            header('Refresh:3');
                        ?>
                    </h3>
                </div>
    <?php endif ?>

    <div class="row">
      <?php

        $select_stmt = $conn->prepare("SELECT * FROM tb_file WHERE userID = '{$_SESSION['id_user']}'");
        $select_stmt->execute();
        while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)){
      ?>
      <div class="col-md-4">
        <div class="card">
          <a href="fileupload/<?php echo $row['image'];?>" data-lightbox="image-1"><img id="img-user" src="fileupload/<?php echo $row['image'];?>" class="img-fluid" alt=""></a>
          <div class="card-body">
            <h4 id="nameImg" style="color: #fff;text-shadow: 1px 1px 5px rgb(0, 0, 0);">Name : <?php echo $row['detail']; ?></h4>
            <a href="delete_db.php?imageID=<?php echo $row['id'];?>" id="btn-delete" class="btn btn-danger">DELETE</a>
            <a href="editimg.php?imageID=<?php echo $row['id'];?>" id="btn-edit" class="btn btn-warning">EDIT</a>
          </div>
        </div>
      </div>
      <?php } ?>

    </div>
  </div>







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



  <!-- <script src="./js/lightbox.js"></script> -->
  <script src="model.js" type="text/javascript"></script>
  <script src="bootstrap-5.0.0-beta2-dist/js/bootstrap.js"></script>
  <script src="bootstrap-5.0.0-beta2-dist/js/bootstrap.min.js"></script>
</body>

</html>