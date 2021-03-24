<?php
    require_once 'php/connect.php';
    session_start();

    if(isset($_REQUEST['contact_id'])){
        $id_delete = $_REQUEST['contact_id'];

        $delete_stmt = $conn->prepare("DELETE FROM contact WHERE contactID=:id");
        $delete_stmt->bindParam(":id",$id_delete);
        $delete_stmt->execute();

        $_SESSION['delete_con'] = "Contact delete successfully.";
        header('Location: admin_con.php');
    }else{
        header('Location: admin_con.php');
    }

?>