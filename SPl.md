#PHP学习-Spl学习#

[TOC]

##一、 什么是SPL##
>SPL全称为（Standard PHP Library)译为PHP标准库，用于解决常见问题的一组接口和类的集合。

##二、SPL基本框架##

>1. 数据结构
>>1. SplDoublyLinkedList - 双向列表
>>1. SplStack - 堆栈
>>1. SplQueue - 队列
>>1. SplHeap - 堆
>>1. SplMaxHeap - 降序堆
>>1. SplMinHeap - 升序堆
>>1. SplPriorityQueue - 优先级队列
>>1. SplFixedArray - 定长数组
>>1. SplObjectStorage - 对象容器

>2. 迭代器
>>1. AppendIterator
>>1. ArrayIterator
>>1. CachingIterator
>>1. CallbackFilterIterator
>>1. DirectoryIterator
>>1. EmptyIterator
>>1. FilesystemIterator
>>1. FilterIterator
>>1. GlobIterator
>>1. InfiniteIterator
>>1. IteratorIterator
>>1. LimitIterator
>>1. MultipleIterator
>>1. NoRewindIterator
>>1. ParentIterator
>>1. RecursiveArrayIterator
>>1. RecursiveCachingIterator
>>1. RecursiveCallbackFilterIterator
>>1. RecursiveDirectoryIterator
>>1. RecursiveFilterIterator
>>1. RecursiveIteratorIterator
>>1. RecursiveRegexIterator
>>1. RecursiveTreeIterator
>>1. RegexIterator

>3. 接口
>>1. Countable
>>1. OuterIterator
>>1. RecursiveIterator
>>1. SeekableIterator

>4. 异常
>>1. BadFunctionCallException
>>1. BadMethodCallException
>>1. DomainException
>>1. InvalidArgumentException
>>1. LengthException
>>1. LogicException 
>>1. OutOfBoundsException
>>1. OutOfRangeException
>>1. OverflowException
>>1. RangeException
>>1. RuntimeException
>>1. UnderflowException
>>1. UnexpectedValueException

>5. SPL函数
>>1. class_implements — 返回指定的类实现的所有接口。
>>1. class_parents — 返回指定类的父类。
>>1. class_uses — Return the traits used by the given class
>>1. iterator_apply — 为迭代器中每个元素调用一个用户自定义函数
>>1. iterator_count — 计算迭代器中元素的个数</a>
>>1. iterator_to_array — 将迭代器中的元素拷贝到数组
>>1. spl_autoload_call — 尝试调用所有已注册的__autoload函数来装载请求类
>>1. spl_autoload_extensions — 注册并返回spl_autoload函数使用的默认文件扩展名。
>>1. spl_autoload_functions — 返回所有已注册的__autoload()函数。
>>1. spl_autoload_register — 注册给定的函数作为 __autoload 的实现
>>1. spl_autoload_unregister — 注销已注册的__autoload()函数
>>1. spl_autoload — __autoload()函数的默认实现
>>1. spl_classes — 返回所有可用的SPL类
>>1. spl_object_hash — 返回指定对象的hash id

>6. 文件处理
>>1. SplFileInfo
>>1. SplFileObject
>>1. SplTempFileObject

>7. 各种类及接口
>>1. ArrayObject — The ArrayObject class 
>>1. SplObserver — The SplObserver interface 
>>1. SplSubject — The SplSubject interface

##三、数据结构##
>###1. SplDoublyLinkedList-双向列表###

>> **Bottom**:最先添加到链表的节点叫做Bottom(底部)
>> **TOP**:最后添加到链表的节点叫做TOP(顶部)，也成尾部
>> **链表指针**:当前关注的节点的标识，可以指向任意节点
>> **节点名称**:可以在链表中唯一标识一个节点的名称，我们通常又称为节点的key或offset
>> **节点数据**:存放在链表中的应用数据，我们通常称为value

> | 编号 | 方法名称 | 方法描述 |
> |:------:|:------|:------|
> | 1 | public function add($index, $newval) | 在$index处插入$newval |
> | 2 | public function top() | 获取顶部节点数据 |
> | 3 | public function bottom() | 获取底部节点数据 |
> | 4 | public function pop() | 将顶部节点数据弹出 |
> | 5 | public function push($value) | 将数据$value添加到双向链表尾部 |
> | 6 | public function shift() | 双向列表头部移除数据 |
> | 7 | public function unshift($value) | 将数据添加双向列表头部 | 
> | 8 | public function rewind()  | 将指针指向双向列表顶部 |
> | 9 | public function prev()  | 移动到上条记录 |
> | 10 | public function next()  | 移动到下条记录 |
> | 11 | public function key()  | 取得当前节点的key |
> | 12 | public function current()  | 取得当前节点信息 |
> | 13 | public function count() | 取得链表中元素个数 |
> | 14 | public function isEmpty() | 判断链表是否为空 |
> | 15 | public function valid() | 判断当前节点是否有效 |
> | 16 | public function offsetExists($index) | 判断$index节点是否存在 |
> | 17 | public function offsetGet($index) | 获取$index处的内容 |
> | 18 | public function offsetSet($index, $newval) | 设置$index处节点的内容为$newval |
> | 19 | public function offsetUnset($index) | 删除$index处节点 |
> | 20 | public function serialize() | 序列化存储 |
> | 21 | public function unserialize($serialized) | 反序列化 |
> | 22 | public function setIteratorMode($mode) | 设置迭代模式 |
> | 23 | public function getIteratorMode () | 获取迭代模式 |

```php
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
```
>###2. SplStack-堆栈 ###

```php
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
```
>###3. SplQueue-队列 ###

> | 编号 | 方法名称 | 方法描述 |
> |:------:|:------|:------|
> | 1 |   public function enqueue ($value） | 添加数据到队列 |
> | 2 |   public function dequeue () | 从队列中移除数据 |

```php
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
```

>###4. SplHeap-堆 ###
>> SplHeap是一个抽象类，即只能被继承，该继承类还有一个抽象方法（compare），用来比较两个元素的大小

> | 编号 | 方法名称 | 方法描述 |
> |:------:|:------|:------|
> | 1 | public function extract() | 从堆顶部提取一个节点并重建堆 |
> | 2 | public function insert($value) | 将 $value 插入到堆中 |
> | 3 | public function top()  | 返回堆顶部数据 |
> | 4 | public function count() | 计算堆中数据的个数 |
> | 5 | public function isEmpty() | 判断堆是否为空 |
> | 6 | public function rewind() | 重置指针位置 |
> | 7 | public function current() | 取得当前节点信息 |
> | 8 | public function key() | 取得当前节点的key |
> | 9 | public function next() | 移动到下条记录 | 
> | 10| public function valid() | 判断当前节点是否有效 |
> | 11| public function recoverFromCorruption() | 恢复堆 |
> | 12| abstract protected function compare($value1, $value2) | 抽象方法用于比较两个元素的大小 |

```php
  <?php
		class myHeap extends SplHeap
		{
			public function compare($value1, $value2)
			{
				return $value1 > $value2 ? -1 :1;
			}
		}
		$sh=new myHeap();

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
```

>###5. SplMaxHeap-降序堆###
>继承自SplHeap,方法相同

```php
	<?php
		$sh=new SplMaxHeap();

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
```

>###6. SplMinHeap-升序堆###
>继承自SplHeap,方法相同

```php
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
```

>###7. SplPriorityQueue-优先级队列###
> | 编号 | 方法名称 | 方法描述 |
> |:------:|:------|:------|
> | 1 | public function compare($priority1, $priority2) | 比较两个优先级大小 |
> | 2 | public function insert($value, $priority) | 将$value插入队列，优先级为$priority |
> | 3 |  public function setExtractFlags ($flags) | 设置元素出队列模式 |
> | 4 | public function top()  | 返回堆顶部数据 |
> | 5 | public function count() | 计算堆中数据的个数 |
> | 6 | public function isEmpty() | 判断堆是否为空 |
> | 7 | public function rewind() | 重置指针位置 |
> | 8 | public function current() | 取得当前节点信息 |
> | 9 | public function key() | 取得当前节点的key |
> | 10| public function next() | 移动到下条记录 | 
> | 11| public function valid() | 判断当前节点是否有效 |
> | 12| public function recoverFromCorruption() | 恢复队列 |

```php
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

```

>###8. SplFixedArray-定长数组###
> | 编号 | 方法名称 | 方法描述 |
> |:------:|:------|:------|
> | 1 | public function count() | 计算定长数组中数据的个数 |
> | 2 | public function toArray() | 反回定长数组 |
> | 3 | public static function fromArray (array $array, $save_indexes = true) | 将数组导入到定长数组 |
> | 4 |   public function getSize () | 取得定长数组大小 |
> | 5 |   public function setSize () | 设置定长数组大小 |
> | 6 | public function offsetExists($index) | 判断$index节点是否存在 |
> | 7 | public function offsetGet($index) | 获取$index处的内容 |
> | 8 | public function offsetSet($index, $newval) | 设置$index处节点的内容为$newval |
> | 9 | public function offsetUnset($index) | 删除$index处节点 |
> | 10 | public function rewind() | 重置指针位置 |
> | 11 | public function current() | 取得当前节点信息 |
> | 12 | public function key() | 取得当前节点的key |
> | 13 | public function next() | 移动到下条记录 | 
> | 14 | public function valid() | 判断当前节点是否有效 |

```php
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
```



>###9. SplObjectStorage-对象容器###
> | 编号 | 方法名称 | 方法描述 |
> |:------:|:------|:------|
> | 1 | public function attach($object, $data = null) | 添加对象到对象容器中,$object是待存储的对象，$data是对象附属的数据 |
> | 2 | public function detach($object) | 将对象从对象容器中移除 |
> | 3 | public function contains($object) | 检查对象是否存在于容器中 |
> | 4 | public function addAll ($storage) | 添加容器$storage到当前容器 |
> | 5 | public function removeAll ($storage) | 从当前容器移除容器$storage |
> | 6 | public function removeAllExcept ($storage) | 从当前非容器$stirage的对象 |
> | 7 | public function setInfo ($data) | 设置当前节点关联数据 |
> | 8 | public function getInfo () | 获取当前节点关联数据 |
> | 9 | public function rewind() | 重置指针位置 |
> | 10 | public function current() | 取得当前节点信息 |
> | 11 | public function key() | 取得当前节点的key |
> | 12 | public function next() | 移动到下条记录 |
> | 13 | public function valid() | 判断当前节点是否有效 |
> | 14 | public function count() | 获取容器中节点的个数 |
> | 15 | public function serialize() | 容器序列化 |
> | 16 | public function unserialize ($serialized) | 将$serialized反序列化 |
> | 17 | public function offsetExists ($object) | 检查对象是否存在于容器中 |
> | 18 | public function offsetSet ($object, $data = null) | 设置$object的附属数据 |
> | 19 | public function offsetUnset ($object) | 从容器中移除对象$object |
> | 20 | public function offsetGet ($object) | 从容器中取得$object的附属数据 |
> | 21 | public function getHash($object)  | 获取指定对象的Hash值 |

```php
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

```

##四、迭代器##
>###1. ArrayIterator ###

```php
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

```
>###2. AppendIterator ###

```php
	<?php
		$arr1 = array('a', 'b', 'c');
		$arr2 = array('d', 'e', 'f');

		$obj_1 = new ArrayIterator($arr1);
		$obj_2 = new ArrayIterator($arr2);

		$it = new AppendIterator();
		//把ArrayIterator添加到AppendIterator
		$it->append($obj_1);
		$it->append($obj_2);

		foreach($it as  $key => $value)
		{
			echo $key .":" . $value ."  ";
		}
		echo PHP_EOL;

```

>###3. CachingIterator ###
>###4. CallbackFilterIterator ###
>###5. DirectoryIterator ###
>###6. EmptyIterator ###
>###7. FilesystemIterator ###

```php
    <?php
        date_default_timezone_set('prc');
        //.表示当前目录 
        $fit = new FileSystemIterator(".");

        foreach($fit as $finfo)
        {

            echo "-文件名为:" . $finfo->getFilename() . PHP_EOL;
            echo "|-文件类型为:" . $finfo->getType() . PHP_EOL;
            echo "|-文件大小为:" . number_format($finfo->getSize()) . PHP_EOL;
            echo "|-文件创建时间为:" . date('Y-m-d G:i:s', $finfo->getCTime()) . PHP_EOL;
            echo "|-文件修改时间为:" . date('Y-m-d G:i:s', $finfo->getMTime()) . PHP_EOL;
            echo PHP_EOL;
        }

```

>###8. FilterIterator ###
>###9. GlobIterator ###
>###10. InfiniteIterator ###
>###11. LimitIterator ###
>###12. MultipleIterator ###

```php
    <?php
        $idArr = array('001', '002', '003', '004');
        $nameArr = array('赵毅', '钱贰', '孙叁', '李四');
        $ageArr = array(22,33,44,55);

        $idIter = new ArrayIterator($idArr);
        $nameIter = new ArrayIterator($nameArr);
        $ageIter = new ArrayIterator($ageArr);

        $mit = new MultipleIterator(MultipleIterator::MIT_KEYS_ASSOC);
        $mit->attachIterator($idIter, 'ID');
        $mit->attachIterator($nameIter, 'NAME');
        $mit->attachIterator($ageIter, 'AGE');

        foreach($mit as $key => $value)
        {
            print_r($value);
        }
        echo PHP_EOL;

```

>###13. NoRewindIterator ###
>###14. InfiniteIterator ###
>###15. ParentIterator ###
>###16. RecursiveArrayIterator ###
>###17. RecursiveCachingIterator ###
>###18. RecursiveCallbackFilterIterator ###
>###19. RecursiveDirectoryIterator ###
>###20. RecursiveFilterIterator ###
>###21. RecursiveIteratorIterator ###
>###22. RecursiveRegexIterator ###
>###23. RecursiveTreeIterator ###
>###24. RegexIterator ###

##五、接口##
>###1. Countable###
>>实现了该接口的类可以直接调用count()

```php
	<?php
		class Count_1 implements Countable
		{
			protected $_count = 6;
			//实现接口中的count方法
			public function count()
			{
				return $this->_count;
			}
		}

		$obj = new Count_1();
		echo count($obj);
```


>###2. OuterIterator###
>>对迭代器进行一定处理后返回(IteratorIterator实现了该接口的类)

```php
	<?php
		class Outer extends IteratorIterator
		{
			//重写current
			public function current()
			{
				return parent::current() ."_my";
			}

			//重写key
			public function key()
			{
				return "Pre_" . parent::key();
			}
		}

		$arr = array('v1', 'v2', 'v3', 'v4');
		$obj = new Outer(new ArrayIterator($arr));

		$obj->rewind();
		while($obj->valid())
		{
			echo $obj->key() . "==" .$obj->current() . PHP_EOL;
			$obj->next();
		}

```

>###3. RecursiveIterator###
>>可以对多层结构的迭代器进行迭代，比如遍历一棵树或遍历文件夹

>###4. SeekableIterator###
>>可以通过seek方法定位到集合里面的某个特定元素

##六、异常##
>###1.  BadFunctionCallException ###
>###2.  BadMethodCallException ###
>###3.  DomainException ###
>###4.  InvalidArgumentException ###
>###5.  LengthException ###
>###6.  LogicException  ###
>###7.  OutOfBoundsException ###
>###8.  OutOfRangeException ###
>###9.  OverflowException ###
>###10. RangeException ###
>###11. RuntimeException ###
>###12. UnderflowException ###
>###13. UnexpectedValueException ###

##七、函数##
>###1. class_implements ###
>>返回指定的类实现的所有接口(可以用instanceof语句判断某个对象是否实现了某个接口或是某个类的实例）

>###2. class_parents ###
>>返回指定类的父类(如果有多次继承，会把所有的父类都打印出来)

>###3. class_uses ###

>###4. iterator_apply ###
>>为迭代器中每个元素调用一个用户自定义函数

>###5. iterator_count ###
>>计算迭代器中元素的个数

>###6. iterator_to_array ###
>>将迭代器中的元素拷贝到数组

>###7. spl_autoload_call ###
>###8. spl_autoload_extensions ###

```php
	<?php
		$CLASS_PATH="D:/class/";
        //设定类文件后缀名,可以传入多个后缀名使用逗号
        spl_autoload_extensions('.class.php');
        //设定引用的路径
        set_include_path(get_include_path().PATH_SEPARATOR .$CLASS_PATH);
		//提示php使用autoload机制查找类定义
        spl_autoload_register();
```

>###9.spl_autoload_register ###

```php
	<?php
		function classLoader($_classname)
		{
			require_once("./class/" .  $_classname ."class.php";
		}
		//加载自己的autoload方法
		spl_autoload_register(classLoader);
```

>###10. spl_autoload_functions ###
>###11.spl_autoload_unregister ###
>###12.spl_autoload ###

```php
	<?php
	 		function classLoader($_classname)
	        {
	            set_include_path("./lib");
	            //设定系统自动查找类文件
	            spl_autoload($_classname);
	        }
			//加载自己的autoload方法
			spl_autoload_register(classLoader);
```

>###13.spl_classes ###
>###14.spl_object_hash ###


##八、文件处理##
>###1. SplFileInfo ###

```php
	<?php
		$file = new SplFileInfo('Countable.php');
		echo "文件创建时间为:" . date('Y-m-d G:i:s', $file->getCtime()) .PHP_EOL;
		echo "文件修改时间为:" . date('Y-m-d G:i:s', $file->getMtime()) .PHP_EOL;
		echo "文件大小为:" . date('Y-m-d G:i:s', $file->getSize()) .PHP_EOL;
	
		//读取文件内容
		$obj = $file->openFile('r');
		while($obj->valid())
		{
			//读取文件中的一行数据
			echo $obj->fgets();
	
		}
		//关闭打卡文件
		$obj =null;
		$file =null;
```

>###2. SplFileObject ###
>###3. SplTempFileObject ###

##九、文件处理##
>###1. ArrayObject — The ArrayObject class ###
>###2. SplObserver — The SplObserver interface ###
>###3. SplSubject — The SplSubject interface ###
