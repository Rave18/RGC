<?php 



session_start();

		include "connection.php";
		global $query;
		$query=$conn->prepare("select * from tblproducts ");
		$query->execute();
		


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
   
      		<h3 style="font-family:Cambria;text-align:center"><a href="finishedproduct.php">All Finished Product</a>      |<a href="lowstock.php">Critical Level</a>  </h3>    
		
		
</br>
<article>

		 <div>
	 <table class="table table-bordered table-hover">
	 <tr><th>Item Code</th><th>Product Name</th><th>Quantity</th><th>Price</th><th></th></tr>
	 <?php
	 
	 while($row=$query->fetch(PDO::FETCH_ASSOC)){
		 echo "<tr><td>".$row["Item_Code"]."</td><td>".$row["ProductName"]."</td><td>".$row["Quantity"]."</td><td>".$row["Price"]."</td><td><a href='addstock?id=".$row["ID"]."'><button type='button' class='btn btn-info' id='okay'  data-toggle='modal' data-target='#myModal' style='float:left;'>ADD STOCK  </a></td></tr>";
		 
	 }
	 
	 ?>
	 </table>
	 </div>
 </article>

</body>
</html>
