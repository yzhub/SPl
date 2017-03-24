<?php
	$sq=new SplPriorityQueue();
	
	$sq->insert('aa',0);
	$sq->insert('ab',0);
	$sq->insert('ac',0);
	$sq->insert('ad',1);
	$sq->insert('ae',1);
	$sq->insert('af',1);
	$sq->insert('ag',1);
	
	$sq->insert('ba',2);
	$sq->insert('bb',2);
	$sq->insert('bc',2);
	$sq->insert('bd',3);
	$sq->insert('be',3);
	$sq->insert('bf',3);

	//$sq->compare(4,2);

	/**
	 * 设置元素出队模式
	 *   SplPriorityQueue::EXTR_DATA 仅提取值
	 *   SplPriorityQueue::EXTR_PRIORITY 仅提取优先级
	 *   SplPriorityQueue::EXTR_BOTH 提取数组包含值和优先级
	 */
	$sq->setExtractFlags(SplPriorityQueue::EXTR_DATA);

	//遍历队列
	while($sq->valid())
	{
	 	echo "key:" . $sq->key() . "=>value:" . $sq->current() . PHP_EOL;	
		$sq->next();
	}
