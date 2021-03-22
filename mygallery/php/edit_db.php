<?php
    require_once 'connect.php';
    session_start();
    if(isset($_POST['btn_edit'])){
        try{
            $nameimage = $_POST['name_pic'];
            $userid = $_SESSION['id_user'];
            $idImg = $_REQUEST['id_image'];

            $image_file = $nameimage.$userid.".jpg";//$_FILES['txt_file']['name'];
            $type = $_FILES['name_file']['type'];
            $size = $_FILES['name_file']['size'];
            $temp = $_FILES['name_file']['tmp_name'];
            $path = "../fileupload/".$image_file;
            $directory = "fileupload/";

            $sel_image = $conn->prepare("SELECT * FROM tb_file WHERE id=:id");
            $sel_image->bindParam(":id", $idImg);
            $sel_image->execute();
            $rowimg = $sel_image->fetch(PDO::FETCH_ASSOC);
            if(empty($nameimage) && empty($image_file)){
                $_SESSION['error_up'] = "Please input name file and upload file.";
                header('Location: ../user.php');

            }else if(empty($nameimage)){
                $_SESSION['error_up'] = "Please input name file.";
                header('Location: ../user.php');

            }else if(empty($image_file)){
                $_SESSION['error_up'] = "Please upload your file.";
                header('Location: ../user.php');

            }else if($type=="image/jpg" || $type=="image/jpeg" || $type=="image/png" || $type=="image/gif"){
                if(!file_exists($path)){
                    if($size < 6000000){
                        unlink($directory.$rowimg['image']);
                        move_uploaded_file($temp, $path);
                     }else{
                        $_SESSION['error_up'] = "Your file image too large please upload file 6 MB size.";
                        header('Location: ../user.php');
                     }         
                }else{
                    $_SESSION['error_up'] = "Please rename your image file";
                    header('Location: ../user.php');
                }
    
            }else{
                $_SESSION['error_up'] = "Please upload file JPG, JPEG, PNG, GIF file formate.";
                header('Location: ../user.php');
            }
            if(!isset($_SESSION['error_up'])){
                $update_stmt = $conn->prepare("UPDATE tb_file SET detail=:nameimage, image=:image WHERE id=:id");
                $update_stmt->bindParam(":nameimage", $nameimage);
                $update_stmt->bindParam(":image", $image_file);
                $update_stmt->bindParam(":id", $idImg);
                
                if($update_stmt->execute()){
                    $_SESSION['upload_succ'] = "File image upload successfully.";
                    header('Location: ../user.php');
                }
            }

        }catch(PDOException $e){
            echo "ERROR >". $e->getMessage();
        }
    }else{
        header('Location: ../user.php');
    }
?>