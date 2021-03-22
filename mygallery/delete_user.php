<?php
    require_once 'php/connect.php';
    session_start();

    if(isset($_REQUEST['userid'])){
        $id_user = $_REQUEST['userid'];
        $select_stmt = $conn->prepare("SELECT * FROM user_tb WHERE id=:id");
        $select_stmt->bindParam(":id",$id_user);
        $select_stmt->execute();
        $row_del = $select_stmt->fetch(PDO::FETCH_ASSOC);

        $delete_stmt = $conn->prepare("DELETE FROM user_tb WHERE id=:id");
        $delete_stmt->bindParam(":id",$id_user);
        $delete_stmt->execute();

        $_SESSION['delete_succ'] = "Delete "."'".$row_del['username']."'"." successfully.";
        header('Location: admin.php');
    }else{
        header('Location: admin.php');
    }

?>