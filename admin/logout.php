<?php
	/**
	 * Dashboard App Logout File
	 * @author Shahriar
	 * @version 1.0.1
	*/
	
	session_start();
    unset($_SESSION['logged']);
	session_destroy();