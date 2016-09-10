<?php
/**
 * 
 * @authors	九炼 ()
 * @wat 传智播客教育集团 PHP学院
 * @date    2016-08-09 15:47:39
 * @url 	http://www.itcast.cn/php
 * @desc	部门模型
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
namespace Admin\Model;
#引入父类元素
use Think\Model;
#声明并且继承父类
class DeptModel extends Model{

	#测试自定义方法
	public function diy(){
		echo 'this is model';
	}
    #开启批量验证
    protected $patchValidate = true;

    protected $_Validate = array(
       array('name', 'require', '部门名称不能为空！'),
       array('name', '', '部门名称已经存在！',0, 'unique'),
       array('sort','is_numeric','排序必须是一个数字',0,'function')
    );

    protected $_map = array(
       'bumenmingcheng' => 'name',
       'paixu' => 'sort',
       'beizhu' => 'remark'
    );
}
