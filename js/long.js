$(".long-meng").on("click",function(){
	$("#_f").click();
})


$("#biaoti").bind("input propertychange",function(){
	$(".right li").eq(3).css("background","#97cc00");
	// console.log($("#biaoti").val().length);
	if($("#biaoti").val().length==0){
		$(".right li").eq(3).css("background","#ddd");
	}
})


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

$("#_f").change(function(){
	console.log(1);
 var eImg = $('<img />');
 eImg.attr('src', getObjectURL($(this)[0].files[0]));
 $(".img-container2").append(eImg);
 $(".img-container2 img").css({
 	"width":"630px",
 	"height":"200px"
 });
 $(".long-pic").css("height","200px");
 $(".long-meng").hide();
})


