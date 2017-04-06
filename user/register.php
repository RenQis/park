<?php
error_reporting(0);
$code=$_GET["code"];
$url='https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx3aeb9feb2ebc6b5a&secret=a913d19b980aab4771f041546cf17ed9&code='.$code.'&grant_type=authorization_code';
$data=file_get_contents($url);
$arr = json_decode($data,true);
$access_token=$arr['access_token'];
$openid=$arr['openid'];
$userinfo='https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token.'&openid='.$openid.'&lang=zh_CN';
$user=file_get_contents($userinfo);
$json = json_decode($user,true);
$nickname=$json['nickname'];
$city=$json['city'];
$headimgurl=$json['headimgurl'];
$headimgurl2=str_replace("/0", "/64",$headimgurl);
$ranknum=rand(100000,999999);
$regtime= date("Y-m-d H:i:s"); 
require_once("db.php");
$sql1 = "select * from userinform where openid='".$openid."'";
$result1 = mysql_query($sql1);
while($row1 = mysql_fetch_array($result1))
  {
   $arr1[]=$row1;
  }	

if(isset($arr1))
{
    
echo "<script language=javascript>;window.window.location.href='home.php?openid=$openid';</script>";
}

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>会员注册</title>
</head>
<body>
<head>
    <title>会员注册</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
	<link rel="stylesheet" href="../css/weui.css" />  
    <link rel="stylesheet" href="../css/weui.min.css" /> 
    <link rel="stylesheet" href="../css/example.css" />
</head>
<script language="javascript"> 

function check() 
{  
if (document.myform.tel.value.length == 0) {  
alert("请输入您的手机号!"); 
document.myform.tel.focus(); 
return false; 
}    
if (document.myform.code.value !=<?php echo $ranknum;?> ) {  
alert("验证码错误!"); 
document.myform.code.focus(); 
return false; 
}    
return true; 
}
function dogetcode() 
{ 
    if (document.myform.tel.value.length == 0) {  
    alert("请输入您的手机号!"); 
    document.myform.tel.focus();
    return false;
    }
    alert("验证码已发送，请及时输入!"); 
    $.ajax({
        type: "POST",
        url: "vercode.php",
        dataType: "json",
        async: false,
        data: {"telphone":$("#tel").val(),"ranknum":<?php echo $ranknum;?>}
    });
}
</script> 

<div class="page">    
<div class="container">
 <form id="myform" name="myform" action="apply.php?openid=<?php echo $openid;?>" method="post"  data-ajax="false" onsubmit = "return check();" class="weui_cells weui_cells_form">                       
		 
		 <br />
		 <br />
		 <br />
		 <div class="weui_cell">
         <div class="weui_cell_hd">
            <label class="weui_label" for="tel">
                手机
            </label>
        </div>
        <div class="weui_cell_bd weui_cell_primary">
            <input class="weui_input" data-transition="none" name="tel" id="tel" placeholder="请输入您的手机号" value="" type="tel">
        </div>
        </div>
		<br />
		<br />

        <div class="weui-cell">
        <div class="weui_cell_hd">
            <label class="weui_label" for="code">
                验证码
            </label>
        </div>
            <div class="weui_cell_bd weui_cell_primary">
            <input class="weui_input" data-transition="none" name="code" id="code" placeholder="" value="" type="number">
            </div>
            <div class="weui_cell_ft">
            <input class="weui_btn weui_btn_plain_default" name="getcode" id="getcode" type="button" value="获取验证码" onclick="dogetcode()">
            </div>
        </div>
		<br />
		<br />
		<br />


        <input class="weui_btn weui_btn_primary" name="sub" id="sub" type="submit" value="注册">
 </form>    
    </div>
		    
</div>    
</body>
</html>