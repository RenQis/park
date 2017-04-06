<?php
require_once("db.php");
$openid=$_GET["openid"]; 
$sql1 = "select * from userinform  where openid='".$openid."'";
$result1= mysql_query($sql1);
$row1 = mysql_fetch_array($result1);
$tel=$row1['tel'];
$leftmoney=$row1['money'];
         
?> 
<head>
    <title>中山公园会员中心</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://lib.sinaapp.com/js/jquery-mobile/1.3.1/jquery.mobile-1.3.1.min.css" /> 
	<link rel="stylesheet" href="/css/style.css" /> 
	<script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"> </script> 
	<script src="http://lib.sinaapp.com/js/jquery-mobile/1.3.1/jquery.mobile-1.3.1.min.js"> </script> 
</head>
<script type="text/javascript">
    
function onBridgeReady(){
 WeixinJSBridge.call('hideOptionMenu');
}

if (typeof WeixinJSBridge == "undefined"){
    if( document.addEventListener ){
        document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
    }else if (document.attachEvent){
        document.attachEvent('WeixinJSBridgeReady', onBridgeReady); 
        document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
    }
}else{
    onBridgeReady();
}
    
</script>

  <!-- Home -->
<div data-role="page" id="page1" data-ajax="false" data-fullscreen="false">
	 <div data-role="fieldcontain">
            <label for="num" >
                会员资料
            </label>
            <input name="num" id="num" placeholder="" value="<?php echo $tel;?>" type="text">
      
            <label for="leftmoney" >
                账户余额
            </label>
            <input name="leftmoney" id="leftmoney" placeholder="" value="<?php echo $leftmoney;?>" type="text">
      </div> 
</div>   