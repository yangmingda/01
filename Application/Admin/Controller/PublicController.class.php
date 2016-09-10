<?php
#声明命名空间
namespace Admin\Controller;
#引入父类元素
use Think\Controller;
use Thinl\Verify;
#声明类并且继承父类
class PublicController extends Controller{

	#login方法
	public function login(){
		#展示模版
		$this -> display();
		#使用fetch方法获取模版内容
		#$code = $this -> fetch();
		#echo $code;
	}
	public function captcha(){
        $cfg = array(
    	'useZh'     =>  true,           // 使用中文验证码 
        'fontSize'  =>  10,              // 验证码字体大小(px)
        'useCurve'  =>  false,            // 是否画混淆曲线
        'useNoise'  =>  false,            // 是否添加杂点	
        'imageH'    =>  38,               // 验证码图片高度
        'imageW'    =>  80,               // 验证码图片宽度
        'length'    =>  4,               // 验证码位数
        'fontttf'   =>  'simhei.ttf',
    	);
        $verify = new \Think\Verify($cfg);
        $verify -> entry();
	}

	public function check(){
       $post = I('post.');
       $verity = new \Think\Verify;
       $rst = $verity -> check($post['captcha']);
       if ($rst) {
       	$model = M('User');
       	unset($post['captcha']);
       	$data = $model -> where($post) -> find();
	       	if ($data) {
	       		session('uid',$data['id']);
	       		session('uname',$data['username']);
	       		session('role_id',$data['role_id']);
	       		$this -> success('登陆成功！',U('Index/index'),3);
	       	}else{
	       		$this -> error('用户名密码错误！',U('login'),3);
	       	}
       }else{
           $this -> error('验证码错误！',U('login'),3);
       }
	}

	public function logout(){

		session(null);
		if (!session('?uid')) {
			$this -> error('退出成功',U('login'),3);
		}
	}
}