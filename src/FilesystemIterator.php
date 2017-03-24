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

