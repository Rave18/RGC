<?php
if(isset($_POST["edit"])){

	
		include "connection.php";
		$id=$_GET["id"];
		$stock=filter_input(INPUT_POST,"stocks");
	$query=$conn->prepare("update tblProducts set Quantity=Quantity + :stock where ID=:id ");
		$query->bindParam("stock",$stock);
		$query->bindParam("id",$id);
			
		$query->execute();
		$error="Stocks updated successfully!";
	}

	
	
	

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
			<button class = "btn btn-primary" data-dismiss = "modal" onclick = "window.location.replace('addstock.php?id=<?php print $id; ?>');">OK</button>
		</div>
	</div>
	</div>
</div>
</head>
<body>

<?php
	include "adminnav.php"
   ?>
   
   
	   <h2 style="text-align: center"><b>Update Product</b> </h2>
		
		
		
		

			<form method="post">

		<?php 

		
		include "connection.php";
		$id=$_GET["id"];
		$query=$conn->prepare("Select * from tblProducts where ID=:id");
		$query->bindParam("id",$id);
		$query->execute();
		 while($row=$query->fetch(PDO::FETCH_ASSOC)){
			 echo "<h4><b>Product Name:</b> ".$row["ProductName"]."</h4>
			 	 <h4><b>Current Stock: </b>".$row["Quantity"]."</h4>
			 ";
			 
			 
		 }
		 ?>
		
		<h4><b>Add Stock:</b> <input type="number" min="1" max="99" name="stocks"  size="35" id="prod2" style ="font-size:20px"required/></h4>
		<input type="submit" value="Add" name="edit" id="addstock" class="btn btn-primary">
	</form>
</body>
</html>
