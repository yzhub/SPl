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
