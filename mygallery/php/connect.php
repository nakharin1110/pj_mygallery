<?php

    $arrDB = array("localhost", "root", "", "gallerydb");
    try{
        $conn = new PDO("mysql:host={$arrDB[0]};dbname={$arrDB[3]}", $arrDB[1], $arrDB[2]);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo "Failed". $e->getMessage();
    }

?>