<?php
/**
 * 
 * @authors	九炼 ()
 * @wat 传智播客教育集团 PHP学院
 * @date    2016-08-10 16:55:04
 * @url 	http://www.itcast.cn/php
 * @desc	部门控制器...
 *
 * ━━━━━━神兽出没━━━━━━
 * 　　   ┏┓　 ┏┓
 * 　┏━━━━┛┻━━━┛┻━━━┓
 * 　┃              ┃
 * 　┃       ━　    ┃
 * 　┃　  ┳┛ 　┗┳   ┃
 * 　┃              ┃
 * 　┃       ┻　    ┃
 * 　┃              ┃
 * 　┗━━━┓      ┏━━━┛ Code is far away from bugs with the animal protecting.
 *       ┃      ┃     神兽保佑,代码无bug。
 *       ┃      ┃
 *       ┃      ┗━━━┓
 *       ┃      　　┣┓
 *       ┃      　　┏┛
 *       ┗━┓┓┏━━┳┓┏━┛
 *     　  ┃┫┫　┃┫┫
 *     　  ┗┻┛　┗┻┛
 *
 * ━━━━━━感觉萌萌哒━━━━━━
 */


#声明命名空间
namespace Admin\Controller;
#引入父类元素
use Think\Controller;
#声明类并且继承父类
class DeptController extends Controller{

	#add方法，展示添加页面的模版
	public function add(){
		$model = M('Dept');
		$data = $model -> select();
		$this -> assign('data',$data);
		$this -> display();
	}

	#addOk方法，收集数据并且保存数据
	public function addOk(){
		#收集数据
		#$post = $_POST;
		$post = I('post.');
		#实例化模型
		$model = M('Dept');
		#数据入库
		$rst = $model -> add($post);
		#判断返回值
		if($rst){
			#添加成功
			$this -> success('添加成功',U('showList'),3);
		}else{
			#添加失败
			$this -> error('添加失败',U('add'),3);
		}
	}

	public function showList(){
      $model = M('Dept');
     
      $data = $model -> field('t1.name as deptname,t2.*') -> table('tp_dept as t1,tp_dept as t2') -> where('t1.pid = t2.id') -> select();
      
	  $this -> assign('data',$data);
	  $this -> display();
	}
}