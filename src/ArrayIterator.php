<?php
	$arr=array('c1'=>'h3c', 'c2'=>'huawei', 'c3'=>'alibaba', 'c4'=>'tencent');

	echo "普通方式遍历:";
	foreach($arr as $key => $value)
	{
		echo $key. ":". $value ."  ";
	}
	echo PHP_EOL;



	//普通方式换转换到下种方式执行
	echo "ArrayIterator方式遍历:";
	$obj=new ArrayObject($arr);
	$it = $obj->getIterator();

	foreach($it as $key => $value)
	{
		echo $key. ":". $value ."  ";
	}
	echo PHP_EOL;


	echo "valid方式遍历:";
	$it->rewind();
	while($it->valid())
	{
		echo $it->key() . ":" . $it->current() ."   ";
		$it->next();
	}
	echo PHP_EOL;


	//跳过一个元素
	echo "跳过1个position去:";
	$it->rewind();
	if($it->valid())
	{
		$it->seek(1);
		while($it->valid())
		{
			echo $it->key() . ":" . $it->current() ."   ";
			$it->next();
		}
		echo PHP_EOL;
	}



	//key排序操作
	echo "按key排序后结果为:";
	$it->ksort();
	$it->rewind();
	while($it->valid())
	{
		echo $it->key() . ":" . $it->current() ."   ";
		$it->next();
	}
	echo PHP_EOL;

	//value排序操作
	echo "按value排序后结果为:";
	$it->asort();
	$it->rewind();
	while($it->valid())
	{
		echo $it->key() . ":" . $it->current() ."   ";
		$it->next();
	}
	echo PHP_EOL;
