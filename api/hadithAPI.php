<?php
/**
 * AlQuran Hadith API for Apps
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
		
		if(isset($_POST['page']))
		$page=$_POST['page'];
		else
		$page=0;
		
		$page_start=$page*10;
	
		if(isset($_POST['lang']) && $_POST['lang']!=''){
			$select=$_POST['lang'];
			$other=getHadithList($select,$page_start);	// Select language
			$json['data']=json_decode($other);
			$json['page_remain']=totalHadithPage($select)-$page-1;
		}
		else {
			$hadith=getHadithList('',$page_start);
			$json['data']=json_decode($hadith); // Select All
			$json['page_remain']=totalHadithPage()-$page-1;
		}
		
		$json['success']=1;
		if($json['data']==null) {
			$json['message']='Hadith not found!';
			$json['data']=array();
			$json['success']=0;
		}
		else {
			$json['message']='Hadith Found!';
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

function getHadithList($lang,$page_start){
	if($lang!='') return table_data('q_hadith',"hadith_lang='$lang' limit $page_start,10");
	return table_data('q_hadith',"1 limit $page_start,10");
}

function totalHadithPage($lang=''){
	if($lang!='')
	$query=@mysql_query("select count(hadith_id) as total_hadith from q_hadith where hadith_lang='$lang'");
	else
	$query=@mysql_query("select count(hadith_id) as total_hadith from q_hadith");
	
	$obj=@mysql_fetch_object($query);
	$count=($obj->total_hadith==0)?0:ceil($obj->total_hadith/10);
	return $count;
}
