<?php 
    include_once "php/fun.php";

    if(!checkLogin()){
    	error(2,"请登录","index.php");
    }
    
    
    $user=$_SESSION["user"]["username"];
    if(!empty($_POST["article-title"])){
    	$pdo=mysqlInit("mysql","localhost","lofter","root","");

    	$articleTitle=mysql_real_escape_string(trim($_POST["article-title"]));
    	$articleContent=mysql_real_escape_string(trim($_POST["article-content"]));
    	$userId=$_SESSION["user"]["user_id"];
    	// echo $userId;die;

    	$file=$_FILES["file"];
    	print_r($file);
    	$img=imgUpload($file,$userId);
    	// echo $img;
    	$result=$pdo->exec("insert into article(articletitle,articlecontent,img,user_id) values('{$articleTitle}','{$articleContent}','{$img}','{$userId}')");

    	if($result){
    		error(1,"操作成功","user.php");
    	}else{
    		error(2,"上传失败");
    	}
    }
    

 ?>















<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/long.css">
	<link rel="stylesheet" href="font/iconfont.css">
</head>
<body>
	<div class="long-head">
		<a href="user.html"></a>
		<div class="center">
			<span>写文章</span>
		</div>
		<form action="long.php" name="article" method="post" enctype="multipart/form-data">
		<div class="right">
			<ul>
				<li></li>
				<li></li>
				<li></li>
				<li><button type="submit" id="longSubmit">发布</button></li>
				<li>
				<img src="img/user_64.png" alt="">
				<i class="iconfont icon-xiajiantou"></i>
				</li>
			</ul>
		</div>
	</div>
	
	<div class="long-main">
		<div class="long-pic">
			<i class="iconfont icon-tianjiatupian"></i>
			<div class="long-meng">点击添加封面图</div>
			<div class="img-container2"></div>
			<div class="none"><input type="file" id="_f" name="file"></div>
		</div>
		<div class="long-title">
			<textarea id="biaoti" placeholder="请填写标题" name="article-title"></textarea>
			<textarea id="daoyu" placeholder="请填写导语(选填)" name="article-daoyu"></textarea>
		</div>
		<div id="container">
             <textarea id="content" name="article-content"></textarea>
        </div>
	</div>
	</form>
    <script src="js/jquery-1.8.3.min.js"></script>
	<script src="js/kindeditor/kindeditor-all-min.js"></script>
	<script src="js/kindeditor/lang/zh_CN.js"></script>
	<script src="js/long.js"></script>
	<script>
		var K = KindEditor;
    K.create('#content', {
        width      : '630px',
        height     : '400px',
        minWidth   : '30px',
        minHeight  : '50px',
        items      : [
            'undo', 'redo', '|',
            'justifyleft', 'justifycenter', 'justifyright', 'clearhtml',
            'fontsize', 'forecolor', 'bold',
            'italic', 'underline', 'link', 'unlink', '|'
            , 'fullscreen'
        ],
        afterCreate: function () {
            this.sync();
        },
        afterChange: function () {
            //编辑器失去焦点时直接同步，可以取到值
            this.sync();
        }
    });
	</script>
</body>
</html>