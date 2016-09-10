<?php
namespace Admin\Controller;
use Think\Controller;
class KnowledgeController extends Controller{
	public function add(){
		$this -> display();
	}

	public function addOk(){
		$post = I('post.');
		if ($_FILES['thumb']['size'] > 0) {
			$cfg = array(
               'rootPath' => WORKING_PATH . UPLOAD_ROOT_PATH
			);
			$upload = new \Think\Upload($cfg);
			$info = $upload -> uploadOne($_FILES['thumb']);

			if ($info) {
				$post['picture'] = UPLOAD_ROOT_PATH . $info['savepath'] . $info['savename'];
				$image = new \Think\Image();
				$image -> open(WORKING_PATH . $post['picture']);
				$image -> thumb(100,100);
				$image -> save(WORKING_PATH . UPLOAD_ROOT_PATH . $info['savepath'] . 'thumb_' . $info['savename']);
				$post['thumb'] = UPLOAD_ROOT_PATH . $info['savepath'] . 'thumb_' .$info['savename'];
		    }
	    }
            $post['addtime'] = time();
            $model = M('Knowledge');
            $rst = $model -> add($post);
            if ($rst) {
            	$this -> success('添加成功！',U('showList'),3);
            }else{
                $this -> error('添加失败！',U('add'),3);
            }			 
	}

    public function showList(){
    	$model = M('Knowledge');
    	$data = $model -> select();
    	$this -> assign('data',$data);
    	$this -> display();
    }

    public function edit(){
     $id = I('get.id');
     $model = M('Knowledge');
     $data = $model -> find($id);
     $this -> assign('data',$data);
     $this -> display();
    }

    public function editOk(){
    	$post = I('post.');
    	if ($_FILES['thumb']['size']) {
    		$cfg = array(
               'rootPath' => WORKING_PATH . UPLOAD_ROOT_PATH
    		);
    		$upload = new \Think\Upload($cfg);
    		$info = $upload -> uploadOne($_FILES['thumb']);
    		if ($info) {
    			$post['picture'] = UPLOAD_ROOT_PATH . $info['savepath'] . $info['savename'];
    			$image = new \Think\Image();
    			$image -> open(WORKING_PATH . $post['picture']);
    			$image -> thumb(100,100);
    			$image -> save(WORKING_PATH . UPLOAD_ROOT_PATH .$info['savepath'] . 'thumb_' . $info['savename']);
    			$post['thumb'] = UPLOAD_ROOT_PATH . $info['savepath'] . 'thumb_' . $info['savename'];
    		}
    	}
    	$post['addtime'] = time();
    	$model = M('Knowledge');
    	$data = $model -> save($post);
    	if ($data) {
    		$this -> success('编辑成功！',U('showList'),3);
    	}else{
    	    $this -> error('编辑失败！',U('showList'),3);
    	}
    }
}