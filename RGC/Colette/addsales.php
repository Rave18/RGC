<?php 



	function load_inventory(){
global $conn;
		include "connection.php";
		global $query;
		$query=$conn->prepare("select * from tblsalesreport ");
		$query->execute();
	}
		load_inventory();
	
	?>
<?php
session_start();


if(isset($_POST["button1"])){

include "connection.php";
$date=filter_input(INPUT_POST,"Date");
$total=filter_input(INPUT_POST,"Total");
$type=filter_input(INPUT_POST,"Type");
$query=$conn->prepare("insert into tblsalesreport values(null,:Date,:Total,:Type)");
$query->bindParam("Date",$date);
$query->bindParam("Total",$total);
$query->bindParam("Type",$type);
$query->execute();
$error="You added a product successfully";



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

<script type="text/javascript">



$(document).ready(function () {


            $("#id_remove").attr('maxlength','15');
          


$(document).ready(function() {
    $("#id_remove").keyup(function() {
        var valtext = $(this).val()
        $(this).val(valtext.toUpperCase())

    });
   
})
});









 



    function generate(e)
      { 
        var action = "1";
        $.ajax({

          url: './ajax/generate_code.php',
          type: 'POST',
          data: {action : 'showItem'},
          dataType: 'html',
          success: function(result)
          {
            $('#id_modal_itemcode').val(result);
            
          },
          error: function()
          {
            alert('failed!');
          }
        })
      }

 </script>
 
<script src="ajax/add_stock.js"></script> 
<script type="text/javascript">
     function item_code_checker(e){
       $("#therest").animate({
            height : 0
          });
     if(e.keyCode === 13){
             $.get("./ajax/check_itemcode.php?ITEM_CODE=" + $("#id_modal_itemcode").val(), function(r){
         var result = JSON.parse(r);
         if(result.ErrorCode === "Error 2"){
            alert('Item Code Exist! Make sure it is unique!');
         }else{
          $("#therest").animate({
            height : 700
          });
         }  
     }); 
    



   
 }
}



function item_code_checker1(e){
      
             $.get("./ajax/check_itemcode.php?ITEM_CODE=" + $("#id_remove").val(), function(r){
         var result = JSON.parse(r);
         if(result.ErrorCode === "Error 1"){
            alert("Item Code Doesn't Exist!");


       
         }else{


          var itemcode = $('#id_remove').val();

          if(itemcode == ""){
              alert("Item Code is Required!")
           }else{ 
              $.ajax({

              url: 'php/remove_stock.php',
              type: 'POST',
              data: {itemcode : itemcode},
          
              success: function(result)
              {
               alert(itemcode +" is Succesfully Remove!");
               $('#id_remove').val("");
                
              },
              error: function()
              {
                alert('failed!');
              }
            })
        }






         
         }  
     }); 
    



   
 }







 
</script>

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
			<button class = "btn btn-primary" data-dismiss = "modal" onclick = "window.location.replace('addsales.php ');">OK</button>
		</div>
	</div>
	</div>
</div>
</head>
<body>
</head>
<body>




<script>
	$(document).ready(function(){
	<?php
	if(isset($eror)){
		?>
		$("#eror").modal("show");
		<?php
	}
	?>
		});
</script>


</head>

<body>
<div id = "eror" class = "modal fade" role = "dialog">
	<div class = "modal-dialog">
	<div class = "modal-content">
		<div class = "modal-header">
		<div class = "modal-title">Fail
		</div>
		</div>
		<div class = "modal-body">
		<?php echo $eror; ?>
		</div>
		<div class = "modal-footer">
			<button class = "btn btn-primary" data-dismiss = "modal" onclick = "window.location.replace('addsales.php ?>');">OK</button>
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
   
     <h2 style="text-align: center"><b>Add Sales</b> </h2>
<article>
	 <div>
	 
	  
 <div class = "col-xs-12 col-md-3">

  
</br>
  <form class="form" method="post" >
  
     <div class="form-group">
      <label for="code"> Date:</label>
      <input type="date" class="form-control" list="list_code" id="i_code"  name="Date" onkeyup="myFunction2(this)" onchange="myFunction(this)"  required>
      

    </datalist>
     
    </div>
      <div class="form-group">
      <label for="code"> Total Sales :</label>
      <input type="text" class="form-control" list="list_code" id="i_code"  name="Total" onkeyup="myFunction2(this)" onchange="myFunction(this)"   required>
      

    </datalist>
     
    </div> <div class="form-group">
      <label for="code"> Sales Type:</label>
      <select name="Type" class="form-control" list="list_code" id="i_code"  name="code" onkeyup="myFunction2(this)" onchange="myFunction(this)"   required>
      
	  <option value="" selected disabled hidden>Choose Product Category</option>
<option value="Product">Product</option>
<option value="Computer Rental">Computer Rental</option>
</select>

    </datalist>
     
    </div>

   
      <button type="submit" name="button1" type="button" class="btn btn-primary"  id="add_to_cart" style="margin-top: 10px"><span class="halflings halflings-shopping-cart"></span>Submit</button>     
    </form>
</div>
    



</body>
</html>
