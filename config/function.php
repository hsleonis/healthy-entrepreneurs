<?php
	/**
	 * Dashboard Main Functions File
	 * @author Shahriar
	 * @version 1.0.1
	*/
	
	/**
	 * Check if url is valid
	 * @return bool
	 */
	function url_valid(){
		$pages=array('index','header','footer','404');
		if(isset($_GET['page']) && file_exists("admin/".$_GET['page'].".php")){
				if(in_array($_GET['page'], $pages)) return FALSE;
				else return TRUE;
			}
		else return FALSE;
	}
	
	/**
	 * Success JSON API
	 * @return json
	 */
	 function success_json($msg='Completed'){
	 	$args=array();
		$args['success']=1;
		$args['message']=$msg;
		return json_encode($args);
	 }
	
	/**
	 * Error JSON API
	 * @return json
	 */
	 function err_json($msg='Error'){
		$args=array();
		$args['success']=0;
		$args['message']=$msg;
		return json_encode($args);
	 }

	 /**
	 * login user
	 * @param username, password, user_table
	 * @return json data
	 */
	 function login(array $info){
		$user=@mysql_real_escape_string($info['username']);
		$pass=@mysql_real_escape_string($info['password']);
		$table=@mysql_real_escape_string($info['table']);
		$colu=@mysql_real_escape_string($info['col_username']);
		$colp=@mysql_real_escape_string($info['col_password']);
		// Find user data
		$row=@mysql_query("SELECT * FROM ".$table." WHERE ".$colu."='$user' and ".$colp."='$pass'");
		$chk=@mysql_num_rows($row);
		$Login=array(
			'success' => 0
		);
		// Checking layer 1
		if($chk>0){
			$data=@mysql_fetch_assoc($row);
			// Checking layer 2
			if($user==$data["$colu"] && $pass==$data["$colp"]){
				$_SESSION['logged']=1;
				$_SESSION['match']=$data['status'];
				$data=array_merge($data,array(
					'success' => 1
				));
				return json_encode($data);
			}
			return json_encode($Login);
		}
		return json_encode($Login);
	}
	 
	 /**
	 * Message Alert
	 * @return void
	 */
	 function alert($msg=""){
	 	if($msg)
		echo "<script>alert('$msg');</script>";
		else
	 	echo "<script>alert('Error! Recheck input data.');</script>";
	 }
