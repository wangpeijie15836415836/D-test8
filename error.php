<?php
	$type=isset($_GET['type'])&&in_array($_GET['type'],array(1,2))?$_GET['type']:2;
	$error=isset($_GET['error'])&&!empty($_GET['error'])?$_GET['error']:"操作失败";
	$url=isset($_GET['url'])&&!empty($_GET['url'])?$_GET['url']:null;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/base.css"/>
		<link rel="stylesheet" type="text/css" href="css/css.css"/>
	</head>
	<body>
		<div class="error">
		</div>
		<div class="error_cont">
			<span>
				X
			</span>
			<div class="news"><?php echo $error;?></div>
			<div class="error_img">
				<?php if($type==1):?>
				<img src="img/rhino.png"/>
				<?php elseif($type==2):?>
				<img src="img/bolt_jump.png" alt="" />
				<?php endif;?>
			</div>
		</div>
	</body>
		<script src="js/jquery-1.11.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
	$(function(){
		var time = 3;
		var url = "<?php echo $url;?>"||null;//js读取php变量
		setInterval(function(){
			if(time > 1){
				time--;
//				$("#time").html(time);
			}else{
//				$("#time").html("0");
				if(url){
					location.href = url;
				}else{
					history.go(-1);
				}
			}
		},1000)
	})	
		$('.error_cont>span').click(function(){
			location.href = "<?php echo $url;?>";
		})
		</script>
</html>
