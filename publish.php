<?php 
    include_once "php/fun.php";

    if(!checkLogin()){
    	error(2,"请登录","index.php");
    }

    $user=$_SESSION["user"]["usrname"];

    

 ?>