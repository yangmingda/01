<?php
namespace Admin\Controller;
use Think\Controller;
class DocController extends Controller{
	public function add(){
      $this -> display();
	}

	public function addOk(){
	  $post = I('post.');
      $file = $_FILES['file'];
      $cfg = array(
          'rootPath'  => WORKING_PATH . UPLOAD_ROOT_PATH,
      ); 
      $upload = new \Think\Upload($cfg);
      if ($file['size'] > 0) {
      	$info = $upload -> uploadOne($file);

        if ($info) {
        	$post['hasfile'] = 1;
        	$post['filename'] = $info['savename'];
        	$post['filepath'] = UPLOAD_ROOT_PATH.$info['savepath'].$info['savename'];
        }
      }
	  $post['addtime'] = time();
	  $model = M('Doc');
	  $data = $model -> add($post);
	  
	  if ($data) {
	  	$this -> success('添加成功！',U('showList'),3);
	  }else{
	  	$this -> error('添加失败！',U('add'),3);
	  }
	}

	public function showList(){
		$model = M('Doc');
		$data = $model -> select();
		$this -> assign('data',$data);
		$this -> display();
	} 

    public function download(){
        $id = I('get.id');
        $model = M('Doc');
        $data = $model -> find($id);
        $file = WORKING_PATH . $data['filepath'];
		header("Content-type: application/octet-stream");
		header('Content-Disposition: attachment; filename="' . basename($file) . '"');
		header("Content-Length: ". filesize($file));
		readfile($file);
    }

    public function getContent(){
    	$id = I('get.id');
    	$model = M('Doc');
    	$data = $model -> find($id);
    	echo htmlspecialchars_decode($data['content']);
    }

	  public function edit(){
       $id = I('get.id');
       $model = M('Doc');
       $data = $model -> find($id);
       $this -> assign('data',$data);
       $this -> display();
	  }

    public function editOk(){
       $post = I('post.');
       if ($_FILES['file']['size'] > 0) {
         $cfg = array(
            'rootPath' => WORKING_PATH . UPLOAD_ROOT_PATH
          );
         $upload = new \Think\upload($cfg);
         $info = $upload -> uploadOne($_FILES['file']);
         if ($info) {
            $post['hasfile'] = 1;
            $post['filename'] = $info['savename'];
            $post['filepath'] = $info['savepath'];
         }
       }
       $post['addtime'] = time();
       $model -> M('Doc');
       $data = $model -> save($post);
       if ($data) {
          $this -> success('编辑成功！',U('showList'),3);
       }else{
          $this -> error('编辑失败！',U('edit',array('id' => $post['id'])),3);
       }
    }
}