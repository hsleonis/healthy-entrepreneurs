<?php
/**
 * AlQuran Doa API for Apps
 * @author Shahriar
 * @version 1.0.1
*/
header('Content-Type: application/json; charset=utf8');

if(isset($_POST['api'])) {
	$var = sql_data('q_admin');
	if(md5($_POST['api'])==$var['uapi']){

		$json=array();
		$json['data']=array();
		
		if(isset($_POST['page']))
		$page=$_POST['page'];
		else
		$page=0;
		
		$page_start=$page*10;
		
		if(isset($_POST['lang']) && $_POST['lang']!=''){
			$select=$_POST['lang'];
			$other=getDoaList($select,$page_start);	// Select language
			$json['data']=json_decode($other);
			$json['page_remain']=totalDoaPage($select)-$page-1;
		}
		else {
			$doa=getDoaList('',$page_start);
			$json['data']=json_decode($doa); // Select All
			$json['page_remain']=totalDoaPage()-$page-1;
		}
		
		$json['success']=1;
		if($json['data']==null) {
			$json['message']='Doa not found!';
			$json['data']=array();
			$json['success']=0;
		}
		else {
			$json['message']='Doa Found!';
		}
		
		echo json_encode($json,JSON_UNESCAPED_UNICODE);
	}
	else {
		echo err_json('Wrong API Key');
	}
}
else {
	echo err_json('No API Key');
}

function getDoaList($lang,$page_start){
	if($lang!='') return table_data('q_doa',"doa_lang='$lang' limit $page_start,10");
	return table_data('q_doa',"1 limit $page_start,10");
}

function totalDoaPage($lang=''){
	if($lang!='')
	$query=@mysql_query("select count(doa_id) as total_doa from q_doa where doa_lang='$lang'");
	else
	$query=@mysql_query("select count(doa_id) as total_doa from q_doa");
	
	$obj=@mysql_fetch_object($query);
	$count=($obj->total_doa==0)?0:ceil($obj->total_doa/10);
	return $count;
}
