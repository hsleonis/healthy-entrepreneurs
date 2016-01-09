<?php
/**
 * Dashboard API Index
 * @author Shahriar
 * @version 1.0.1
*/
	require_once('../config/function.php');
	//require_once('../config/connect.php');
	//require_once('../config/db.php');
	if(isset($_GET['page']) && file_exists($_GET['page'].'.php')){
		require_once($_GET['page'].'.php');
	}
	else echo err_json();
