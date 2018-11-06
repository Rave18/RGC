<?php 



session_start();
	function load_inventory(){

		include "connection.php";
		global $query;
		$query=$conn->prepare("select * from tblproducts ");
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

  <script type="text/javascript">





   function myFunction(){
   
     
          $.get("./ajax/getname.php?Item_Code=" + $("#i_code").val(), function(r){
          
        
         var result =JSON.parse(r);
      
         $("#price").val(result[0]["Price"]);
         $("#productname").val(result[0]["ProductName"]);
         $("#category").val(result[0]["ProductCategory"]);
     
         
        

         
     }); 
        
   }
  
   function myFunction2(){
   
  
          $.get("./ajax/getcode.php?Item_Code LIKE" + $("#i_code").val(), function(r){
          
        
        var result1 = JSON.parse(r);
     
      
         $("#i_code1").val(result1[0]["Item_Code"]);
         $("#i_code2").val(result1[1]["Item_Code"]);
         $("#i_code3").val(result1[2]["Item_Code"]);
       
             console.log(result1);
         
        
          
             
          

           
     
         
        

         
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

        
   }
</script>
</head>
<body>

<?php
	include "adminnav.php"
   ?>
   
         <h2 style="text-align: center"><b>Update Product</b> </h2>
</br>
<article>
	 <div>
	 <table class="table table-bordered table-hover">
	 <tr><th>Item Code</th><th>Product Name</th><th>Category</th><th>Quantity</th><th>Price</th></tr>
	 <?php
	 while($row=$query->fetch(PDO::FETCH_ASSOC)){
		 echo "<tr><td>".$row["Item_Code"]."</td><td>".$row["ProductName"]."</td><td>".$row["ProductCategory"]."</td><td>".$row["Quantity"]."</td><td>".$row["Price"]."</td></tr>";
		 
	 }
	 
	 ?>
	 
	  <div class = "col-xs-12 col-md-3">

  <form class="form" method="post" >
    <div class="form-group">
      <label for="code"> Item Code:</label>
     <input type="text" class="form-control" list="list_code" id="i_code" placeholder="Enter Item Code" name="code" onkeyup="myFunction2(this)" onchange="myFunction(this)"  required>
      <datalist id="list_code">
    <option id="i_code1" >
    <option id="i_code2" >
    <option id="i_code3" >

    </datalist>
     
    </div>
    <div class="form-group">
      <label for="quan"> Price:</label>
      <input type="text" class="form-control" id="price" oninput="calculate()" placeholder="Enter New Price" name="quan" onkeypress="run_whole(this)" required>
  
    </div>

      <div class="form-group"><div style="position:absolute;height:230px;width:330px;background-color: black;opacity: 0;"></div> 
      <label for="itemname"> Item Name:</label>
          <input type="text" class="form-control" id="productname" name="itemname" readonly >

    </div>        


      <div class="form-group">
      <label for="desc"> Product Category:</label>
  <input type="text" class="form-control" id="category" name="desc" readonly= >

    </div>
     
      
      <button type="submit" name="btn_addtocart" type="button" class="btn btn-primary"  id="add_to_cart" style="margin-top: 10px"><span class="halflings halflings-shopping-cart"></span>Submit</button>     
  
  </form>
</div>
	 </table>
	 </div>
 </article>


</body>
</html>
