<?php 
    include_once "php/fun.php";
    if(!checkLogin()){
   	error(2,"请完成登录","index.php");
   }
   

    $userId=$_SESSION["user"]["user_id"];
   $pdo=mysqlInit("mysql","localhost","lofter","root","");
   $result=$pdo->query("select touxiang from user where user_id='{$userId}'");
   $touxiang=$result->fetchAll(PDO::FETCH_ASSOC);
   $touxiang=$touxiang[0]['touxiang'];
    echo $touxiang;

 ?>



<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>个人主页</title>
		<link rel="stylesheet" type="text/css" href="css/animate.min.css" />
		<link rel="stylesheet" type="text/css" href="css/base.css" />
		<link rel="stylesheet" type="text/css" href="css/Personhomepage.css" />
	</head>
	<body>
		<div id="bg">
			<div><img src="img/sky.jpg" /></div>
			<div><img src="img/sky1.jpg" /></div>
			<div><img src="img/sky5.jpg" /></div>
		</div>
		<div id="user">
			<div class="name-head move">
				<a href="#"><img align="absmiddle" src="<?php echo $touxiang ?>" /></a>
				<h1><a class="des" href="#">咕嘟咕嘟冒泡泡</a></h1>
			</div>
			<div class="message move">
				<a href="#">私信</a>
				<a href="#">归档</a>
				<a href="#">RSS</a>
				<a href="#">搜索</a>
			</div>
		</div>
		<div id="bd" class="move">
			<a href="#"><img src="img/sky3.jpg" /></a>
			<div class="introd">
				<p>没有文字</p>
			</div>
			<div class="sign">
				<a href="#">2016-6-8</a>
				<a href="#">888</a>
			</div>
		</div>
		<div id="footer" class="animated bounceInDown">
			©&nbsp;
			<a href="#">咕嘟咕嘟冒泡泡</a>
			&nbsp;|&nbsp; Powered by
			<a href="#">LOFTER</a>
		</div>
		<script src="js/jquery.min-1.9.1.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			//			$(function(){
			//				var time=null;
			//				var n=0;
			//				var len=$("#bg div").length;
			//				time=setInterval(function(){
			//					n++;
			//					$("#bg div").eq(n).fadeIn(2000).siblings().fadeOut(2000);
			//					if(n>=len){
			//						n=0;
			//					}
			//				},3000)
			//			})
			(function() {
				var oimg = document.querySelectorAll("#bg div");
				var len = oimg.length;
				var time = null;
				var index = 0;
				time = setInterval(function() {
					//js兄弟元素的隐藏显现
					oimg[index].style.opacity = 0;
					index++;
					if(index >= len) {
						index = 0;
					}
					oimg[index].style.opacity = 1;
				}, 5000);
			})();
//			(function() {
//				var omove = document.querySelectorAll(".move");
//				var len = omove.length;
//				//console.log(len); //3
//				var speed = 3;
//				var time = null;
//				var time1 = null;
//				move(len - 1);
//
//				function move(index) {
//					time = setInterval(function() {
//						var end = 50 + (index * 240);
//						speed += 3;
//						var t = omove[index].offsetTop + speed;
//						if(t > end) {
//							t = end;
//							speed *= -0.4;
//						}
//						omove[index].style.top = t + "px";
//					}, 10);
//					time1 = setTimeout(function() {
//						clearInterval(time);
//						if(Math.abs(speed) < 1) {
//							speed = 0;
//						}
//						index--;
//						if(index < 0) {
//							index = 0;
//						}
//						move(index);
//					}, 1000)
//
//				}
				//				console.log(len);
				//				for(var i=0;i<len;i++){
				//					var t=(i*(i+2)*85)+50;
				//					omove[i].style.top=t+"px";
				//					omove[2].style.top=450+"px"
				//					omove[i].style.transition="0.6s "+i*1000+"ms";
				//				}
//			})();
		</script>
	</body>

</html>