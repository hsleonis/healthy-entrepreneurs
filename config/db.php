<?php
/**
 * AlQuran DB functions File
 * @author Shahriar
 * @version 1.0.1
*/

/**
 * Print data without error
 * @param var
 */
 function ollo($val){
 	if(!empty($val) && $val && $val!=null) echo $val;
	elseif($val==0 || $val=='0') echo "0";
 }

/**
 * Get table data
 * @param table name,condition
 */
function table_data($tbl,$cond="1",$param='*'){
	$result=@mysql_query("SELECT ".$param." FROM ".$tbl." WHERE ".$cond);
	$chk=@mysql_num_rows($result);
	if($chk>0){
		$row=array();
		while($value=@mysql_fetch_assoc($result)){
			array_push($row,$value);
		}
		return json_encode($row);
	}
	else return null;
}

 /**
  * Get data from table
  * @param table,$cond
  * @return object if true, else false
  */
  function sql_data($tbl,$cond="1",$limit=""){
  	if($limit=="") $limit=" LIMIT 1";
  	$query=@mysql_query("SELECT * FROM ".$tbl." WHERE ".$cond.$limit);
	if(mysql_valid($query)){
		$data=@mysql_fetch_assoc($query);
		return $data;
	}
	else return false;
  }

  /**
 * Update data into table
 * @param table,data array,condition
 */
 function update_data($tbl,$args,$cond="1"){
	  $query = "UPDATE $tbl SET ";
	  $sep = '';
	  foreach($args as $key=>$value) {
	    $query .= $sep.$key.' = "'.$value.'"';
	    $sep = ',';
	  }
	  $query .= ' WHERE '.$cond;
	  $sql=@mysql_query($query);
	  return $sql;
 }

/**
 * Insert data into table
 * @param table,data array
 */
 function insert_data($tbl,$args){
 	$columns = implode(", ",array_keys($args));
	$escaped_values = array_map('mysql_real_escape_string', array_values($args));
	$values  = implode("', '", $escaped_values);
	$query = "INSERT INTO ".$tbl."($columns) VALUES ('$values')";
	$sql =@mysql_query($query);
	return $sql;
 }
 
  /**
   * Check if data parsed from MySQL table
   * @param MySQL object
   * @return bool
   */
	function mysql_valid($result){
	  	if($result){
	  	if(mysql_num_rows($result)>0) return true;}
		else return false;
  }
	
  /**
   * Delete data
   * @param table,condition
   * @return bool
   */
	function delete_data($tbl,$cond){
		$chk=@mysql_query("DELETE FROM ".$tbl." WHERE ".$cond);
		if($chk) return TRUE;
		else return FALSE;
	}