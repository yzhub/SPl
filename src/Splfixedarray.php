<?php
	$sfa=new SplFixedArray();


	$arr=array('mr.cat',  'man');

	//将数组导入到定长数组，true表示保留数组索引,false表示重建数组索引

	$sfb = SplFixedArray::fromArray($arr,false);
	echo $sfb->count();
	echo $sfb->setSize(1);
	echo $sfb->count();
	
	var_dump($sfb->toArray());
	//设置数组大小
	$sfa->setSize(6);
	
	//取得定长数组长度
	echo "数组长度为=>" . $sfa->getSize() . PHP_EOL;

	
	//遍历定长数组
	$sfb->rewind();
	while($sfb->valid())
	{
		echo "key:" . $sfb->key() . " => value" . $sfb->current() . PHP_EOL; 
		$sfb->next();
	}
