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
