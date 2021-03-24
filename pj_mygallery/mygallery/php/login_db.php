
<?php

    require_once 'connect.php';
    session_start();

    if(isset($_POST['btn_login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($username) && empty($password)){
            $_SESSION['error'] = "Please enter your username or password.";
            header('Location: ../login.php');
        }else if(empty($username)){
            $_SESSION['error'] = "Please enter your username.";
            header('Location: ../login.php');
        }else if(empty($password)){
            $_SESSION['error'] = "Please enter your password.";
            header('Location: ../login.php');
        }else if($username && $password){
            if($username == "admin" && $password == "000000"){
                $_SESSION['admin'] = $username;
                $_SESSION['login_admin'] = "Login successfuly.";
                header('Location: ../admin.php');
            }else{
                try{
                    $select = $conn->prepare("SELECT username, password FROM user_tb WHERE username = :username AND password = :password");
                    $select->bindParam(":username", $username);
                    $select->bindParam(":password", $password);
                    $select->execute();
    
                    while($rowcheck = $select->fetch(PDO::FETCH_ASSOC)){
                        $dbusername = $rowcheck['username'];
                        $dbpassword = $rowcheck['password'];
                    }
                    if($username!=null && $password!=null){
                        if($select->rowCount() > 0 ){
                            if($username==$dbusername && $password==$dbpassword){
                                $sel_datauser = $conn->prepare("SELECT id FROM user_tb WHERE username = '$username'");
                                $sel_datauser->execute();
                                $row_datauser = $sel_datauser->fetch(PDO::FETCH_ASSOC);
    
                                $_SESSION['id_user'] = $row_datauser['id'];
                                $_SESSION['username'] = $username;
                                $_SESSION['login_succ'] = "Login successfuly.";
                                header('Location: ../user.php');
                            }else{
                                $_SESSION['error'] = "Login failed.";
                                header('Location: ../login.php');
                            }
                        }else{
                            $_SESSION['error'] = "Yuor username and password is wrong.";
                            header('Location: ../login.php');
                        }
                    }else{
                        $_SESSION['error'] = "Somting is wrong.";
                        header('Location: ../login.php');
                    }
    
                }catch(PDOException $e){
                    echo "ERROR". $e->getMessage();
                }
            }

        }
    }

?>