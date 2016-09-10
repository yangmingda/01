<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>test8-一维数组</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<link href="" rel="stylesheet">
	</head>
	
	<body>
		一维数组中括号输出：<?php echo ($arr[0]); ?> - <?php echo ($arr[1]); ?> - <?php echo ($arr[2]); ?> - <?php echo ($arr[3]); ?><br/>
		一维数组点形式输出：<?php echo ($arr["0"]); ?> - <?php echo ($arr["1"]); ?> - <?php echo ($arr["2"]); ?> - <?php echo ($arr["3"]); ?>
	</body>
</html>