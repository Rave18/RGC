<?php 



session_start();

		include "connection.php";
		

	?>
	<?php 
	function load_inventory(){
		include "connection.php";
		global $query;
		$query=$conn->prepare("select * from tblproducts");
		$query->execute();
		
	}
	load_inventory();

?>
<html>
<head>
<title>Rave's Gaming Cafe</title>
	<style>

	</style>
<meta charset="utf-8">
<meta name="viewport" content= "width=device-width, initial-scaling=1"/>
<script type="text/javascript" src= "jquery/jquery-3.2.1.min.js"> </script>
<script type="text/javascript" src= "bootstrap/js/bootstrap.min.js"> </script>
<link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>

</head>
<body>

<?php
	include "adminnav.php"
   ?>
   
        <h2 style="text-align: center"><b>Update Product</b> </h2>
		
		<table class="table table-bordered table-hover">
	 <tr><th>Product Name</th><th>Quantity</th><th>Price</th></tr>
	 <?php
	 while($row=$query->fetch(PDO::FETCH_ASSOC)){
		 echo "<tr><td>".$row["ProductName"]."</td><td><a href='updatequantity.php?id=".$row["ID"]."'>".$row["Quantity"]."</td><td><a href='updateprice.php?id=".$row["ID"]."'> ".$row["Price"]."</td></tr>";
		 
	 }
	 ?>
		

</body>
</html>
