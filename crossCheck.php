<?php
include "dbcontroller.php";
$db_handle = new DBController();
extract($_GET);
if ($id != null) {
    @$CrossCheck = "SELECT `firstName`, `middleName`, `lastName` FROM `person` WHERE `id` = '$id'";
    $responseData = $db_handle->runQuery($CrossCheck);
    @$responseData = $responseData[0];
    if ($responseData != null){
        echo $responseData['firstName']." ".$responseData['middleName']." ".$responseData['lastName'];
    }
    else{
        echo "Person Not Found";
    }
} else{
    echo "ID required";
}
