<?php
    require_once 'connect.php';
    session_start();

    if(isset($_POST['btn-contact'])){
        $user = $_POST['username'];
        $title = $_POST['title'];
        $detail = $_POST['detail'];


        if(empty($title) && empty($detail)){
            $_SESSION['error_con'] = "Please enter title and detail.";
            header('Location: ../contact.php');
        }else if(empty($title)){
            $_SESSION['error_con'] = "Please enter title.";
            header('Location: ../contact.php'); 
        }else if(empty($detail)){
            $_SESSION['error_con'] = "Please enter detail.";
            header('Location: ../contact.php'); 
        }else{
            try{
                $sel_update = $conn->prepare("SELECT email FROM user_tb WHERE username=:user");
                $sel_update->bindParam(":user", $user);
                $sel_update->execute();
                $row = $sel_update->fetch(PDO::FETCH_ASSOC);
                $rowemail = $row['email'];

                $insertdate= $conn->prepare("INSERT INTO contact (title, detail, email)VALUES (:title, :detail, :email)");
                $insertdate->bindParam(":title", $title);
                $insertdate->bindParam(":detail", $detail);
                $insertdate->bindParam(":email", $rowemail);
            
                if($insertdate->execute()){
                    $_SESSION['succ_con'] = "Send message to admin successfully.";
                    header('Location: ../contact.php');
                }else{
                    $_SESSION['error_con'] = "Execute failed.";
                    header('Location: ../contact.php');
                    
                }
            }catch(PDOException $e){
                echo "Failed". $e->getMessage();
            }
            
        }
    }else{
        $_SESSION['error_con'] = "Contact failed.";
        header('Location: ../contact.php');
    }

?>