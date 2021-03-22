<?php
    require_once 'connect.php';
    session_start();

    if(isset($_POST['btn_editUser'])){
        $iduser = $_POST['iduser'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(empty($username) && empty($email) && empty($password)){
            $_SESSION['error_edituser'] = "Please enter your username, email and password.";
            header('Location: ../admin.php');
        }else if(empty($username)){
            $_SESSION['error_edituser'] = "Please enter your username.";
            header('Location: ../admin.php');
        }else if(empty($email)){
            $_SESSION['error_edituser'] = "Please enter your email .";
            header('Location: ../admin.php');
        }else if(empty($password)){
            $_SESSION['error_edituser'] = "Please enter your password.";
            header('Location: ../admin.php');
        }else if($username && $email && $password){
            try{
                $sel_update = $conn->prepare("SELECT email FROM user_tb WHERE email=:email");
                $sel_update->bindParam(":email", $email);
                $sel_update->execute();
                $row = $sel_update->fetch(PDO::FETCH_ASSOC);
                $checkemail = $row['email'];

                if($checkemail == $email){
                    $_SESSION['error_edituser'] = "Sorry email already exists.";
                    header('Location: ../admin.php');   
                }else if (!isset($_SESSION['error_edituser'])){
                    $update_user = $conn->prepare("UPDATE user_tb SET username=:username, email=:email, password=:password WHERE id='{$iduser}'");
                    $update_user->bindParam(":username", $username);
                    $update_user->bindParam(":email", $email);                    
                    $update_user->bindParam(":password", $password);
                    if($update_user->execute()){
                        $_SESSION['updateuser_succ'] = "Update user successfuly.";
                        header('Location: ../admin.php');
                    }else{
                        $_SESSION['error_edituser'] = "somting wrong 3.";
                        header('Location: ../admin.php');
                    }          
                }else{
                    $_SESSION['error_edituser'] = "somting wrong 2.";
                    header('Location: ../admin.php');
                }

            }catch(PDOException $e){
                echo "ERROR >". $e->getMessage();
            }
        }

    }else{
        header('Location: ../admin.php');
    }

?>