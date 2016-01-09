<?php

$data = json_decode(file_get_contents("php://input"));
if(!$data) die();

$auth= mysql_real_escape_string($data->auth);

if(isset($auth) && $auth=='true'){
     echo success_json('Registration successful.');
}
else echo err_json('Registration failed!');