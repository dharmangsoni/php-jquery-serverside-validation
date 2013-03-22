<?php

    $error = array();
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $res = "success";
    $detail = null;
    
    if (is_null($username) || $username == "") {
        $error[] = "Please Provide username";
        $res = "error";
    }
    if (is_null($password) || $password == "") {
        $error[] = "Please Provide password";
        $res = "error";
    }
    
    $res = array("response" => $res, "detail" => $error);
    
    echo json_encode($res);
?>
