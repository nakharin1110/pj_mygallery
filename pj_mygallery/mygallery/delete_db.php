<?php
    require_once 'php/connect.php';
    session_start();

    if(isset($_REQUEST['imageID'])){
        $id_delete = $_REQUEST['imageID'];
        $select_stmt = $conn->prepare("SELECT * FROM tb_file WHERE id=:id");
        $select_stmt->bindParam(":id",$id_delete);
        $select_stmt->execute();
        $row_del = $select_stmt->fetch(PDO::FETCH_ASSOC);
        unlink("fileupload/".$row_del['image']);

        $delete_stmt = $conn->prepare("DELETE FROM tb_file WHERE id=:id");
        $delete_stmt->bindParam(":id",$id_delete);
        $delete_stmt->execute();

        $_SESSION['upload_succ'] = "File image delete successfully.";
        header('Location: user.php');
    }else{
        header('Location: user.php');
    }

?>