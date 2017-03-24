<?php
	class T
	{
		private $_name;
		function __construct($name)
		{
			$this->_name = $name;
		}
	}

	$t1=new T('a', '1');
	$t2=new T('b', '2');
	$t3=new T('c', '3');
	$t4=new T('d', '4');

	$ta=new T('0' , 'a');
	$tb=new T('1' , 'b');

	$sos1=new SplObjectStorage();
	$sos2=new SplObjectStorage();
	$sos3=new SplObjectStorage();


	//添加对象到对象容器
	$sos1->attach($t1, 'a');
	$sos1->attach($t2, 'b');
	$sos1->attach($t3, 'c');
	$sos1->attach($t4, 'd');

	//将对象从对象容器中移除
	$sos1->detach($t3);

	// 检查容器中是否存在对象
	echo $sos1->contains($t3)? "容器中存在该对象\n" : "容器中不存在该对象\n";

	$sos2->attach($ta);
	$sos2->attach($tb);

	//添加容器$sos2到容器$sos1
	$sos1->addAll($sos2);

	//从当前容器移除容器$sos2
	$sos1->removeAll($sos2);

	//从当前容器中排出非$sos2中的容器中的对象
	//$sos1->removeAllExcept($sos2);

	//设置当前节点关联的数据
	$sos1->setInfo('asd');
	
	//获取当前节点关联的数据
	echo $sos1->getInfo() . PHP_EOL;

	echo "容器中对象个数为:" . $sos1->count() . PHP_EOL;

	//遍历容器中的对象
	while($sos1->valid())
	{
		var_dump($sos1->current());
		$sos1->next();
	}

	//容器序列化
	echo "容器序列化结果为" . $sos1->serialize() . PHP_EOL;


	//容器反序列化
	$sos3->unserialize($sos1->serialize());
	
	
	echo $sos1->offsetExists($t3)? "容器中存在该对象\n" : "容器中不存在该对象\n";

	//获取指定对象的Hash值
	echo "Hash值为" . $sos1->getHash($t1) . PHP_EOL;
 
