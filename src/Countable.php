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
