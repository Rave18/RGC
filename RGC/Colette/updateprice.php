<?php 

	if(isset($_POST["edit"])){
		include "connection.php";
		$id=$_GET["id"];
		$price=filter_input(INPUT_POST,"price");
		$query=$conn->prepare("update tblProducts set Price=  :Price where ID=:id");
			$error="Price updated successfuly";
		$query->bindParam("Price",$price);
		$query->bindParam("id",$id);

		$query->execute();
		$error="You updated price successfully";
		
	}
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
			<button class = "btn btn-primary" data-dismiss = "modal" onclick = "window.location.replace('updateprice.php?id=<?php print $id; ?>');">OK</button>
		</div>
	</div>
	</div>
</div>
</head>
<body>
</head>
<body>

<?php
	include "adminnav.php"
   ?>
   
        <h2 style="text-align: center"><b>Products</b> </h2>
		
	
		<form method="post">

	<?php 

function load_prods(){
	global $query;
	
	include "connection.php";
	$id=$_GET["id"];
	$query=$conn->prepare("Select * from tblProducts where ID=:id");
	$query->bindParam("id",$id);
	$query->execute();
	

}

load_prods();

		






	 while($row=$query->fetch(PDO::FETCH_ASSOC)){
		 echo "<label style='font-family:Cambria;font-size:18px'>Product Name: ".$row["ProductName"]."</label><br>
		 <label style='font-family:Cambria;font-size:18px'>Current Price: ".$row["Price"]."</label>
		 ";
		 
		 
	 }
	 
	 ?>
	</br>
	
	<label style="font-family:Cambria;font-size:18px">Price:  </label><input type="number" min="1" name="price" max="2000"  size="35" id="prod2"  ><br>
	<input type="submit" value="Update" name="edit" id="updateprod">
</form>
	




</br>

</body>
</html>
