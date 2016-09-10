<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller{
	public function add(){
		$model = M('Dept');
		$data = $model -> select();
        $this -> assign('data',$data);
        $this -> display();
	}
	public function addOk(){
		$post = I('post.');
		$post['addtime'] = time();
		$model = M('User');
		$model -> create($post);
		$rsg = $model -> add();
        if ($rsg) {
        	$this -> success('添加成功！',U('showList'),3);
        }else{
        	$this -> error('添加失败！',U('add'),3);
        }
	}

	public function showList(){
		$model = M('User');
		$count = $model -> count();
		$page = new \Think\Page($count,3);
		$page -> rollPage = 2;
		$page -> lastSuffix = false;
		$page -> setConfig('prev','上一页');
		$page -> setConfig('next','下一页');
		$page -> setConfig('first','首页');
		$page -> setConfig('last','末页');
		$show = $page -> show();
        $data = $model -> limit($page -> firstRow,$page -> listRows) -> select();
        $this -> assign('data',$data);
        $this -> assign('show',$show);
        $this -> display();
	}

	public function charts(){
        $model = M();
        #$sql = "select t2.name as deptname,count(*) as count from tp_user as t1,tp_dept as t2 where t1.dept_id = t2.id group by deptname"
        $data = $model ->field('t2.name as deptname,count(*) as count') -> table('tp_user as t1,tp_dept as t2') -> where('t1.dept_id = t2.id') -> group('deptname') -> select();
        #$str = json_encode($data);
        $str = '[';
        foreach ($data as $key => $value) {
        	$str .= "['" . $value['deptname'] . "'," . $value['count'] . "],";
        }
        $str = rtrim($str,',');
        $str .= ']';
        $this -> assign('str',$str);
        $this -> display();
	}
}