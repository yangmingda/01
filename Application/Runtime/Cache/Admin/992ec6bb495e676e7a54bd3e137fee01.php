<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>test12-模版中格式化时间戳</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<link href="" rel="stylesheet">
	</head>
	
	<body>
		现在是：<?php echo (date('Y-m-d H:i:s',$date)); ?><br/>
		字符串案例：<?php echo (substr(strtoupper($str),0,5)); ?>
	</body>
</html>