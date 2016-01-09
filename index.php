<?php
/**
 * Dashboard Login file
 * @author Shahriar
 * @version 1.0.1
 * @2015
*/
	session_start();
	if(!isset($_SESSION['logged'])) header('location: login');
    
    if(isset($_SESSION['logged']) && isset($_GET['db'])) {
        $_SESSION['dbname']=$_GET['db'];
        
        if(isset($_SESSION['type']) && $_SESSION['type']==0) {
            header('location: page/query-viewer');
        }
        else header('location: page/reports');
    }

    $pages=array('index','header','footer','404','nav');
	
	require_once('config/function.php');
	
	require_once('admin/header.php');
    if(isset($_GET['page'])) {
        if(file_exists("admin/".$_GET['page'].".php") && !in_array($_GET['page'], $pages)) {
            require_once('admin/nav.php');
            require_once('admin/'.$_GET['page'].'.php');
        }
        else require_once('admin/404.php');
    }
    else {
        require_once('admin/nav.php');
        require_once('admin/dashboard.php');
    }
	require_once('admin/footer.php');