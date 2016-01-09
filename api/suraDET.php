<?php
/**
 * AlQuran Sura Details API for Apps
 * @author Shahriar
 * @version 1.0.1
*/


header('Content-Type: application/json; charset=utf8');

if(isset($_POST['api']) && isset($_POST['suraNo'])) {

	$var = sql_data('q_admin');
	if(md5($_POST['api'])==$var['uapi']){
	
		$id=$_POST['suraNo'];
		$arab=getSura('Arabic',$id,0);	// Select Arabic
		
		$json=array();
		$json['data']=array();
		$json['data']['arabic']=json_decode($arab);
		
		if(isset($_POST['lang'])){
			$select=$_POST['lang'];
			$other=getSura($select,$id,1);
			$meaning=getSura($select,$id,0);
			
			$json['data'][$select]=json_decode($other);
			if($json['data'][$select]==null) $json['data'][$select]=array();
			else {
				array_walk($json['data'][$select],"detailsInfo");
				$json['data'][$select]=$json['data'][$select][0]->sura_details;
			}
			
			$json['data']['meaning']=json_decode($meaning);
			if($json['data']['meaning']==null) $json['data']['meaning']=array();
			else {
				array_walk($json['data']['meaning'],"detailsInfo");
				$json['data']['meaning']=$json['data']['meaning'][0]->sura_details;
			}
		}
		
		$json['success']=1;
		if($json['data']['arabic']==null) {
			$json['message']='Sura not found!';
			$json['success']=0;
			$json['data']['arabic']=array();
		}
		else {
			$json['message']='Sura Found!';
			array_walk($json['data']['arabic'],"detailsInfo");
			$json['data']['arabic']=$json['data']['arabic'][0]->sura_details;
		}
		
		echo json_encode($json,JSON_UNESCAPED_UNICODE);
	}
	else {
		echo err_json('Wrong API key');
	}
}
else {
	echo err_json('No API key');
}


function getSura($select,$serial,$type){
	return table_data('q_sura',"sura_lang='".$select."' and sura_no='".$serial."' and sura_type='".$type."'","sura_details");
}

function detailsInfo(&$item){
	$item->sura_details = json_decode($item->sura_details);
}