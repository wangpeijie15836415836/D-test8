<?php 
    include_once "php/fun.php";

    session_start();
    unset($_SESSION["user"]);
    error(1,"已退出","index.php");
 ?>