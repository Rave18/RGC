<?php

include ("../PDO_Login_Connect.php");


$icode =filter_input(INPUT_GET, "ITEM_CODE");

$qry = $connect->prepare("SELECT ITEM_NAME,ITEM_PRICE,DESCRIPTION FROM tblstock WHERE ITEM_CODE = :icode AND DESCRIPTION != 'removed'");

$qry->bindParam("icode", $icode);
$qry->execute();

$rows =$qry->fetchAll(PDO::FETCH_ASSOC);
if($rows){
	//$nme =$rows[0]["ITEM_NAME"];
	print json_encode($rows);
}else{
	$norows  = array("null-OBJECT","null-OBJECT","null-OBJECT" );
	print json_encode($norows);
}