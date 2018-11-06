<?php 

global $query;

		include "connection.php";
	
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

<?php
	include "adminnav.php"
   ?>
   
        <h2 style="text-align: center"><b>Inventory Report</b> </h2>
		
		
		<h3 style="font-family:Cambria;text-align:center">Daily   </h3>
		
		<h3 style="font-family:Cambria;text-align:center"><a href="sales_report.php">All Products</a>      |<a href="bought.php">Bought Products</a></h3>
	<article>
		 <div>
	 <table class="table table-bordered table-hover">
	 <tr><th>Product Name</th><th>Quantity</th><th>Price</th><th>Bought Products</th></tr>
	 <?php

	 while($row=$query->fetch(PDO::FETCH_ASSOC)){
		 echo "<tr><td>".$row["ProductName"]."</td><td>".$row["Quantity"]."</td><td>".$row["Price"]."</td><td>".$row["Bought"]."</td>	</tr>";
		 
	 }
	 
	 
	 
	 ?>

 
 
<?php
If(isset($_POST["addbutton"])){

$query=$conn->prepare("update tblproducts set Bought=0");
$query->execute();
	$error="Reset Successful";
}

?>


	 </table>
	 
	 
	 </div>
 </article>

 
</br>

		<Form method="POST">
	
		<input type="submit" value="Reset" name="addbutton" class="btn btn-primary">
</form>
<script>
	$(document).ready(function(){
	<?php
	if(isset($error)){
		?>
		$("#error").modal("show");
		<?php
	}
	?>
		});
</script>


</head>

<body>
<div id = "error" class = "modal fade" role = "dialog">
	<div class = "modal-dialog">
	<div class = "modal-content">
		<div class = "modal-header">
		<div class = "modal-title">Sucess
		</div>
		</div>
		<div class = "modal-body">
		<?php echo $error; ?>
		</div>
		<div class = "modal-footer">
			<button class = "btn btn-primary" data-dismiss = "modal" onclick = "window.location.replace('sales_report.php');">OK</button>
		</div>
	</div>
	</div>
</div>
</head>
<body>
</head>
<body>

	
</body>
</html>
