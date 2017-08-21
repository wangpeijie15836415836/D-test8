$(".list li").on("click",function(){
	$(this).addClass("active").siblings().removeClass("active");
	$(".list li").eq(5).removeClass("active");
});
$(".dian").on("mouseover",function(){
	$(".xiala").css({
		display:"block"
	});
});
$(".dian").on("mouseout",function(){
	$(".xiala").css({
		display:"none"
	});
});
	var box = document.getElementById("box");
	var goTop = 0;
	var time = null;
	//当浏览器窗口发生滚动时,触发事件
	window.onscroll = function(){
		//当浏览器窗口发生滚动时,不断获取当前滚动条距离浏览器顶部的距离
		goTop = document.documentElement.scrollTop||document.body.scrollTop;	
		//当浏览器窗口发生改变时，不断判断goTop的值
		if(goTop >= 200){
			box.style.display = 'block';
		}else{
			box.style.display = 'none';
		}
	}
	box.onclick = function(){
		var t=0;
		var maxT = 100;
		var start=goTop;
		var end=0;
		var change = end-start;
		time = setInterval(function(){
			t++;
			if(t>maxT){
				clearInterval(time);
			}
			document.documentElement.scrollTop = Tween.Bounce.easeOut(t,start,change,maxT);
			document.body.scrollTop = Tween.Bounce.easeOut(t,start,change,maxT);
		},10);
	}
$(".bot").on("mouseover",function(){
	$(".sanjiaoxing1").css({
		display:"block"
	});
	$(".sanjiaoxing2").css({
		display:"block"
	});
});
$(".bot").on("mouseout",function(){
	$(".sanjiaoxing1").css({
		display:"none"
	});
	$(".sanjiaoxing2").css({
		display:"none"
	});
});
