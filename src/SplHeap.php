<?php
	$sh=new SplMinHeap();
	
	$sh->insert('a');
	$sh->insert('b');
	$sh->insert('c');
	$sh->insert('d');
	$sh->insert('e');
	$sh->insert('f');
	$sh->insert('g');

	//堆得当前节点的key为节点总数-1	
	echo "key=>" . $sh->key() . PHP_EOL;

	//堆的下一个节点是总数递减的
	$sh->next();

	echo 'current=>' . $sh->current() . PHP_EOL;

	echo "key=>" . $sh->key() . PHP_EOL;

	echo "顶部节点内容=>" . $sh->top() . PHP_EOL;

	echo "堆中数据个数为=>" . $sh->count() . PHP_EOL;

	echo $sh->isEmpty() ? "堆为空\n" : "堆不为空\n";
	//从堆顶部提取一个节点并重建堆
	$tit = $sh->extract();	

	//遍历堆节点
	while($sh->valid())
	{
		echo "key:" . $sh->key() . "=>value:" . $sh->current() .PHP_EOL;
		$sh->next();
	}	


