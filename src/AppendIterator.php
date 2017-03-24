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

