<?php
/**
 * AlQuran Sura API for Apps
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
		$json['page_remain']=11-$page; // DB should contain 114 Sura
		
		$arab=getSuraList('Arabic',$page_start);	// Select Arabic manually
		$eng=getSuraList('English',$page_start);	// Select English manually
		
		$json['data']['arabic']=json_decode($arab);
		$json['data']['english']=json_decode($eng);
	
		if(isset($_POST['lang']) && $_POST['lang']!=''){
			$select=$_POST['lang'];
			$other=getSuraList($select,$page_start);	// Select language
			$json['data'][$select]=json_decode($other);
			if($json['data'][$select]==null) $json['data'][$select]=array();
			else array_walk($json['data'][$select],"suraInfo");
		}
		
		$json['success']=1;
		if($json['data']['arabic']==null) {
			$json['message']='Sura not found!';
			$json['data']['arabic']=array();
			$json['success']=0;
		}
		else {
			$json['message']='Sura Found!';
			array_walk($json['data']['arabic'],"suraInfo");
		}
		if($json['data']['english']==null) $json['data']['english']=array();
		else array_walk($json['data']['english'],"suraInfo");
		
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

function getSuraList($select,$page_start){
	return table_data('q_sura',"sura_lang='".$select."' and sura_type='0' order by sura_no limit $page_start,10","sura_id,sura_no,sura_name,sura_info");
}

function suraInfo(&$item){
	$item->sura_info = json_decode($item->sura_info);
}

