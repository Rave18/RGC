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
		
		
<?php

		$query=$conn->prepare("select ProductCategory, ID from tblproducts ");
		$query->execute();
	
	
	 while($row=$query->fetch(PDO::FETCH_ASSOC)){
		 
		echo "<section class='col'>
<a href=".$row["ProductCategory"]."><a href='proddesc.php?id=".$row["ID"]."'>
			<h4 style='margin-left:400px'><strong>".$row["ProductCategory"]."</strong></h4>
		
			</div>
		
		</section>
	"; 	

		}
	

?>


</br>

</body>
</html>