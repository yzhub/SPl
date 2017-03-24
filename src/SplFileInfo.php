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
?>

