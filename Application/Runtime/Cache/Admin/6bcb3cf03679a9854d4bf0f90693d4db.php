<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>test10-对象的输出</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<link href="" rel="stylesheet">
	</head>
	
	<body>
		箭头形式：<?php echo ($stu -> id); ?> - <?php echo ($stu -> name); ?> - <?php echo ($stu -> name2); ?><br/>
		冒号形式：<?php echo ($stu->id); ?> - <?php echo ($stu->name); ?> - <?php echo ($stu->name2); ?>
	</body>
</html>