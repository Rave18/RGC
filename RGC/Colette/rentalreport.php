<?php 

global $query;

		include "connection.php";
	
		$query=$conn->prepare("select * from tblcomputers ");
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
   
        <h2 style="text-align: center"><b>Computer Rental Report</b> </h2>
		
		
		<h3 style="font-family:Cambria;text-align:center">Daily   </h3>
		
	<article>
		 <div>
	 <table class="table table-bordered table-hover">
	 <tr><th>PC Name</th><th>Fee</th></tr>
	 <?php

	 while($row=$query->fetch(PDO::FETCH_ASSOC)){
		 echo "<tr><td>".$row["PCName"]."</td><td>".$row["Fee"]."</td></tr>";
		 
	 }
	 
	 
	 
	 ?>

<?php
If(isset($_POST["addbutton"])){

$query=$conn->prepare("update tblcomputers set Fee=0");
$query->execute();
	$error="Reset Successful";
}

?>


	 </table>

	
 
	
		    <?php
			
				$query=$conn->prepare("select SUM(Fee) AS Total from tblcomputers ");
		$query->execute();

        while($row=$query->fetch(PDO::FETCH_ASSOC)){
			
		
          $english_format_number =number_format($row["Total"],2,'.',',');
    
	
       
		}

			
			
			
			
			?>
				<h3 style="font-family:Cambria;margin-left:1220px">Total:  &#8369 <?php  echo $english_format_number?> </h3>	
			
	 </div>
	 
 </article>

 

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
			<button class = "btn btn-primary" data-dismiss = "modal" onclick = "window.location.replace('rentalreport.php');">OK</button>
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
