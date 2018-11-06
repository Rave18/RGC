<?php 



session_start();

		include "connection.php";

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
   
        <h2 style="text-align: center"><b>Products</b> </h2>
		<h3 style="font-family:Cambria;text-align:center"><a href="junk.php">Junk Foods</a>      |<a href="drinks.php">Drinks</a>      |<a href="cigarettes.php">Cigarettes</a>      |     <a href="candy.php">Candy</a>|     <a href="noodles.php">Noodles</a>|     <a href="others.php">Others</a></h3>
		
<?php

		$query=$conn->prepare("select * from tblproducts where productcategory= 'Candy' ");
		$query->execute();
	
	
	 while($row=$query->fetch(PDO::FETCH_ASSOC)){
		 
		echo "<section class='col'>
<a href=".$row["ProductName"]."><a href='proddesc.php?id=".$row["ID"]."'>
			<h4 style='margin-left:400px'><strong>".$row["ProductName"]."</strong></h4>
		
			</div>
		
		</section>
	"; 	

		}
	

?>


</br>

</body>
</html>
