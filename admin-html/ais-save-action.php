<?php
//if (isset($_POST['ais-save-action'])){
//    print_r($_POST);
//}else{
//    echo 'No Action';
//}
//
//echo 'success';
//print_r($_POST);
//
//$token = null;
//$headers = apache_request_headers();
//print_r($headers);
//print_r($headers['Authorization']);
//if(isset($headers['Authorization'])){
//    $matches = array();
//    preg_match('/Token token="(.*)"/', $headers['Authorization'], $matches);
//    if(isset($matches[1])){
//        $token = $matches[1];
//    }
//}

header('Content-Type: application/json');
echo json_encode($_POST['data']);
