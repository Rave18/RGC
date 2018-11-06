
<html>
<head>
<title>Colette's BukoPie And Pasalubong</title>
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
   
   
<div class="row" style="margin-right: 10px; margin-left: 10px;">
  
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
      <label for="quan"> Quantity:</label>
      <input type="text" class="form-control" id="quantity" oninput="calculate()" placeholder="Enter Quantity" name="quan" onkeypress="run_whole(this)" required>
  
    </div>

      <div class="form-group"><div style="position:absolute;height:230px;width:330px;background-color: black;opacity: 0;"></div> 
      <label for="itemname"> Item Name:</label>
      <input type="text" class="form-control" id="i_name" name="itemname" readonly >

    </div>        
      <div class="form-group">
      <label for="itemprice"> Item Price:</label>

      <input type="text" class="form-control" id="i_price" name="itemprice" oninput="calculate()" onkeyup="run(this)" value="0.00" readonly>
      
    </div>
      <div class="form-group">
      <label for="desc"> Product Category:</label>
      <input type="text" class="form-control" id="dtion" name="desc" readonly= >

    </div>
        <h3 class="total" style="display:inline">Sub Total: &#8369 </h3>
    <h3 class="total" style="display:inline" id="p_total" >0.00</h3>
      <br>
      <button type="submit" name="btn_addtocart" type="button" class="btn btn-primary"  id="add_to_cart" style="margin-top: 10px"><span class="halflings halflings-shopping-cart"></span>Submit</button>     
    </form>
</div>
    
<form method="post"  > 

 <div class = "col-md-9 col-xs-12" style="right: 2px; border-top: thin double  rgb(116, 117, 119);margin-top: 10px;">
  
 <button name="btn_clearall" type="submit"  type="button"  class="btn btn-primary" style="margin-top: 10px;background-color: red;" formnovalidate>Clear All</button> 
 <form method= "post">
 <button name="btn_remove" type="submit"  type="button"  class="btn btn-primary" style="margin-top: 10px; margin-left: 10px;margin-top: 10px;">Remove</button> 
  <input type="text"   id="remove_item_code" placeholder="Enter Item Code" name="remove_code" onkeyup ="myFunction()" style="position:absolute;left: 190px;top: 12px;height: 30px;" required>
  </form>


</body>
</html>
