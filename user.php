<?php 
    include_once "php/fun.php";
   
   if(!checkLogin()){
   	error(2,"请完成登录","index.php");
   }
   /*session_start();
   print_r($_SESSION['user']);*/

   $user=$_SESSION["user"]["username"];
   // echo $user;
   
   
   // 发布
   if(!empty($_POST["text-title"])){
   	$pdo=mysqlInit("mysql","localhost","lofter","root","");
   	$textTitle=mysql_real_escape_string(trim($_POST["text-title"]));
   	$textContent=mysql_real_escape_string(trim($_POST["text-content"]));
   	$userId=$_SESSION["user"]["user_id"];
    // echo $textContent;die;
   	$result = $pdo->query("select count(publish_id) as total from publish where texttitle='{$textTitle}'");
		$row = $result->fetchAll(PDO::FETCH_ASSOC);

	if($row[0]["total"] > 0){
			error(2,"文本已存在，请重新输入");exit;
		}
  

   
    $result=$pdo->exec("insert into publish(texttitle,textcontent,user_id) values('{$textTitle}','{$textContent}','{$userId}')");
 }
   

   // 图片发布
 if(!empty($_FILES["file"])){
   $pdo=mysqlInit("mysql","localhost","lofter","root","");
   $userId=$_SESSION["user"]["user_id"];
   $file=$_FILES["file"];
   // print_r($file);
   $pic=imgUpLoad($file,$userId);
   // echo $pic;die;
   $result=$pdo->exec("insert into publish (user_id,pic) values('{$userId}','{$pic}')");
 }
 // echo empty($_FILES["file"]);
   

   

   $pdo=mysqlInit("mysql","localhost","lofter","root","");
   $userId=$_SESSION["user"]["user_id"];
   // echo $userId;
   $result=$pdo->query("select publish_id,texttitle,textcontent,pic from publish where user_id='{$userId}' order by publish_id DESC");
   $publish=$result->fetchAll(PDO::FETCH_ASSOC);
   // print_r($publish);die;
   $result=$pdo->query("select img,articletitle,articlecontent from article where user_id='{$userId}' order by article_id DESC");
   $article=$result->fetchAll(PDO::FETCH_ASSOC);



  // 头像获取
   $result=$pdo->query("select touxiang from user where user_id='{$userId}'");
   $touxiang=$result->fetchAll(PDO::FETCH_ASSOC);
   $touxiang=$touxiang[0]['touxiang'];
   // print_r($touxiang);







   /*$result=$pdo->query("select publish_id,texttitle,textcontent,pic from publish where user_id='{$userId}'");
   $publish=$result->fetchAll(PDO::FETCH_ASSOC);*/
 ?>



 <!DOCTYPE html>
<html>
	<head>		
		<meta charset="UTF-8">
		<title>LOFTER(乐乎)-让兴趣，更有趣</title>
		<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
        <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/base.css"/>
		<link rel="stylesheet" type="text/css" href="css/index-index.css"/>
		<link rel="stylesheet" href="css/user.css">
	    <link rel="stylesheet" href="font/demo.css">
	    <link rel="stylesheet" href="font/iconfont.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <style>
            .text-con-title{
            	font-size: 16px;
            	font-weight: bold;
            }
            .text-cen p{
            	margin-top: 10px;
            }
            .text-cen img{
            	max-width: 500px;
            }
            .contener-right{
					width: 230px;
				    height: 239px;
				    margin-top: 25px;
				    position: absolute;
				    left: 1187px;
    				top: 79px;
				}
        </style>
	</head>
	<body>
		<!--头部-->
		<div class="header">
			<div class="hrader-center clearfix">
				<div class="left fl">
					<h1>
						<a href="index-index.html"><img src="img/logo.png"/></a>
					</h1>
				</div>
				<div class="right fr clearfix">
					<ul class="list fl clearfix">
						<li class="fl active"><a href="index-index.html">首页</a></li>
						<li class="fl"><a href="browser.html">浏览</a></li>
						<li class="fl"><a href="#">APP</a></li>
						<li class="fl"><a href="#">ART</a></li>
						<li class="fl"><a href="#">摄影课堂</a></li>
						<li class="fr dian"><a href="#">更多<span class="glyphicon glyphicon-triangle-bottom xsj"></span></a>
							<ul class="xiala clearfix">
								<li>
									<span class="fl">
										<div class="glyphicon glyphicon-cog"></div>
									</span>
									<span class="fl"><a href="#">更多设置</a></span>
								</li>
								<li>
									<span class="fl">
										<div class="glyphicon glyphicon-eye-open"></div>
									</span>
									<span class="fl"><a href="#">寻找好友</a></span>
								</li>
								<li>
									<span class="fl">
										<div class="glyphicon glyphicon-folder-open"></div>
									</span>
									<span class="fl"><a href="#">导入导出</a></span>
								</li>
								<li>
									<span class="fl">
										<div class="glyphicon glyphicon-phone-alt"></div>
									</span>
									<span class="fl"><a href="#">移动客户端</a></span>
								</li>
								<li>
									<span class="fl">
										<div class="glyphicon glyphicon-camera"></div>
									</span>
									<span class="fl"><a href="#">LOFTCam-用心创造滤镜</a></span>
								</li>
								<li>
									<span class="fl">
										<div class="glyphicon glyphicon-blackboard"></div>
									</span>
									<span class="fl"><a href="#">UAPP-创建个人应用</a></span>
								</li>
								<li>
									<span class="fl">
										<div class="glyphicon glyphicon-compressed"></div>
									</span>
									<span class="fl"><a href="#">帮助及反馈</a></span>
								</li>
								<li>
									<span class="fl">
										<div class="glyphicon glyphicon-send"></div>
									</span>
									<span class="fl"><a href="login_out.php">退出</a></span>
								</li>
							</ul>
						</li>
					</ul>
					<div class="nav fr clearfix">
						<div class="ssch fl">
							<input class="xtag" type="text"placeholder="请输入您要搜索的内容..." >
								<a href="#" class="glyphicon glyphicon-search"></a>
							</input>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--contener部分-->
		<div class="content clearfix">
        <div id="publishArea">
		<ul class="publishBar">
			<li id="user"><img src="<?php echo $touxiang ?>" alt="" width="110px" height="110px"></li>
			<!--http://localhost/userloginok/file/599a7afa56b539214.jpg-->
			<li id="publish-text"></li>
			<li id="publish-pic"></li>
			<li id="publish-music"></li>
			<li id="publish-video"></li>
			<li id="publish-article"></li>
		</ul>
		 <div class="none"><input type="file" id="_t" name="touxiang"></div>
		<div id="chushi">
			<div class="user-big"><img src="<?php echo $touxiang ?>" alt=""></div>
			<div class="box-head"></div>
			<div class="box"></div>
		</div>
            <!-- 文字发布 -->
        <div id="zuizhong">
            <div class="box">
            	<div class="box-head"></div>
            	<div class="box-body">
            		<div class="box-body-content">
            			<div class="ztxt">凌雁飞鸿</div>
            			<form name="form" id="text-form" action="user.php" method="post"
                  enctype="multipart/form-data">
            			<div class="textTitle">
            			    <input type="text" maxlength="50" placeholder="标题（可不填）" name="text-title">
            			</div>
            			<div class="textarea">
            			 <div class="textbar">
            			  <ul class="txtbar">
            			   <li class="bold"></li>
            			   <li class="underline"></li>
            			   <li class="line-through"></li>
            			   <li class="ul"></li>
            			   <li class="ol"></li>
            			   <li class="yinyong"></li>
            			   <li class="hyperlink"></li>
            			   <li class="nolink"></li>
            			   <li class="html"></li>
            			   <li class="picture"></li>
            			  </ul>
            			  <div class="allsc"></div>
            			 </div>
            			 <div class="textcontent"><textarea name="text-content" id="" cols="30" rows="10"></textarea></div>
            			</div>
            			<div class="actionBar">
            			 <div class="publishArea">
            			  <div id="publishBtn">
            			   <span><button type="submit" id="userSubmit">发&nbsp;&nbsp;&nbsp;布</button></span>
            			            					</div>
            			            					</form>
            					<div class="publishType">
            						<i class="iconfont icon-xiajiantou"></i>
            						<div class="case">
            							<ul>
            								<li>现在发布</li>
            								<li>自动发布</li>
            								<li>定时发布</li>
            								<li>保存为草稿</li>
            								<li>仅自己可见</li>
            							</ul>
            						</div>
            					</div>
            				</div>
            				<div class="previewBtn">
            					<span>预&nbsp;&nbsp;&nbsp;览</span>
            				</div>
            				<div class="cancleBtn">
            					<span>取&nbsp;&nbsp;&nbsp;消</span>
            				</div>
            			</div>
            		</div>
            	</div>
            </div>
        </div>
        <!-- 图片发布 -->
        <div id="zuizhong-pic">
            <div class="box">
                  <div class="box-head"></div>
                  <div class="box-body">
                        <div class="box-body-content">
                              <div class="ztxt">凌雁飞鸿</div>
                              <form name="form" id="text-form" action="user.php" method="post"
                  enctype="multipart/form-data"><div class="zuizhong-pic-main">
                  
                                                                  <i class="iconfont icon-tianjiatupian"></i>
                                                                  <p>添加一张图片</p>
                                                            </div>
                                                            <div class="none"><input type="file" id="_f" name="file"></div>
                                                            <div class="actionBar">
                                                                  <div class="publishArea">
                                                                        <div id="publishBtn">
                                                                              <span><button type="submit" id="userSubmit">发&nbsp;&nbsp;&nbsp;布</button></span>
                                                                        </div></form>
                                          <div class="publishType">
                                                <i class="iconfont icon-xiajiantou"></i>
                                                <div class="case">
            							            <ul>
            								          <li>现在发布</li>
            								          <li>自动发布</li>
            								          <li>定时发布</li>
            								          <li>保存为草稿</li>
            								          <li>仅自己可见</li>
            							            </ul>
            						            </div>
                                          </div>
                                    </div>
                                    <div class="previewBtn">
                                          <span>预&nbsp;&nbsp;&nbsp;览</span>
                                    </div>
                                    <div class="cancleBtn">
                                          <span>取&nbsp;&nbsp;&nbsp;消</span>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
        </div>
       
       <!-- 音乐发布 -->
       <div id="zuizhong-music">
            <div class="box">
                  <div class="box-head"></div>
                  <div class="box-body">
                        <div class="box-body-content">
                              <div class="ztxt">凌雁飞鸿</div>
                              <div class="zuizhong-pic-main">
                                    <i class="iconfont icon-tianjiayinle"></i>
                                    <p>添加音乐</p>
                              </div>
                              <div class="none"><input type="file" id="_f"></div>
                              <div class="actionBar">
                                    <div class="publishArea">
                                          <div id="publishBtn">
                                                <span><button type="submit" id="userSubmit">发&nbsp;&nbsp;&nbsp;布</button></span>
                                          </div>
                                          <div class="publishType">
                                                <i class="iconfont icon-xiajiantou"></i>
                                                <div class="case">
            							            <ul>
            								          <li>现在发布</li>
            								          <li>自动发布</li>
            								          <li>定时发布</li>
            								          <li>保存为草稿</li>
            								          <li>仅自己可见</li>
            							            </ul>
            						            </div>
                                          </div>
                                    </div>
                                    <div class="previewBtn">
                                          <span>预&nbsp;&nbsp;&nbsp;览</span>
                                    </div>
                                    <div class="cancleBtn">
                                          <span>取&nbsp;&nbsp;&nbsp;消</span>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
        </div>

        <!-- 视频发布 -->
        <div id="zuizhong-video">
            <div class="box">
                  <div class="box-head"></div>
                  <div class="box-body">
                        <div class="box-body-content">
                              <div class="ztxt">凌雁飞鸿</div>
                              <div class="zuizhong-pic-main">
                                    <i class="iconfont icon-tianjiashipin"></i>
                                    <p>添加视频</p>
                              </div>
                              <div class="none"><input type="file" id="_f"></div>
                              <div class="actionBar">
                                    <div class="publishArea">
                                          <div id="publishBtn">
                                                <span><button type="submit" id="userSubmit">发&nbsp;&nbsp;&nbsp;布</button></span>
                                          </div>
                                          <div class="publishType">
                                                <i class="iconfont icon-xiajiantou"></i>
                                                <div class="case">
            							            <ul>
            								          <li>现在发布</li>
            								          <li>自动发布</li>
            								          <li>定时发布</li>
            								          <li>保存为草稿</li>
            								          <li>仅自己可见</li>
            							            </ul>
            						            </div>
                                          </div>
                                    </div>
                                    <div class="previewBtn">
                                          <span>预&nbsp;&nbsp;&nbsp;览</span>
                                    </div>
                                    <div class="cancleBtn">
                                          <span>取&nbsp;&nbsp;&nbsp;消</span>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
        </div>

	</div>
	<!--左边内容-->
			<div class="contener-left fl">
				<ul>
				<?php foreach($publish as $v): ?>
                    <li>
                    
					<div class="mylist clearfix textList" style="margin-top: 60px;">
							<div class="con fr">
								<div class="top-my"></div>
								<div class="bot clearfix fr">
									<div class="cen text-cen clearfix">
									<h2 class="text-con-title"><?php echo $v["texttitle"]?></h2>
										<p><?php echo $v["textcontent"]?></p>
										<img src="<?php echo $v["pic"] ?>" alt=""> 
									</div>
									<div class="bottom">
										<div class="b-r clearfix">
											<ul>
												<li><a href="#">编辑</a></li>
												<li><a href="delete.php?publishId=<?php echo $v["publish_id"] ?>">删除</a></li>
												<li><a href="#">评论</a></li>
												<li><a href="#">分享</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
				</li>
				<?php endforeach ?>

            <?php foreach($article as $v): ?>
                    <li>
                    
               <div class="mylist clearfix textList" style="margin-top: 60px;">
                     <div class="con fr">
                        <div class="top-my"></div>
                        <div class="bot clearfix fr">
                           <div class="cen text-cen clearfix">
                              <img src="<?php echo $v["img"] ?>" alt="" class="fengmian">
                              <h1 class="article-title"><?php echo $v["articletitle"]?></h1>
                              <p class="author">作者：<?php echo $user ?></p>
                           </div>
                           <div class="bottom">
                              <div class="b-r clearfix">
                                 <ul>
                                    <li><a href="#">编辑</a></li>
                                    <li><a href="delete.php?publishId=<?php echo $v["publish_id"] ?>">删除</a></li>
                                    <li><a href="#">评论</a></li>
                                    <li><a href="#">分享</a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
            </li>
            <?php endforeach ?>


			<!--右边部分-->
			<div class="contener-right ">
				<div class="one clearfix">
					<div class="one-l fl">
						<div class="txt">
							<a href="#"><p><?php echo $user ?></p></a>
							<a href="#"><p><?php echo $user ?></p></a>
						</div>
					</div>
					<div class="one-r fr">
						<div class=" glyphicon glyphicon-triangle-bottom sanjiao"></div>
						<div class="xiala2">
							<div class="glyphicon glyphicon-triangle-top shangsanjiao"></div>
							<div>
								<span class="glyphicon glyphicon-plus fl"></span>
								<span class="fl"><a href="#">创建个人主页</a></span>
							</div>
						</div>
					</div>
				</div>
				<div class="L-list">
					<ul>
						<li>
							<span class="fl">
								<div class="glyphicon glyphicon-book"></div>
							</span>
							<span class="fl"><a href="#">文章</a></span>
							<span class="fr"><a href="#">10</a></span>
						</li>
						<li>
							<span class="fl">
								<div class="glyphicon glyphicon-heart-empty"></div>
							</span>
							<span class="fl"><a href="#">喜欢</a></span>
							<span class="fr"><a href="#">10</a></span>
						</li>
						<li>
							<span class="fl">
								<div class="glyphicon glyphicon-tasks"></div>
							</span>
							<span class="fl"><a href="#">关注</a></span>
							<span class="fr"><a href="#">10</a></span>
						</li>
						<li>
							<span class="fl">
								<div class="glyphicon glyphicon-envelope"></div>
							</span>
							<span class="fl"><a href="#">私信</a></span>
							<span class="fr"><a href="#">10</a></span>
						</li>
						<li>
							<span class="fl">
								<div class="glyphicon glyphicon-wrench"></div>
							</span>
							<span class="fl"><a href="Personhomepage.php">个人中心</a></span>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!--分页部分-->
			<div class="page-nav">
       			<ul class="clearfix">
		            <li><a href="#">首页</a></li>
		            <li><a href="#">上一页</a></li>
		            <li><span class="curr-page">1</span></li>
		            <li><a href="#">2</a></li>
		            <li><a href="#">3</a></li>
		            <li><a href="#">4</a></li>
		            <li><a href="#">5</a></li>
		            <li>...</li>
		            <li><a href="#">98</a></li>
		            <li><a href="#">99</a></li>
		            <li><a href="#">下一页</a></li>
		            <li><a href="#">尾页</a></li>
		        </ul>
    	</div>
    	<div id="box">返回顶部</div>
    	<div id="mengceng"></div>
		<script src="js/jquery-1.8.3.min.js" type="text/javascript" charset="utf-8"></script>
		<!-- 最新的 Bootstrap 核心 JavaScript 文件
		<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
		<script src="js/tween.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/index-index.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/user.js"></script>
        <script src="js/iconfont.js"></script>
        <script>
    /*function createText(){
	$textLi=$('<li class="text"><div class="mylist clearfix"><div class="con fr"><div class="top-my"></div><div class="bot clearfix fr"><div class="cen text-cen clearfix"><h2 class="text-con-title"></h2><p></p></div><div class="bottom"><div class="b-r clearfix"><ul><li><a href="#">编辑</a></li><li><a href="#">删除</a></li><li><a href="#">评论</a></li><li><a href="#">分享</a></li></ul></div></div></div></div></div></li>');
	// console.log($textLi);
	$(".main-contener")[0].prepend($textLi[0]);
	// console.log(a);
}
$("#zuizhong #userSubmit").on("click",function(){
	console.log(1);
	createText();
})*/
        </script>
	</body>
</html>
