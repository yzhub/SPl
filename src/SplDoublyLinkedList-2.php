<?php
	$sql = new SplDoublyLinkedList();

	$sql->push('a');
	$sql->push('b');
	$sql->push('c');
	$sql->push('d');
	$sql->push('e');

	$sql->rewind();

	$sql->next();	
	echo "当前指针位置=>" . $sql->key() . PHP_EOL;
	echo $sql->valid()? "节点有效，节点内容为=>" . $sql->current() . PHP_EOL : "节点无效\n"; 

	$sql->offsetUnset($sql->key());

	echo "当前指针位置=>" . $sql->key() . PHP_EOL;
	echo $sql->valid()? "节点有效，节点内容为=>" . $sql->current() .PHP_EOL : "节点无效\n"; 
	
	
