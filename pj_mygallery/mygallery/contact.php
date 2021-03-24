<?php  
  session_start();
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
  <title>My Gallery | Contact</title>
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
          <a class="btn" href="contact.php?a_contact=<?php echo $_SESSION['username'];?>"><img width="22" height="22" src="./image/icontitle.png" alt=""> contact</a>
          <a class="btn" href="logout.php?a_logout"><img width="22" height="22" src="./image/iconlogout.png" alt=""> logout</a>
        </div>
      </div>
    </nav>

  </header>

    <section>
        <div class="container mt-5" id="form-login">
            <div class="container-fluid">
                <form action="php/contact_db.php" method="POST" class="form-control">
                    <h1 class="text-login">My Gallery</h1>
          
                    <?php if(isset($_SESSION['error_con'])) : ?>
                      <div class="text-center alert alert-danger">
                          <h3 id="alert" style="font-family: fantasy;">
                              <?php 
                                  echo $_SESSION['error_con']; 
                                  unset($_SESSION['error_con']);
                              ?>
                          </h3>
                      </div>
                    <?php endif ?>
                    <?php if(isset($_SESSION['succ_con'])) : ?>
                      <div class="text-center alert alert-success">
                          <h3 id="alert" style="font-family: fantasy;">
                              <?php 
                                  echo $_SESSION['succ_con']; 
                                  unset($_SESSION['succ_con']);
                              ?>
                          </h3>
                      </div>
                    <?php endif ?>
                    
                    <?php 
                        $user = $_SESSION['username'];
                    ?>

                    <div class="input-group">
                        <span class="input-group-text"><img width="25" height="23" src="./image/iconuser.png" alt=""></span>
                        <input type="text" name="username" class="form-control" readonly value="<?php echo $user;?>">
                    </div>
                    <div class="input-group">
                        <span class="input-group-text"><img width="25" height="23" src="./image/icontitle.png" alt=""></span>
                        <input type="text" name="title" class="form-control" placeholder="Enter your title">
                    </div>
                    <div class="input-group">
                        <span class="input-group-text"><img width="25" height="23" src="./image/icondetail.png" alt=""></span>
                        <textarea type="text" name="detail" class="form-control" placeholder="Enter your detail"></textarea>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                      <button type="submit" id="btn-upload" name="btn-contact" class="btn btn-success">SEND MESSAGE</button>
                      <a href="user.php" id="btn-cancel" class="btn btn-danger">CANCEL</a>
                  </div>
                </form>
            </div>
        </div>
    </section>





  <div class="footer-basic mt-5">
    <footer class="mt-5">
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