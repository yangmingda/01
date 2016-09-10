<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>test15-一维数组的遍历</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<link href="" rel="stylesheet">
	</head>
	
	<body>
		<?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i; echo ($vol); ?> -<?php endforeach; endif; else: echo "" ;endif; ?><br/>
		<?php if(is_array($arr)): foreach($arr as $key=>$vol): echo ($vol); ?> -<?php endforeach; endif; ?>
		<hr/>
		<?php if(is_array($arr2)): $i = 0; $__LIST__ = $arr2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo[0]); ?> - <?php echo ($vo[1]); ?> - <?php echo ($vo[2]); ?> <br/><?php endforeach; endif; else: echo "" ;endif; ?>
	</body>
</html>