<?php

include ("../PDO_Login_Connect.php");

$icode =filter_input(INPUT_GET, "ITEM_CODE");

$qry = $connect->prepare("SELECT * FROM tblstock WHERE ITEM_CODE = :icode");

$qry->bindParam("icode", $icode);
$qry->execute();

$rows =$qry->fetchAll(PDO::FETCH_ASSOC);
if($rows){
	//$nme =$rows[0]["ITEM_NAME"];
	print json_encode(array("ErrorCode" => "Error 2", "Message", "Item found."));
}else{
	print json_encode(array("ErrorCode" => "Error 1", "Message", "No record found."));
}	