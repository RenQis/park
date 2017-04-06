<?php

require 'vcode/app_config.php';

require_once('vcode/SUBMAILAutoload.php');
$telnum=$_POST['telphone'];
$ranknum=$_POST['ranknum'];
$submail=new MESSAGEXsend($message_configs);
$submail->SetTo($telnum);
$submail->SetProject("MXFmp3");
$submail->AddVar('code',$ranknum);
$submail->xsend();

?>