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
  <title>My Gallery | View Contact</title>
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
          <a class="btn" href="admin.php"><img width="22" height="22" src="./image/iconuser.png" alt=""> user</a>
          <a class="btn" href="admin_con.php"><img width="22" height="22" src="./image/icontitle.png" alt=""> contact</a>
          <a class="btn" href="logout.php?a_logout"><img width="22" height="22" src="./image/iconlogout.png" alt=""> logout</a>
        </div>
      </div>
    </nav>

  </header>

  <?php
    if(isset($_REQUEST['contact_id'])){
        $contact_id = $_REQUEST['contact_id'];
        $sql_sel = $conn->prepare("SELECT * FROM contact WHERE contactID = :id");
        $sql_sel->bindParam(":id", $contact_id);
        $sql_sel->execute();
        $row_con = $sql_sel->fetch(PDO::FETCH_ASSOC);
    }else{
        header('Location: admin_con.php');
    }
  ?>
  
  <div class="container text-center" id="card-img">
    <div class="text">
        <div class="text-control">
            <h1>My gallery</h1>
            <h3>View contact</h3>
        </div> 
        <div class="container-fluid">
                <form action="" method="POST" class="form-control">
                    <div class="input-group">
                        <span class="input-group-text"><img width="25" height="23" src="./image/iconuser.png" alt=""></span>
                        <input type="text" name="email" class="form-control" readonly value="<?php echo $row_con['email'];?>">
                    </div>
                    <div class="input-group">
                        <span class="input-group-text"><img width="25" height="23" src="./image/icontitle.png" alt=""></span>
                        <input type="text" name="title" class="form-control" readonly value="<?php echo $row_con['title'];?>">
                    </div>
                    <div class="input-group">
                        <span class="input-group-text"><img width="25" height="23" src="./image/icondetail.png" alt=""></span>
                        <input type="text" name="detail" class="form-control" readonly value="<?php echo $row_con['detail'];?>">
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                      <a href="admin_con.php" id="btn-cancel" class="btn btn-danger">BACK</a>
                  </div>
                </form>
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