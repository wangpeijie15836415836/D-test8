<?php 
    include_once "fun.php";
    
    $imgSrc=$_POST["imgSrc"];
    $img=substr($imgSrc,'23');
    $img=base64_decode("$img");
    // $ext = strtolower(pathinfo($img,PATHINFO_EXTENSION));
    $imgName=uniqid().rand(1000,9999);
    $imgUrl="http://localhost/D-test8/file/".$imgName.'.jpg';
    // var_dump($imgUrl);
    $a=file_put_contents('../file/'.$imgName.'.jpg', $img);
    // var_dump($imgSrc);

    $pdo = mysqlInit("mysql", "localhost", "lofter", "root", "");
    session_start();
    $userId=$_SESSION["user"]["user_id"];
    $result=$pdo->exec("update user set touxiang='{$imgUrl}' where user_id='{$userId}'");
    if($result){
    	echo $imgUrl;

    }else{
    	echo "fail!";
    }

 ?>