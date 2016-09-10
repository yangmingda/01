<?php
/**
 * 
 * @authors	九炼 ()
 * @wat 传智播客教育集团 PHP学院
 * @date    2016-08-07 11:18:19
 * @url 	http://www.itcast.cn/php
 * @desc	请将此替换为文件描述...
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
use Think\Verify;
#声明并继承
class TestController extends Controller{

	#index方法，模版展示
	public function index(){
		#第一种方法
		$this -> display();
		#第二种方法
		#$this -> display('index2');
		#第三种方法
		#$this -> display('Index/test');
	}

	#test1方法
	public function test1(){
		echo time();
	}

	#test2方法，U方法的测试
	public function test2(){
		#生成当前控制器下index方法的访问地址
		echo U('index');  ///index.php/Admin/Test/index.html
		#生成Index控制器下的index方法的地址
		echo U('Index/index'); ///index.php/Admin/Index/index.html
		#生成当前控制器下index方法的访问地址，并且传递参数id=1
		echo U('index',array('id' => 1)); ///index.php/Admin/Test/index/id/1.html
	}

	#test3方法。成功跳转
	public function test3(){
		#成功跳转
		$this -> success('执行成功',U('test1'),3);
	}

	#test4方法。失败跳转
	public function test4(){
		#失败跳转
		$this -> error('执行失败',U('test1'),3);
	}

	#test5，变量的传递/分配
	public function test5(){
		#定义变量
		$date = date('Y-m-d H:i:s',time());
		#传递变量
		$this -> assign('date',$date);
		#展示模版
		$this -> display();
	}

	#test6，展示模版，模版常量替换机制
	public function test6(){
		#展示模版
		$this -> display();
	}

	#test7，展示模版，模版中的注释
	public function test7(){
		#展示模版
		$this -> display();
	}

	#test8，输出一维数组
	public function test8(){
		#定义一维数组
		$arr = array('西游记','三国演义','红楼梦','水浒传');
		#分配
		$this -> assign('arr',$arr);
		#展示模版
		$this -> display();
	}

	#test9，输出二维数组
	public function test9(){
		#定义二维数组
		$arr = array(
				array('name' => 'xiaoming','sex' => '男','age' => 23),
				array('name' => 'xiaohong','sex' => '女','age' => 21)
			);
		#传递给模版
		$this -> assign('arr',$arr);
		#展示模版
		$this -> display();
	}

	#test10，对象的输出
	public function test10(){
		#实例化对象
		$stu = new Stu();//如果在实例化的时候不引入类文件，则实例化当前命名空间下
		#给stu添加几个属性
		$stu -> id = 1;
		$stu -> name = '韩梅梅';
		$stu -> name2 = '李磊';
		#将对象传递给模版
		$this -> assign('stu',$stu);
		#展示模版
		$this -> display();
	}

	#test11，系统变量
	public function test11(){
		#展示模版
		$this -> display();
	}

	#test12，模版中使用函数格式化时间戳
	public function test12(){
		#时间戳
		$date = time();
		#定义字符串
		$str = 'AbcDeFgHiJk';
		#传递给模版
		$this -> assign('date',$date);
		$this -> assign('str',$str);
		#展示模版
		$this -> display();
	}

	#test13，默认值
	public function test13(){
		#定义签名
		$sign = '';
		#传递
		$this -> assign('sign',$sign);
		#展示模版
		$this -> display();
	}

	#test14，运算符
	public function test14(){
		#定义两个变量
		$a = 10;
		$b = 2;
		#传递给模版
		$this -> assign('a',$a);
		$this -> assign('b',$b);
		#展示模版
		$this -> display();
	}

	#顶部
	public function head(){
		#展示模版
		$this -> display();
	}

	#中间
	public function body(){
		#展示模版
		$this -> display();
	}

	#尾部
	public function foot(){
		#展示模版
		$this -> display();
	}

	#volist遍历
	public function test15(){
		#定义数组
		$arr = array('西游记','三国演义','红楼梦','水浒传');
		$arr2 = array(
				array('猴哥','八戒','师父'),
				array('孙枣','术爸','孔明'),
				array('贾宝玉','林黛玉','薛宝钗'),
				array('宋江','高球','西门庆')
			);
		#传递给模版
		$this -> assign('arr',$arr);
		$this -> assign('arr2',$arr2);
		#展示模版
		$this -> display();
	}

	#test16，if标签
	public function test16(){
		#输出今天是星期几
		$day = date('N');
		#传递给模版
		$this -> assign('day',$day);
		#展示模版
		$this -> display();
	}

	#test17，php标签
	public function test17(){
		#展示模版
		$this -> display();
	}

	#test18，普通实例化方式
	public function test18(){
		#实例化模型
		$model = new \Admin\Model\DeptModel();
		dump($model);
		#$model -> diy();
	}

	#test19，快速实例化方式
	public function test19(){
		#实例化模型
		$model = D('Dept');
		dump($model);
		#$model -> diy();
	}

	#test20，快速实例化方式
	public function test20(){
		#实例化模型
		$model = M();
		dump($model);
		#$model -> diy();
	}

	#test21，增加操作
	public function test21(){
		#实例化模型
		$model = M('Dept');
		#定义数组
		$data = array(
				'name1'	=>	'总裁办',
				'pid1'	=>	'1',
				'sort1'	=>	'2',
				'remark1'=>	'总裁部门'
			);
		#增加操作
		$rst = $model -> add($data);
		dump($rst);
	}

	#test22，修改操作
	public function test22(){
		#实例化模型
		$model = M('Dept');
		#定义数组
		$data = array(
				'id'	=> '3',
				'name'	=> '技术部'
			);
		#修改
		$rst = $model -> save($data);
		dump($rst);
	}

	#test23，查询操作
	public function test23(){
		#实例化模型
		$model = M('Dept');
		#find
		$data = $model -> find();//等价于limit 1
		$data = $model -> find(2);
		#select
		$data = $model -> select();
		$data = $model -> select(2);
		$data = $model -> select('0,4');
		dump($data);
	}

	#test24，删除操作
	public function test24(){
		#实例化模型
		$model = M('Dept');
		#删除
		#$rst = $model -> delete(3);
		$rst = $model -> delete('1,2');
		dump($rst);
	}

	#test25，逻辑删除
	public function test25(){
		#实例化模型
		$model = M('Dept');
		#数据
		$data = array(
				'id'	=> '4',
				'status'	=> '0'
			);
		#逻辑删除
		$rst = $model -> save($data);
		dump($rst);
	}

	#test26，sql调试
	public function test26(){
		#实例化模型
		$model = M('Dept');
		#查询
		$rst = $model -> find(4);
		#sql语句
		//echo $model -> getLastSql();
		echo $model -> _sql();
	}

	#test27，性能统计
	public function test27(){
		#开始标记
		G('start');
		for ($i=0; $i < 10000000; $i++) { 
			
		}
		#结束标记
		G('end');
		#输出执行时间
		echo G('start','end',6);		
	}

	#test28，AR模式增加操作
	public function test28(){
		#实例化模型
		$model = M('Dept');
		#AR数据
		$model -> name = '行政部';
		$model -> pid  = '0';
		$model -> sort = '2';
		$model -> remark = '管理行政的部门';
		#增加操作
		$rst = $model -> add();
		dump($rst);
	}

	#test29，ar模式的修改操作
	public function test29(){
		#实例化操作
		$model = M('Dept');
		#ar数据
		#$model -> id = '5';
		$model -> status = '0';
		#修改操作
		$model -> find(5);
		$rst = $model -> save();
		dump($rst);
	}

	#test30，AR模式的删除操作
	public function test30(){
		#实例化
		$model = M('Dept');
		#数据
		$model -> id = 5;
		#删除操作
		$rst = $model -> delete();
		dump($rst);
	}

	#test31，where方法
	public function test31(){
		#实例化模型
		$model = M('Dept');
		#设置条件
		$model -> where('id = 4');
		#查询
		$data = $model -> select();
		dump($data);
	}

	#test32，limit方法
	public function test32(){
		#实例化
		$model = M('Dept');
		#限制记录输出数量
		$model -> limit(1);
		#查询
		$data = $model -> select();
		dump($data);
	}

	#test33，field方法
	public function test33(){
		#实例化模型
		$model = M('Dept');
		#限制字段
		$model -> field('id,name');
		#查询
		$data = $model -> select();
		dump($data);
	}

	#test34，order方法
	public function test34(){
		#实例化模型
		$model = M('Dept');
		#排序
		$model -> order('id desc');
		#查询
		$data = $model -> select();
		dump($data);
	}

	#test35，group方法
	public function test35(){
		#实例化模型
		$model = M('Dept');
		#操作
		//$model -> group('name');
		//$model -> field('name,count(*) as count');
		#连贯操作
		$data = $model -> group('name') -> field('name,count(*) as count') -> select();
		#查询操作
		//$data = $model -> select();
		dump($data);
	}

	#test36，count方法
	public function test36(){
		#实例化模型
		$model = M('Dept');
		#求取总数
		$count = $model -> count();
		dump($count);
	}

	#test37，max方法
	public function test37(){
		#实例化模型
		$model = M('Dept');
		#查询指定字段的最大值
		$max = $model -> max('id');
		dump($max);
	}

	#test38，min方法
	public function test38(){
		#实例化模型
		$model = M('Dept');
		#查询指定字段的最小值
		$min = $model -> min('id');
		dump($min);
	}

	#test39，avg方法
	public function test39(){
		#实例化模型
		$model = M('Dept');
		#查询平均值
		$avg = $model -> avg('id');
		dump($avg);
	}

	#test40，sum方法
	public function test40(){
		#实例化模型
		$model = M('Dept');
		#查询总和
		$sum = $model -> sum('id');
		dump($sum);
	}

	public function test41(){
		$model = M('Dept');
		$model -> create();
		$rst = $model -> select();
		dump($rst);
	}

	public function test42(){
		test();
	}

	public function test43(){
		load('@/info');
		getinfo();
	}

    public function test44(){
    	$cfg = array(
    	'useZh'     =>  true,           // 使用中文验证码 
        'fontSize'  =>  24,              // 验证码字体大小(px)
        'useCurve'  =>  false,            // 是否画混淆曲线
        'useNoise'  =>  false,            // 是否添加杂点	
        'imageH'    =>  0,               // 验证码图片高度
        'imageW'    =>  0,               // 验证码图片宽度
        'length'    =>  4,               // 验证码位数
        'fontttf'   =>  'simhei.ttf',
    	);
    	$verify = new \Think\Verify($cfg);
    	$verify -> entry();
    }

    public function test45(){
    	$key = 'd36c1d9829185050b5ac21d5beafa4a8';
    	$tpl_id = 10197;
        $mobile = '18246881533';
        $code = rand(100000,999999);
        session('code',$code);
        $code = urlencode('#code#='.$code);
        $api = 'http://v.juhe.cn/sms/send';
        $url = $api . '?key=' . $key . '&tpl_id=' . $tpl_id . '&mobile=' . $mobile . '&tpl_value=' . $code;
        $data = http_get($url);
        dump($data);
    }
}
