

<?php
function load_prods(){
	global $query;
	global $conn;
	include "connection.php";
	$id=$_GET["id"];
	$query=$conn->prepare("Select * from tblcomputers where ID=:id");
	$query->bindParam("id",$id);
	$query->execute();

	

}

load_prods();
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
   
        <h2 style="text-align: center"><b>Computer Rental</b> </h2>

		
<?php

		
	
while($row=$query->fetch(PDO::FETCH_ASSOC)){	
echo "
	
	
    	<h3><strong>".$row["PCName"]."</strong></h3>
  

	
	<form method='post' enctype='multipart/form-data'>
	  <fieldset>
	 <form action='http://google.com'>
	
<p>Fee:<input type='number' min='1' max='99999' name='quantity' id='quantity' size='15' required/></p>
 	<input type='submit' value='Pay Now' name='edit1' id='addstock' class='btn btn-primary'>
</form>
</fieldset>


	";


			
}
	
if(filter_input(INPUT_POST,"edit1")){
	$quantity=  filter_input(INPUT_POST, "quantity");	
	$id=$_GET["id"];	
	$status="Paid";
				$query=$conn->prepare("update tblcomputers set Fee=Fee+:Fee where ID=:id");
				$query->bindParam("Fee",$quantity);
			
				
	
		$query->bindParam("id",$id);
		$query->execute();
			$error="Successfully paid";
	
		}
			
?>
	

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
			<button class = "btn btn-primary" data-dismiss = "modal" onclick = "window.location.replace('pcdesc.php?id=<?php print $id; ?>');">OK</button>
		</div>
	</div>
	</div>
</div>
</head>
<body>
</head>
<body>



</br>

</body>
</html>
