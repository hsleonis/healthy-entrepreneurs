<?php
/**
 * AlQuran Name API
 * @author Shahriar
 * @version 1.0.1
*/

 $data = json_decode(file_get_contents("php://input"));
 if(!$data) die();
 $sub = mysql_real_escape_string($data->sub);
 
 if($sub=='addName'){	// Add New Name
 	$args=array(
		'name_details' => $data->nameName,
		'name_lang' => $data->nameLang
	);
	$chk=insert_data('q_allah_name', $args);
	if($chk) echo success_json();
	else echo err_json();
 }
 else if($sub=='getName'){	// Get All Names
 	print_r(table_data('q_allah_name'));
 }
 else if($sub=='delName'){	// Delete Name
 	$chk=delete_data('q_allah_name', "name_id='".$data->nameID."'");
 	if($chk) echo success_json();
	else echo err_json();
 }