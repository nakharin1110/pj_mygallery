<?php
  session_start();
  require_once 'php/connect.php';
 
  if(isset($_SESSION['username'])){
      header('Location: user.php');
  }
  if(!isset($_SESSION['admin'])){
    header('Location: login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Gallery | Admin</title>
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

  
  <div class="container text-center" id="card-img">
    <div class="text">
      <div class="text-control">
        <h1>My gallery</h1>
        <h3>User in the system</h3>
      </div>

      <?php if(isset($_SESSION['login_admin'])) : ?>
                  <div class="text-center alert alert-success">
                      <h3 id="alert" style="font-family: fantasy;text-shadow: none;">
                          <?php 
                              echo $_SESSION['login_admin']; 
                              unset($_SESSION['login_admin']);
                          ?>
                      </h3>
                  </div>
        <?php endif ?>
        <?php if(isset($_SESSION['error_edituser'])) : ?>
                  <div class="text-center alert alert-danger">
                      <h3 id="alert" style="font-family: fantasy;text-shadow: none;">
                          <?php 
                              echo $_SESSION['error_edituser']; 
                              unset($_SESSION['error_edituser']);
                          ?>
                      </h3>
                  </div>
        <?php endif ?>
        <?php if(isset($_SESSION['updateuser_succ'])) : ?>
                  <div class="text-center alert alert-success">
                      <h3 id="alert" style="font-family: fantasy;text-shadow: none;">
                          <?php 
                              echo $_SESSION['updateuser_succ']; 
                              unset($_SESSION['updateuser_succ']);
                          ?>
                      </h3>
                  </div>
        <?php endif ?>
        <?php if(isset($_SESSION['delete_succ'])) : ?>
                  <div class="text-center alert alert-success">
                      <h3 id="alert" style="font-family: fantasy;text-shadow: none;">
                          <?php 
                              echo $_SESSION['delete_succ']; 
                              unset($_SESSION['delete_succ']);
                          ?>
                      </h3>
                  </div>
        <?php endif ?>

    </div>

    <div class="row">
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <?php 
              $sel_user = $conn->prepare("SELECT * FROM user_tb");
              $sel_user->execute();

              $i = 1;
              while($rowuser = $sel_user->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tbody>
                <tr>
                    <th scope="row"><?php echo $i; ?></th>
                    <td><?php echo $rowuser['id']; ?></td>
                    <td><?php echo $rowuser['email']; ?></td>
                    <td><?php echo $rowuser['username']; ?></td>
                    <td><?php echo $rowuser['password']; ?></td>
                    <td><a href="edituser.php?userid=<?php echo $rowuser['id']; ?>" id="btn-edit" class="btn btn-warning">EDIT</a></td>
                    <td><a href="delete_user.php?userid=<?php echo $rowuser['id']; ?>" id="btn-delete" class="btn btn-danger">DELETE</a></td>
                </tr>
            </tbody>
              <?php  
              $i++;
            }?>
        </table>
    </div>

  </div>







  <div class="footer-basic mt-5">
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