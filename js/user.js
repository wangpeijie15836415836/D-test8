
// 文字
$("#publish-text").on("click",function(){
	$("#mengceng").show();
	$(".publishBar").css({
		"opacity":0,
		"display":"none"
	});
	$("#chushi").removeClass("fadeOut animated");
	$("#chushi").addClass("fadeIn animated");
	$(".user-big img").removeClass("scale2");
	$(".user-big img").addClass("scale1");
	setTimeout(function(){
		$("#zuizhong").removeClass("fadeOut");
		$("#zuizhong").show();
	    $("#zuizhong").addClass("fadeIn animated");
},2000)
	
});
$(".cancleBtn").on("click",function(){
	setTimeout(function(){
        $('#zuizhong').removeClass('fadeIn');
        $("#zuizhong").addClass("fadeOut animated");
        
    }, 500);
	$(".user-big img").removeClass("scale1");
	$(".user-big img").addClass("scale2");
	setTimeout(function(){
		$("#zuizhong").hide();
        $('#chushi').removeClass('fadeIn');
	    $("#chushi").addClass("fadeOut");
    }, 2000);
    setTimeout(function(){
    	$("#mengceng").hide();
    },2000);
    setTimeout(function(){
    	$(".publishBar").css({
		"opacity":1,
		"display":"block"
	});
    },2000);
    
	})

// 富文本
$(".bold").toggle(
	function(){$(".textcontent textarea").css("font-weight","bold");$(this).addClass("bold-active")},
	function(){$(".textcontent textarea").css("font-weight","normal");$(this).removeClass("bold-active")}
	)
$(".underline").toggle(
    function(){$(".textcontent textarea").css("text-decoration","underline");$(this).addClass("underline-active")},
	function(){$(".textcontent textarea").css("text-decoration","none");$(this).removeClass("underline-active")}
	)
$(".line-through").toggle(
    function(){$(".textcontent textarea").css("text-decoration","line-through");$(this).addClass("line-through-active")},
	function(){$(".textcontent textarea").css("font-weight","none");$(this).removeClass("line-through-active")}
	)
$(".ul").toggle(
    function(){$(this).addClass("ul-active")},
	function(){$(this).removeClass("ul-active")}
	)
$(".ol").toggle(
    function(){$(this).addClass("ol-active")},
	function(){$(this).removeClass("ol-active")}
	)
$(".yinyong").toggle(
    function(){$(this).addClass("yinyong-active")},
	function(){$(this).removeClass("yinyong-active")}
	)
$(".hyperlink").toggle(
    function(){$(this).addClass("hyperlink-active")},
	function(){$(this).removeClass("hyperlink-active")}
	)
$(".nolink").toggle(
    function(){$(this).addClass("nolink-active")},
	function(){$(this).removeClass("nolink-active")}
	)
$(".html").toggle(
    function(){$(this).addClass("html-active")},
	function(){$(this).removeClass("html-active")}
	)
$(".picture").click(function(){
	$("#_f").click();
})
$(".hyperlink").click(function(){
	$("#_f").click();
});
//标题文字
$(".textTitle input").bind("input",function(){
	$(".textTitle label").hide();
})


// 图片
$("#publish-pic").on("click",function(){
	$("#mengceng").show();
	$(".publishBar").css({
		"opacity":0,
		"display":"none"
	});
	$("#chushi").removeClass("fadeOut animated");
	$("#chushi").addClass("fadeIn animated");
	$(".user-big img").removeClass("scale2");
	$(".user-big img").addClass("scale1");
	setTimeout(function(){
		$("#zuizhong-pic").removeClass("fadeOut");
		$("#zuizhong-pic").show();
	    $("#zuizhong-pic").addClass("fadeIn animated");
},2000)
	
});
$(".cancleBtn").on("click",function(){
	setTimeout(function(){
        $('#zuizhong-pic').removeClass('fadeIn');
        $("#zuizhong-pic").addClass("fadeOut animated");
        
    }, 500);

	$(".user-big img").removeClass("scale1");
	$(".user-big img").addClass("scale2");
	setTimeout(function(){
		$("#zuizhong-pic").hide();
        $('#chushi').removeClass('fadeIn');
	    $("#chushi").addClass("fadeOut");
    }, 2000);
    setTimeout(function(){
    	$("#mengceng").hide();
    },2000);
    setTimeout(function(){
    	$(".publishBar").css({
		"opacity":1,
		"display":"block"
	});
    },2000);
    
	})
$("#zuizhong-pic .zuizhong-pic-main").click(function(){
	$("#_f").click();
})
//音乐
$("#publish-music").on("click",function(){
	$("#mengceng").show();
	$(".publishBar").css({
		"opacity":0,
		"display":"none"
	});
	$("#chushi").removeClass("fadeOut animated");
	$("#chushi").addClass("fadeIn animated");
	$(".user-big img").removeClass("scale2");
	$(".user-big img").addClass("scale1");
	setTimeout(function(){
		$("#zuizhong-music").removeClass("fadeOut");
		$("#zuizhong-music").show();
	    $("#zuizhong-music").addClass("fadeIn animated");
},2000)
	
});
$(".cancleBtn").on("click",function(){
	setTimeout(function(){
        $('#zuizhong-music').removeClass('fadeIn');
        $("#zuizhong-music").addClass("fadeOut animated");
        
    }, 500);

	$(".user-big img").removeClass("scale1");
	$(".user-big img").addClass("scale2");
	setTimeout(function(){
		$("#zuizhong-music").hide();
        $('#chushi').removeClass('fadeIn');
	    $("#chushi").addClass("fadeOut");
    }, 2000);
    setTimeout(function(){
    	$("#mengceng").hide();
    },2000);
    setTimeout(function(){
    	$(".publishBar").css({
		"opacity":1,
		"display":"block"
	});
    },2000);
    
	})
$("#zuizhong-music .zuizhong-pic-main").click(function(){
	$("#_f").click();
})
//视频
$("#publish-video").on("click",function(){
	$("#mengceng").show();
	$(".publishBar").css({
		"opacity":0,
		"display":"none"
	});
	$("#chushi").removeClass("fadeOut animated");
	$("#chushi").addClass("fadeIn animated");
	$(".user-big img").removeClass("scale2");
	$(".user-big img").addClass("scale1");
	setTimeout(function(){
		$("#zuizhong-video").removeClass("fadeOut");
		$("#zuizhong-video").show();
	    $("#zuizhong-video").addClass("fadeIn animated");
},2000)
	
});
$(".cancleBtn").on("click",function(){
	setTimeout(function(){
        $('#zuizhong-video').removeClass('fadeIn');
        $("#zuizhong-video").addClass("fadeOut animated");
        
    }, 500);

	$(".user-big img").removeClass("scale1");
	$(".user-big img").addClass("scale2");
	setTimeout(function(){
		$("#zuizhong-video").hide();
        $('#chushi').removeClass('fadeIn');
	    $("#chushi").addClass("fadeOut");
    }, 2000);
    setTimeout(function(){
    	$("#mengceng").hide();
    },2000);
    setTimeout(function(){
    	$(".publishBar").css({
		"opacity":1,
		"display":"block"
	});
    },2000);
    
	})
$("#zuizhong-video .zuizhong-pic-main").click(function(){
	$("#_f").click();
})

// 长文发布
$("#publish-article").on("click",function(){
	window.location.href="long.php";
})

//蒙层
var mengHeight=$(document).height();
$("#mengceng").css("height",mengHeight);

//case
$(".publishType").toggle(
   function(){$(".case").show()},
   function(){$(".case").hide()}
	)


// 文字发布
/*function createText(){
	$textLi=$('<li class="text"><div class="mylist clearfix"><div class="con fr"><div class="top-my"></div><div class="bot clearfix fr"><div class="cen text-cen clearfix"><h2 class="text-con-title"></h2><p></p></div><div class="bottom"><div class="b-r clearfix"><ul><li><a href="#">编辑</a></li><li><a href="#">删除</a></li><li><a href="#">评论</a></li><li><a href="#">分享</a></li></ul></div></div></div></div></div></li>');
	// console.log($textLi);
	$(".main-contener")[0].prepend($textLi[0]);
	// console.log(a);
}
$("#zuizhong #userSubmit").click(function(){
	// console.log(1);
	$(".cancleBtn").click();
    createText();
})*/

// 头像
$("#user").on("click",function(){
	$("#_t").click();
});

function getObjectURL(file) {
 var url = null ;
 if (window.createObjectURL!=undefined) { // basic
 url = window.createObjectURL(file) ;
 } else if (window.URL!=undefined) { // mozilla(firefox)
 url = window.URL.createObjectURL(file) ;
 } else if (window.webkitURL!=undefined) { // webkit or chrome
 url = window.webkitURL.createObjectURL(file) ;
 }
 return url ;
}

/*$("#_t").change(function(){
 // var eImg = $('<img src="<?php echo $touxiang ?>" />');
 $("#user img").attr('src', getObjectURL($(this)[0].files[0]));
 // eImg.attr('src', getObjectURL($(this)[0].files[0]));
 // $("#user a").append(eImg);
 $("#user img").css({
 	"width":"110px",
 	"height":"110px"
 });
 
})*/

$("#_t").change(function(){
	var eImg = new Image();
 	eImg.src = getObjectURL($(this)[0].files[0]); 	
	$("#user img").attr('src',getObjectURL($(this)[0].files[0]));//加上不需要刷新图片
    
 	var canvas = document.createElement("canvas");
 	var cxt = canvas.getContext("2d");
 	eImg.onload = function(){
        cxt.drawImage(eImg, 0, 0, eImg.width, eImg.height, 0, 0, canvas.width, canvas.height);
        var src = canvas.toDataURL("image/jpeg");
        // console.log(src);
        $.ajax({
        	url: 'php/img.php',
        	type: 'post',
        	data: {
        		act:"pic",
        		imgSrc:src
        	}, 
        	success:function(data){
              console.log(data);
        	},
        	error:function(xhr,textStues){
			console.log(textStues);
		}
        })
        
    }
});


$("#_f").change(function(){
 var eImg = $('<img />');
 eImg.attr('src', getObjectURL($(this)[0].files[0]));
 $(".zuizhong-pic-main").prepend(eImg);
 // console.log(eImg[0]);
 $(".zuizhong-pic-main img").css({
 	"width":"500px",
 	"height":"312px"
 })
 $(".zuizhong-pic-main i").hide();
 $(".zuizhong-pic-main p").hide();
 // $("zuizhong-pic-main p").hide();
});





