<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>test9-二维数组</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<link href="" rel="stylesheet">
	</head>
	
	<body>
		中括号形式：<?php echo ($arr[0]['name']); ?> - <?php echo ($arr[0]['sex']); ?> - <?php echo ($arr[0]['age']); ?><br/>
		点形式：<?php echo ($arr["1"]["name"]); ?> - <?php echo ($arr["1"]["sex"]); ?> - <?php echo ($arr["1"]["age"]); ?>
	</body>
</html>