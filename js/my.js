$(document).ready(function () {
  var mySwiper1 = $(".banner").swiper({
    direction: 'horizontal',
    loop: true,
    freeMode : false,
    // 如果需要前进后退按钮
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
  })
  var h=$(window).height()+"px";
  var w=$(window).width()+"px";
$(".swiper-slide").css("height",h);
$(".swiper-slide>img").css("height",h);
$(".swiper-slide").css("width",w);
$(".swiper-slide>img").css("width",w);
	$.fn.rTabs = function(options){
		
		//默认值
		var defaultVal = {
			btnClass:'.j-tab-nav',	/*按钮的父级Class*/
			conClass:'.j-tab-con',	/*内容的父级Class*/
			bind:'hover',	/*事件参数 click,hover*/
			animation:'0',	/*动画方向 left,up,fadein,0 为无动画*/
			speed:300, 	/*动画运动速度*/
			delay:200,	/*Tab延迟速度*/
			auto:true,	/*是否开启自动运行 true,false*/
			autoSpeed:3000	/*自动运行速度*/
		};
		
		//全局变量
		var obj = $.extend(defaultVal, options),
			evt = obj.bind,
			btn = $(this).find(obj.btnClass),
			con = $(this).find(obj.conClass),
			anim = obj.animation,
			conWidth = con.width(),
			conHeight = con.height(),
			len = con.children().length,
			sw = len * conWidth,
			sh = len * conHeight,
			i = 0,
			len,t,timer;

		return this.each(function(){
			
			//判断动画方向
			function judgeAnim(){
				var w = i * conWidth,
					h = i * conHeight;
				btn.children().removeClass('current').eq(i).addClass('current');
				switch(anim){
					case '0':
					con.children().hide().eq(i).show();
					break;
					case 'left':
					con.css({position:'absolute',width:sw}).children().css({float:'left',display:'block'}).end().stop().animate({left:-w},obj.speed);
					break;
					case 'up':
					con.css({position:'absolute',height:sh}).children().css({display:'block'}).end().stop().animate({top:-h},obj.speed);
					break;
					case 'fadein':
					con.children().hide().eq(i).fadeIn();
					break;
				}
			}
			
			//判断事件类型
			if(evt == "hover"){
				btn.children().hover(function(){
					var j = $(this).index();
					function s(){
						i = j;
						judgeAnim();
					}
					timer=setTimeout(s,obj.delay);
				}, function(){
					clearTimeout(timer);
				})
			}else{
				btn.children().bind(evt,function(){
					i = $(this).index();
					judgeAnim();
				})
			}
			
			//自动运行
			function startRun(){
				t = setInterval(function(){
					i++;
					if(i>=len){
						switch(anim){
							case 'left':
							con.stop().css({left:conWidth});
							break;
							case 'up':
							con.stop().css({top:conHeight});
						}	
						i=0;
					}
					judgeAnim();
				},obj.autoSpeed)
			}
			
			//如果自动运行开启，调用自动运行函数
//			if(obj.auto){
//				$(this).hover(function(){
//					clearInterval(t);
//				},function(){
//					startRun();
//				})
//				startRun();
//			}
			
		})
		
	}
	$(function() {
	$("#tab").rTabs();
})
	var flg=true;
	
	$(".sp1").click(function(){
		if(flg){
			$(".check>span:nth-child(1)").addClass("spclick");
			flg=false;

		}
		else{
			$(".check>span:nth-child(1)").removeClass("spclick");
			flg=true;
		}
	});
//设置滚动显示：
//var h3=$(".content_t").height() + $(".header").height() - $(window).height() - $(".content_t_3").height();
var h3=$(document).height()-$(".content_t_3").height()-$("#footer").height();
//console.log(h3);
var h2=$(".header").height();	
$(document).scroll(function(){
var top=$(document).scrollTop();
	if(top>h2&&top<h3){
//		console.log(h2+"||"+h3);
//		$("#list").animate({height:"100px"},500);
			$("#list").addClass("slide");
	}
	else{
//		console.log(2);
		$("#list").removeClass("slide");
	}
})
	//第二个swiper
	  var mySwiper2 = $(".case").swiper({
    direction: 'horizontal',
    slidesPerView :2,
		spaceBetween : 50,
    freeMode : true,
    // 如果需要前进后退按钮
  })
//设置十天之内免登陆

})

