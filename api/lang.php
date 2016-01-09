<?php
/**
 * AlQuran Language API
 * @author Shahriar
 * @version 1.0.1
*/

 $data = json_decode(file_get_contents("php://input"));
 if(!$data) die();
 $sub = mysql_real_escape_string($data->sub);
 
 if($sub=='addLang'){	// Add new language
 	$args=array(
		'lang_name' => $data->langName
	);
	$chk=insert_data('q_lang', $args);
	if($chk) success_json();
	else err_json();
 }
 else if($sub=='getLang'){	// Get all language
 	print_r(table_data('q_lang'));
 }
 else if($sub=='delLang'){	// Delete language
 	$chk=delete_data('q_lang', "lang_id='".$data->langID."'");
 	if($chk) success_json();
	else err_json();
 }