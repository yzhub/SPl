<?php

	//实例化双向列表对象
	$sdll = new SplDoublyLinkedList();

	//压入数据到双向列表
	$sdll->push('b');
	$sdll->push('c');
	$sdll->push('d');
	$sdll->push('e');
	$sdll->push('f');



	//在下标2处插入009
	$sdll->add(2,'009');

	//获取双向列表顶部节点
	$top = $sdll->top();
	echo "列表头部数据为$top" . PHP_EOL;

	//获取双向列表底部节点
	$bottom = $sdll->bottom();
	echo "列表底部数据为$bottom" . PHP_EOL;

	//数据将双向列表中弹出	
	$pop = $sdll->pop();
	echo "列表头部数据" . $pop ."被移除"  .PHP_EOL;

	//将数据添加到双向列表底部
	echo "列表底部插入数据:a" .PHP_EOL;
	$sdll->unshift('a');	
	
	//双向列表的头部移除数据
	$shift = $sdll->shift();
	echo "列表底部数据" . $shift ."被移除" . PHP_EOL;
	
	//取得当前节点索引
	$sdll->rewind();

	//指针下移动
	$sdll->next();

	//指针上移
	$sdll->prev();
		
	echo "当前指针位置为" . $sdll->key(). PHP_EOL;

	echo "元素个数为:" . $sdll->count() . PHP_EOL;

	echo $sdll->isEmpty() ? "链表为空" . PHP_EOL : "链表不为空" . PHP_EOL;

	echo $sdll->valid() ? "当前指针所指元素有效" . PHP_EOL : "当前指针所指元素无效" . PHP_EOL;

	echo $sdll->offsetExists(3) ? "索引3元素存在" . PHP_EOL : "索引3元素不存在" . PHP_EOL;

	echo "索引3元素内容为" . $sdll->offsetGet(3) . PHP_EOL;

	//设置索引为2的内容为222
	$sdll->offsetSet(2,'222');
	//删除索引为2的节点
	$sdll->offsetUnset(2);
	//序列化
	$_str=$sdll->serialize();
	echo "串行化结果为:" . $_str .PHP_EOL;

	//反序列化
	$sdll->unserialize($_str);
	
	//获取迭代模式 
	/*
	 *  IT_MODE_LIFO => int(2) 
	 *  IT_MODE_FIFO => int(0) 
	 *  IT_MODE_DELETE => int(1) 
	 *  IT_MODE_KEEP => int(0) 
	 */           
	$mode = $sdll->getIteratorMode();
	echo "迭代器模式为:".$mode .PHP_EOL;
	//设置迭代模式
	/**迭代方向:
	*	SplDoublyLinkedList::IT_MODE_LIFO (Stack style)
	*	SplDoublyLinkedList::IT_MODE_FIFO (Queue style)
	* 迭代器行为:
	*	SplDoublyLinkedList::IT_MODE_DELETE (Elements are deleted by the iterator)
	*	SplDoublyLinkedList::IT_MODE_KEEP (Elements are traversed by the iterator)
	*/
	$sdll->setIteratorMode(SplDoublyLinkedList::IT_MODE_FIFO);

	var_dump($sdll);
