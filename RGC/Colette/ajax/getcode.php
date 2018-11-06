<?php

include ("../PDO_Login_Connect.php");


$icode =   filter_input(INPUT_GET, "ITEM_CODE") ;

$qry = $connect->prepare("SELECT ITEM_CODE FROM tblstock WHERE ITEM_CODE LIKE :code  ");
  $qry->bindValue(":code", '%'.$icode.'%');

$qry->execute();
$result=$qry->rowCount();
$row=$qry->fetch(PDO::FETCH_ASSOC);
if($result){
	
        

	//$nme =$rows[0]["ITEM_NAME"];
	
	print json_encode($row["ITEM_CODE"]);
	
	
}else{
	$norows  = array("null-OBJECT");
	print json_encode($norows);
}
