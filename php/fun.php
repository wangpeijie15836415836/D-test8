<?php
	function mysqlInit($dbms,$host,$dbname,$username,$password){
		$dsn="{$dbms}:host={$host};dbname={$dbname}";
		$pdo=new PDO($dsn,$username,$password);
		$pdo->query("set names utf8");
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
		return $pdo;
	}
	//跳转页面
	function error($type,$error=null,$url){
		$toerror="location:error.php?type={$type}";
		$toerror.=$error?"&error={$error}":"";
		$toerror.=$url?"&url={$url}":"";
		header($toerror);
	}


	// 检测登录状态
    function checkLogin(){
        session_start();
    	if(isset($_SESSION["user"])){
    	return true;
        }else{
    	return false;
       }
    }

    // 获取上传图片并返回图片的路径
    function imgUpload($file,$userId){

//      print_r($file);
//      判断是否是通过http请求上传的文件
        if(!is_uploaded_file($file["tmp_name"])){
            error(2,"请通过合法路径上传文件");
        }
//      判断上传文件的类型
        if(!in_array($file["type"], array("image/png","image/gif","image/jpeg"))){
            error(2,"请上传png、gif或jpg格式的图片");
        }
        $filePath = "file/";
        $imgPath = "{$userId}/".date("Y/md/",time());
//      "file/1/2017/0807x.jpg"
        $ext = strtolower(pathinfo($file["name"],PATHINFO_EXTENSION));//获取文件后缀名
//      var_dump($ext);
//      取当前时间的微秒数
        $img = uniqid().rand(1000, 9999);//存储的图片名称
//      echo $img;
//      判断指定的路径是否存在，若不存在则创建文件夹
        if(!is_dir($filePath.$imgPath)){
            mkdir($filePath.$imgPath,0777,true);
        }
        $uploadPath = $filePath.$imgPath.$img.".".$ext;
        $imgUrl="http://localhost/D-test8/".$uploadPath;
//      "file/1/2017/0807x.jpg"
//      将文件从临时目录移动到指定目录，若成功，提示操作成功，并跳转到user.php；若失败，提示操作失败
        if(move_uploaded_file($file["tmp_name"], $uploadPath)){
            return $imgUrl;
        }else{
            error(2,"操作失败,请重试");
        }
    }

    //获取页面url链接
    function getUrl($page){
         $url=$_SERVER["REQUEST_SCHEME"]."://";//http://;
         $url.=$_SERVER["HTTP_HOST"];//http://localhost
         $url.=$_SERVER["SCRIPT_NAME"];
         $queryString=$_SERVER["QUERY_STRING"];
         parse_str($queryString,$queryArr);
         // print_r($queryArr);die;
         if(isset($queryArr["page"])){
            unset($queryArr["page"]);
         }
         $queryArr["page"]=$page;

         $queryString=http_build_query($queryArr);//将数组转换为请求字符串name=abc&id=1&apge=12
         // echo $queryString;die;
         $url.="?".$queryString;
         return $url;

    }


	
	
?>