<?php

    require_once 'connect.php';
    session_start();

    if(isset($_POST['btn-upload'])){
        try{
            $nameimage = $_POST['name_pic'];
            $userid = $_SESSION['id_user'];
            $nameuser = $_SESSION['username'];

            $image_file = $nameimage.$userid.".jpg";//$_FILES['txt_file']['name'];
            $type = $_FILES['name_file']['type'];
            $size = $_FILES['name_file']['size'];
            $temp = $_FILES['name_file']['tmp_name'];
            $path = "../fileupload/".$image_file;

            if(empty($nameimage) && empty($image_file)){
                $_SESSION['error_up'] = "Please input name file and upload file.";
                header('Location: ../upload.php');
            }else if(empty($nameimage)){
                $_SESSION['error_up'] = "Please enter name file.";
                header('Location: ../upload.php');
            }else if(empty($image_file)){
                $_SESSION['error_up'] = "Please upload your file.";
                header('Location: ../upload.php');
            }else if($type=="image/jpg" || $type=="image/jpeg" || $type=="image/png" || $type=="image/gif"){
                if(!file_exists($path)){
                    if($size < 6000000){
                        move_uploaded_file($temp, $path);
                     }else{
                        $_SESSION['error_up'] = "Your file image too large please upload file 6 MB size.";
                        header('Location: ../upload.php');
                     }         
                }else{
                    $_SESSION['error_up'] = "Please rename your image file";
                    header('Location: ../upload.php');
                }
    
            }else{
                $_SESSION['error_up'] = "Please upload file JPG, JPEG, PNG, GIF file formate.";
                header('Location: ../upload.php');
            }
            if(!isset($_SESSION['error_up'])){
                $insert_stmt = $conn->prepare("INSERT INTO tb_file(detail, image, userID) VALUES (:nameimage, :image, '{$userid}')");
                $insert_stmt->bindParam(":nameimage", $nameimage);
                $insert_stmt->bindParam(":image", $image_file);
                
                if($insert_stmt->execute()){
                    $_SESSION['upload_succ'] = "File image upload successfully. Please to refresh the page.";
                    header('Location: ../upload.php');
                }
            }

        }catch(PDOException $e){
            echo "ERROR >". $e->getMessage();
        }
    }else{
        header('Location: ../upload.php');
    }


    // session_start();
    // require_once ('connect.php');
    
    // if(!isset($_SESSION['userlogin'])){
    //     header('Location: login.php');
    // }
    
    
    // if(isset($_REQUEST['btn_insert'])){
    //     try{
    //        $detail = $_REQUEST['txt_detail'];
    
    //        $image_file = $detail.$_SESSION['user_id'].".jpg";//$_FILES['txt_file']['name'];
    //        $type = $_FILES['txt_file']['type'];
    //        $size = $_FILES['txt_file']['size'];
    //        $temp = $_FILES['txt_file']['tmp_name'];
    //        $path = "fileupload/".$image_file;
    
        
    //        if(empty($detail)){
    //            $errorMsg = "Please enter your detail image.";
    //        }else if(empty($image_file)){
    //            $errorMsg = "Please select your file image.";
    //        }else if($type=="image/jpg" || $type=="image/jpeg" || $type=="image/png" || $type=="image/gif"){
    //             if(!file_exists($path)){
    //                 if($size < 6000000){
    //                     move_uploaded_file($temp, $path);
    //                  }else{
    //                     $errorMsg = "Your file image too large please upload file 6 MB size.";
    //                  }         
    //             }else{
    //                 $errorMsg = "Please rename your image file";
    //             }
    
    //        }else{
    //            $errorMsg = "Please upload file JPG, JPEG, PNG, GIF file formate.";
    //        }
    
    //        if(!isset($errorMsg)){
    
    //             $insert_stmt = $conn->prepare("INSERT INTO tb_file(detail, image, userID) VALUES (:detail, :image, '{$_SESSION['user_id']}')");
    //             $insert_stmt->bindParam(":detail", $detail);
    //             $insert_stmt->bindParam(":image", $image_file);
                
    //             if($insert_stmt->execute()){
    //                 $insertMsg = "File image upload successfully. Please to refresh the page.";
    //                 header('refresh:1 ; user_home.php');
    //             }
    //        }
    
    //     } catch(PDOException $e){
    //         $e->getMessage();
    //     }
    // }
?>