<?php
namespace Admin\Controller;
use Think\Controller;
class EmailController extends Controller{
	public function send(){
		/*$model = M('User');
		$data = $model -> where('id != ' . session('uid')) -> select();
        $this -> assign('data',$data);
        $this -> display();*/

        $model = M('User');
		#查询，一般情况不允许给自己发送站内信，所以需要刨除用户自身
		$data = $model -> where('id != ' . session('uid')) -> select();
		#传递给模版
		$this -> assign('data',$data);
		#展示页面
		$this -> display();
	}

	public function sendOk(){
		$post = I('post.');
		if ($_FILES['file']['size'] > 0) {
			$cfg = array(
				'rootPath' => WORKING_PATH . UPLOAD_ROOT_PATH
			);
			$upload = new \Think\Upload($cfg);
			$info = $upload -> uploadOne($_FILES['file']);
			if ($info) {
				$post['hasfile'] = 1;
				$post['filename'] = $info['savename'];
				$post['file'] = UPLOAD_ROOT_PATH . $info['savepath'] . $info['savename'];
			}
		}
		$post['from_id'] = session('uid');
		$post['addtime'] = time();
		$model = M('Email');
		$data = $model -> add($post);
		if ($data) {
			$this -> success('添加成功！',U('sendBox'),3);
		}else{
			$this -> error('添加失败！',U('send'),3);
		}
	}

	public function sendBox(){
      $model = M();
      #select t1.*,t2.truename as truename from tp_email as t1,tp_user as t2 where t1.to_id = t2.id and t2.from_id = session('uid')
      $data = $model -> field('t1.*,t2.truename as truename') -> table('tp_email as t1,tp_user as t2') -> where('t1.to_id = t2.id and from_id ='. session('uid')) -> select();
      $this -> assign('data',$data);
      $this -> display();
	}

	public function download(){
		$id = I('get.id');
		$model = M('Email');
		$data = $model -> find($id);
        $file = WORKING_PATH . $data['file'];
		header("Content-type: application/octet-stream");
		header('Content-Disposition: attachment; filename="' . basename($file) . '"');
		header("Content-Length: ". filesize($file));
		readfile($file);
	}

	public function del(){
		$id = I('get.id');
		$model =M('Email');
		$rst = $model -> where("id = $id and isread = 0 and from_id=" . session('uid')) -> delete();
        if ($rst) {
        	$this -> success('删除成功！',U('sendBox'),3);
        }else{
        	$this -> error('删除失败！',U('sendBox'),3);
        }
	}

	public function getContent(){
     $id = I('get.id');
     $model = M('Email');
     $rst = $model -> find($id);
     echo $rst['content'];
	}
}