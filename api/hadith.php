<?php
/**
 * AlQuran Hadith API
 * @author Shahriar
 * @version 1.0.1
*/

 $data = json_decode(file_get_contents("php://input"));
 if(!$data) die();
 $sub = mysql_real_escape_string($data->sub);

 if($sub=='addHadith'){	// Add new hadith
 	$args=array(
		'hadith_book' => $data->hadithBook,
		'hadith_ref' => $data->hadithRef,
		'hadith_details' => $data->hadithDet,
		'hadith_lang' => $data->hadithLang,
		'hadith_type' => $data->hadithType
	);

	$chk=insert_data('q_hadith', $args);
	if($chk) echo success_json('Successfully added!');
	else echo err_json('Insert failed!');
 }
 elseif($sub=='getHadith'){	// Get all hadith list
 	print_r(table_data('q_hadith','1','hadith_id,hadith_book,hadith_ref,hadith_type,hadith_lang'));
 }
 elseif($sub=='delHadith'){	// Delete hadith
 	$chk=delete_data('q_hadith', "hadith_id='".$data->hadithID."'");
 	if($chk) echo success_json('Deleted!');
	else echo err_json('Deletion failed!');
 }
 else echo err_json();