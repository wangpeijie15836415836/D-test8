<?php
	include "php/fun.php";
	if(!empty($_POST['mail_1'])){
		$username=trim($_POST['mail_1']);
		$password=trim($_POST['pass_1']);
		$pdo=mysqlInit("mysql", "localhost", "lofter", "root", "");
		$username=mysql_real_escape_string($username);
		$password=mysql_real_escape_string($password);
		$result=$pdo->query("select count(user_id) as total from user where username ='{$username}'");
		$row=$result->fetchAll(PDO::FETCH_ASSOC);
		if (preg_match(" /\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}/", $username)||preg_match("0?(13|14|15|18)[0-9]{9}", $username)||preg_match("/[1-9]([0-9]{5,11})/", $username)) { 
			if($row[0]['total']>0){
				error(1,"用户已存在","index.php");
			}
			else{
				$result=$pdo->exec("insert into user(username,password) values('{$username}','{$password}')");
			if($result){
				error(2,"注册成功","index.php");
			}
		   	else{
		        error(1, "注册失败","index.php");
		   	 	}
			}
		}
		 else { 
			error(1, "请填写正确格式","index.php");
		 } 
}
	//登录按钮
	if(!empty($_POST['mail_2'])){
		$pdo=mysqlInit("mysql","localhost","lofter","root","");
		$username=mysql_real_escape_string(trim($_POST['mail_2']));
		$password=mysql_real_escape_string(trim($_POST['pass_2']));
		$result=$pdo->query("select* from user where username='{$username}'");
		$row=$result->fetchAll(PDO::FETCH_ASSOC);
		if (preg_match(" /\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}/", $username)||preg_match("0?(13|14|15|18)[0-9]{9}", $username)||preg_match("/[1-9]([0-9]{5,11})/", $username)) {
			if(!empty($row[0]['user_id'])){	
			if($row[0]['password']==$password){
				session_start();
				$_SESSION['user']=$row[0];
				// print_r($_SESSION['user']);die;
				error(2, "登录成功","user.php");
			}
			else{
			error(1, "密码错误","index.php");
			}
		}
		else{
			error(1, "用户名错误","index.php");
		}			
		}
		else{
			error(1, "请填写正确格式","index.php");
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/base.css"/>
		<link rel="stylesheet" type="text/css" href="css/animate.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/swiper-3.4.2.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/css.css"/>
	</head>
	<body>
		<div id="content">
			<div class="header">
					<div class="swiper-container banner">
					    <div class="swiper-wrapper">
					        <div class="swiper-slide"><img src="img/banner.jpg"/></div>
					        <div class="swiper-slide"><img src="img/banner2.jpg"/></div>
					    </div>
					    <a href="##">
					    	<span>该作品来自:</span>
					    	<span>小米</span>
					    </a>
					    <div class="swiper-button-prev"></div>
					    <div class="swiper-button-next"></div>
					</div>
					
					<div class="header_tab">
					<img class="log_log" src="img/login-logo.png"/>	
		<div class="tab" id="tab">

			<div class="tab-nav j-tab-nav">

				<a href="javascript:void(0);" class="current">注册</a>

				<a href="javascript:void(0);" >登录</a>

				<a href="javascript:void(0);">下载APP</a>
			</div>
			<div class="tab-con">
				<div class="j-tab-con">
					<div class="tab-con-item" style="display:block;">	
						<div class="form1">
							<form class="from" action="index.php" method="post">
									<input class="inp" type="text" name="mail_1" id="mail_1" value="" placeholder="常见邮箱/网易邮箱" />
									<br />
									<input class="inp" type="password_1" name="pass_1" id="pass_1" value="" />
									<div class="hd">滑动验证</div>
									<input class="sbt_1" type="submit" value="注册"/>
							</form>
						</div>
						<span id="xian"></span>
						<span id="hou">或</span>
						<div id="zcx">
								<div><span>手机账号注册</span></div>
								<div><span>新浪微博注册</span></div>
								<div><span>腾讯qq注册</span></div>
								<div><span>微信注册</span></div>
						</div>
					</div>
					<div class="tab-con-item">
						<div class="form1">
							<form class="from" action="index.php" method="post">
									<input class="inp" type="text" name="mail_2" id="mail_2" value="" placeholder="常见邮箱/网易邮箱" />
									<br />
									<input class="inp" type="password" name="pass_2" id="pass_2" value="" />
									<div class="hd">滑动验证</div>
									<input class="sbt_2" type="submit" value="登录"/>
									<div class="check"><span class="sp1"><input type="checkbox" name="check" id="check" value="" /></span><label for="check">十天之内免登陆</label><a href="">忘记密码？</a><span class="sp2"></span><a href="#">找回账号</a></div>
							</form>
						</div>
						<span id="xian"></span>
						<span id="hou">或</span>
						<div id="zcx">
								<div><span>手机账号登录</span></div>
								<div><span>新浪微博登录</span></div>
								<div><span>腾讯qq登录</span></div>
								<div><span>微信登录</span></div>
						</div>
					</div>
					<div class="tab-con-item">
						<div class="app">
							<ul class="clearfix">
								<li>iphone版: <a href=""></a></li>
								<li>ipad版: 	<a href=""></a></li>
								<li>Android版: <a href=""></a></li>
							</ul>
							<img src="img/2dcode.png"/>
						</div>
					</div>		
				</div>
			</div>
		</div>
		</div>
			</div>
			<div class="content_t">
				<div class="content_t_1">
					<p>随性的记录方式</p>
					<p>方便地记录照片、文字、音乐、视频，适用于iPhone、iPad和Android移动客户端及PC端，
						<br />
让你随时随地的记录与分享。</p>
					<div class="jl"><img src="img/dashboard.jpg" alt="" /></div>
					<div class="js">
						<div class="js_l">
							<div></div>
							<div>自动同步</div>
							<div>方便同步你的内容到新浪微博、QQ空间等社交网络，还可以分享到微信、易信聊天和朋友圈。</div>
						</div>
						<div class="js_r">
							<div></div>
							<div>高质量图片</div>
							<div>使用无损图片压缩技术，上传图片保留高质量细节，当你手机处于wifi网络，将自动加载全高清图片。</div>
						</div>
					</div>
				</div>
				<div style="background-color: #F7F7F7;" class="content_t_1">
					<p>发现有共同爱好的人</p>
					<p>LOFTER汇聚了数百万的摄影、胶片玩家，绘画及动漫爱好者，并不断衍生出更多的兴趣圈子，无论是设计、
						<br />
艺术、科技、时尚、旅行、读书、电影评论都有精彩的人与内容不断产出。</p>
					<div class="jl"><img src="img/quanzi.jpg" alt="" /></div>
					<div class="js">
						<div class="js_l">
							<div style="background-position: -455px 0;"></div>
							<div>推荐算法</div>
							<div>通过你的喜欢、关注，标签的使用情况，推荐出更多你感兴趣的人与内容。</div>
						</div>
						<div class="js_r">
							<div style="background-position: -564px 0;"></div>
							<div>精彩话题</div>
							<div>任何人都可以发起与参与话题，征集作品发现有趣的人，还可以通过客户端参加有趣的贴纸话题。</div>
						</div>
					</div>
				</div>
				<div class="content_t_2">
					<div class="cont_2_p">
						<p>彰显个性的个人主页</p>
						<p>
已经拥有234套风格各异的个人主页模板，而且这些模板可以轻松的完成自定义样式及导航，
<br />
让你的个人主页变得与众不同，提供了10套移动端浏览器适配模板，当使用手机浏览器访问主页时，也如此优雅。</p>
					</div>
					<div id="swiper2">
						<div class="swiper-container case">
						    <div class="swiper-wrapper">
						        <div class="swiper-slide"><img src="img/blog-1 (1).jpg"/></div>
						        <div class="swiper-slide"><img src="img/blog-2.jpg"/></div>
						        <div class="swiper-slide"><img src="img/blog-3 (1).jpg"/></div>
						        <div class="swiper-slide"><img src="img/blog-4 (1).jpg"/></div>
                                <div class="swiper-slide"><img src="img/blog-5 (1).jpg"/></div>
						        <div class="swiper-slide"><img src="img/blog-6.jpg"/></div>
						        <div class="swiper-slide"><img src="img/blog-6.jpg"/></div>
						        <div class="swiper-slide"><img src="img/blog-5.jpg"/></div>
						        <div class="swiper-slide"><img src="img/blog-4 (1).jpg"/></div>
						        <div class="swiper-slide"><img src="img/blog-3.jpg"/></div>
						        <div class="swiper-slide"><img src="img/blog-2.jpg"/></div>
						        <div class="swiper-slide"><img src="img/blog-1 (1).jpg"/></div>
						    </div>
						</div>
					</div>
				</div>
				<div style="background-color: #F7F7F7;" class="content_t_1">
					<p>轻巧的移动LOFTER</p>
					<p>通过iPhone、iPad版及Android版客户端，体验LOFTER的快速、漂亮、有趣，提供多种时下最热的贴纸，
						<br />
让你的相片分享增加乐趣，还可以在移动端查看附近的人。
						<br />
						<a style="color: #7594b3;" href="##">马上下载 ></a>
					</p>
					<div class="jl"><img src="img/mobilelofter.jpg"/></div>
					<div class="js">
						<div class="js_l">
							<div style="background-position: -675px 0;"></div>
							<div>查找附近的同好</div>
							<div style="text-align: center;">通过移动端的定位功能，发现附近有趣的人。</div>
						</div>
						<div class="js_r">
							<div style="background-position: -785px 0;"></div>
							<div>独有的贴纸</div>
							<div>提供丰富、有趣、限量贴纸，参与贴纸类主题话题，让手机摄影更有趣、好玩。</div>
						</div>
					</div>
				</div>
				<div class="content_t_3">
					<div>LOFTER - 让兴趣，更有趣</div>
					<div>
						<a href="##">手机注册</a>
						<a href="##">新浪微博注册</a>
						<a href="##">腾讯qq注册</a>
						<a href="##">微信注册</a>
					</div>
				</div>
			</div>	
		</div>
		<div id="footer">
			<div>联系我们<span>|</span>招贤纳士<span>|</span>移动客户端<span>|</span>风格模板<span>|</span>官方博客</div>
			<div>网易公司版权所有　©1997-2017　<img src="img/icon-police.png"/>浙公网安备 33010002000017号ICP备：浙B2-20090185-5增值电信业务经营许可证：浙B2-20090185</div>
		</div>
		<div id="list">
			<div>
				<a href="##">手机注册</a>
				<a href="##">新浪微博注册</a>
				<a href="##">腾讯QQ注册</a>
				<a href="##">微信注册</a>
			</div>
		</div>
	</body>
	<script src="js/jquery-1.11.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/swiper.animate1.0.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/swiper.jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/swiper.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/my.js" type="text/javascript" charset="utf-8"></script>
</html>
