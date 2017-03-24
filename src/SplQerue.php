<?php
	
	$sq = new SplQueue();


	//将内容放入队列
	$sq->enqueue('a');
	$sq->enqueue('B');
	$sq->enqueue('C');

	echo "Bottom:" . $sq->bottom() . PHP_EOL;
	echo "Top:" . $sq->top() . PHP_EOL;

	//将索引为0的编号置为A
	$sq->offsetSet(0,'A');

	//队列遍历
	$sq->rewind();
	while($sq->valid())
	{
		echo $sq->key() . "=>"  .$sq->current() .PHP_EOL;
		$sq->next();
	}

	//将内容导出队列
	$dequeue = $sq->dequeue();
	echo "数据" . $dequeue ."被导出" . PHP_EOL;
	var_dump($sq);
