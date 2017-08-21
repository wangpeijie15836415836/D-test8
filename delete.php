<?php 
    include_once "php/fun.php";

    if(!checkLogin()){
    	error(2,"请登录","index.php");
    }
    $publishId=isset($_GET["publishId"])&&intval($_GET["publishId"])?intval($_GET["publishId"]):"";
    if(!empty($publishId)){
    	error(2,"参数非法","user.php");
    }
    $pdo=mysqlInit("mysql","localhost","lofter","root","");
    $result=$pdo->query("select count(publish_id) as total from publish where publish_id={$publishId}");
    $row=$result->fetchAll(PDO::FETCH_ASSOC);

    if($row[0]["total"]==0){
    	error(2,"内容不存在","user.php");
    }
    $result=$pdo->exec("delete from publish where publish_id={$publishId} limit 1");
    if($result){
    	error(1,"删除成功","user.php");
    }else{
    	error(2,"删除失败","user.php");
    }
 ?>