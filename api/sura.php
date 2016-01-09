<?php
/**
 * AlQuran Sura API
 * @author Shahriar
 * @version 1.0.1
*/

 $data = json_decode(file_get_contents("php://input"));
 if(!$data) die();
 $sub = mysql_real_escape_string($data->sub);
 
 if($sub=='addSura'){	// Add new language
 	$args=array(
		'sura_id' => '',
		'sura_no' => $data->suraNo,
		'sura_name' => $data->suraName,
		'sura_details' => isset($data->suraAyat)?json_encode($data->suraAyat):'',
		'sura_info' => json_encode($data->suraInfo),
		'sura_lang' => $data->suraLang,
		'sura_type' => $data->suraType
	);

	$chk=insert_data('q_sura', $args);
	if($chk) success_json();
	else err_json();
 }
 elseif($sub=='getSura'){	// Get all sura list
 	print_r(table_data('q_sura','1','sura_id,sura_no,sura_name,sura_lang,sura_type'));
 }
 elseif($sub=='delSura'){	// Delete sura
 	$chk=delete_data('q_sura', "sura_id='".$data->suraID."'");
 	if($chk) success_json();
	else err_json();
 }
 else err_json();