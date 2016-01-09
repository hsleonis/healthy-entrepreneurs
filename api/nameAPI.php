<?php
/**
 * AlQuran Name API for Apps
 * @author Shahriar
 * @version 1.0.1
*/
header('Content-Type: application/json; charset=utf8');
//
if(isset($_POST['api'])) {
	$var = sql_data('q_admin');
	if(md5($_POST['api'])==$var['uapi']){
//

		$json=array();
		$json['data']=array();
		$json['data']['Arabic']=array();
		$json['data']['English']=array();
		$json['data']['Arabic']=getNameList('Arabic');
		$json['data']['English']=getNameList('English');
	
		if(isset($_POST['lang']) && $_POST['lang']!='' && $_POST['lang']!='English') {
			$select=$_POST['lang'];
			$json['data'][$select]=array();
			$json['data'][$select]=getNameList($select);
		}
		else {
			//$Name=getNameList();
			//$json['data']=json_decode($Name); // Select All
		}
		
		$json['success']=1;
		if($json['data']['Arabic']==null) {
			$json['message']='Name not found!';
			$json['data']=array();
			$json['success']=0;
		}
		else {
			$json['message']='Names Found!';
		}
		
		echo json_encode($json,JSON_UNESCAPED_UNICODE);
//
	}
	else {
		echo err_json('Wrong API Key');
	}
}
else {
	echo err_json('No API Key');
}
//

function getNameList($lang=''){
	$result=@mysql_query("SELECT name_details FROM q_allah_name WHERE name_lang='".$lang."'");
	$chk=@mysql_num_rows($result);
	$row=array();
	while($value=@mysql_fetch_assoc($result)){
		array_push($row,$value['name_details']);
	}
	//var_dump($row);
	
	return $row;
}
