<?php
	$ss = new SplStack();
	
	$ss->push('A');
	$ss->push('B');
	$ss->push('c');

	echo "Bottom:" . $ss->bottom() . PHP_EOL;
	echo "TOP:" . $ss->top() . PHP_EOL;

	//堆栈offset=0是Top所在的位置，offset=1是靠近Top位置节点靠近bottom位置的相邻节点，以此类推
	$ss->offsetSet(0,'C');

	//堆栈的rewind方法指向Top所在的位置，双向链表调用之后指向bottom所在的位置。
	$ss->rewind();
	echo "Current:" . $ss->current() . PHP_EOL;

	//堆栈的next方法使指针向靠近bottom方向移动
	$ss->next();
	echo "Next:" . $ss->current() . PHP_EOL;

	//堆栈的prev方法使指针向靠近top方法移动

	$ss->prev();
	echo "prev:" . $ss->current() . PHP_EOL;

	//遍历堆栈
	$ss->rewind();
	while($ss->valid())
	{
		echo $ss->key() . "=>" .  $ss->current() . PHP_EOL;
		$ss->next();
	}

	//删除堆栈数据
	$pop = $ss->pop();
	echo "出栈数据:" . $pop . PHP_EOL;

	var_dump($ss);
