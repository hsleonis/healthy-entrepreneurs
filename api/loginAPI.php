<?php

$data = json_decode(file_get_contents("php://input"));
if(!$data) {
    echo err_json('You are unauthorized!');
    die();
}

$auth = $data->code;

if(isset($auth) && $auth==1) {
     session_start();
     $_SESSION['logged'] = $data->userinfo->id;
     $_SESSION['hash'] = $data->hash;
     $_SESSION['type'] = $data->userinfo->type;
    
     echo success_json('Login successful.');
}
else if(isset($auth) && $auth==7) {
    session_start();
    $response =array();
    $response['hash'] = $_SESSION['hash'];
    print_r(json_encode($response));
}
else echo err_json('Login failed!');