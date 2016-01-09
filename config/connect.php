<?php
/**
 * Dashboard DB Connect File
 * @author Shahriar
 * @version 1.0.1
*/
 
 $con=@mysql_connect('localhost','','');
 if($con) {
	$db=@mysql_select_db('');
	if(!$db)
	echo "DB error!";
 }
 else
	echo "Connection Error";
