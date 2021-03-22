<?php
    require_once 'connect.php';
    session_start();

    if(isset($_POST['btn_register'])){

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(empty($username) && empty($email) && empty($password)){
            $_SESSION['error_re'] = "Please enter your username, email and password.";
            header('Location: ../register.php');
        }else if(empty($username)){
            $_SESSION['error_re'] = "Please enter your username.";
            header('Location: ../register.php');
        }else if(empty($email)){
            $_SESSION['error_re'] = "Please enter your email.";
            header('Location: ../register.php');
        }else if(empty($password)){
            $_SESSION['error_re'] = "Please enter your password.";
            header('Location: ../register.php');
        }else if($username && $email && $password){
            try{
                $sel_regis = $conn->prepare("SELECT username, email FROM user_tb WHERE username=:username AND email=:email");
                $sel_regis->bindParam(":username", $username);
                $sel_regis->bindParam(":email", $email);
                $sel_regis->execute();
                $row = $sel_regis->fetch(PDO::FETCH_ASSOC);
                $checkusername = $row['username'];
                $checkemail = $row['email'];

                if($username == $checkusername || $checkemail == $email){
                    $_SESSION['error_re'] = "Sorry username and email already exists.";
                    header('Location: ../register.php');   
                }else if($username == "admin"){
                    $_SESSION['error_re'] = "Do not use this username as 'ADMIN'.";
                    header('Location: ../register.php');
                }else if (!isset($_SESSION['error_re'])){
                    $insert_regis = $conn->prepare("INSERT INTO user_tb(username, password, email) VALUES (:username, :password, :email)");
                    $insert_regis->bindParam(":username", $username);
                    $insert_regis->bindParam(":password", $password);
                    $insert_regis->bindParam(":email", $email);
                    if($insert_regis->execute()){
                        $_SESSION['regis_succ'] = "You already have an account.";
                        header('Location: ../register.php');
                    }else{
                        $_SESSION['error_re'] = "somting wrong 3.";
                        header('Location: ../register.php');
                    }          
                }else{
                    $_SESSION['error_re'] = "somting wrong 2.";
                    header('Location: ../register.php');
                }

            }catch(PDOException $e){
                echo "ERROR >". $e->getMessage();
            }
        }else{
            $_SESSION['error_re'] = "somting wrong 1.";
            header('Location: ../register.php');
        }

    }else{
        header('Location: ../register.php');
    }

?>