<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />    
<?php
require_once("db.php");
if (!empty($_POST['sub'])){ 
$tel=$_POST['tel'];   
$regtime= date("Y-m-d H:i:s");    
$openid=$_GET["openid"]; 
$img=$_GET["img"];     

$sql1 = "select * from userinform  where openid='".$openid."'";
$result1= mysql_query($sql1);
while($row = mysql_fetch_array($result1))
  {
   $arr[]=$row;
  }	
   
  if (empty($openid)){
		
echo "<script language=javascript>alert('请使用微信登录!');window.window.location.href='https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx3aeb9feb2ebc6b5a&redirect_uri=http://59.175.144.103/test/user/register.php&response_type=code&scope=snsapi_userinfo&state=STATE&connect_redirect=1#wechat_redirect';</script>";	
	
}  
   if (isset($arr)){
    
echo "<script language=javascript>alert('您已经注册过啦！');window.window.location.href='home.php?openid=$openid';</script>";
    
    
    }else{
    
    
$sql2 = "insert  into userinform ( openid,tel,regtime,money) values ('$openid' , '$tel' ,'$regtime','0') ";    
$result2 = mysql_query($sql2);
echo "<script language=javascript>window.window.location.href='home.php?openid=$openid';</script>";
     
    
    }
    
}


?>