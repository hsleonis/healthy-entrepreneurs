<?php
/**
 * AlQuran Doa API
 * @author Shahriar
 * @version 1.0.1
*/

 $data = json_decode(file_get_contents("php://input"));
 if(!$data) die();
 $sub = mysql_real_escape_string($data->sub);
 
 if($sub=='addDoa'){	// Add New Doa
 	$args=array(
		'doa_name' => $data->doaName,
		'doa_details' => $data->doaDet,
		'doa_lang' => $data->doaLang,
		'doa_type' => $data->doaType
	);

	$chk=insert_data('q_doa', $args);
	if($chk) echo success_json();
	else echo err_json();
 }
 elseif($sub=='getDoa'){	// Get all Doa list
 	print_r(table_data('q_doa','1','doa_id,doa_name,doa_type,doa_lang'));
 }
 elseif($sub=='delDoa'){	// Delete Doa
 	$chk=delete_data('q_Doa', "doa_id='$data->doaID'");
 	if($chk) success_json();
	else echo err_json();
 }
 else echo err_json();