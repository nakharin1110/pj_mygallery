<?php

if(isset($_REQUEST['a_logout'])){
    session_start();
    session_destroy();
    header('Location: login.php');
}

?>