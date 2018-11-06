<nav class="navbar navbar-inverse">
  <div class="container-fluid" style="box-shadow: 0 3px 8px 0 rgba(0, 0, 0, 1);">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
        <a class="navbar-brand" > <img src="images/rgc.png" width="150px" height="50px" style="margin-top:-17px"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
    
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Transaction <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="product.php">Products</a></li>
			<li><a href="pc.php">Computer Rental</a></li>
            
    
          
          </ul>
	
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Inventory <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="finishedproduct.php">Finished Product</a></li>
            
    
          
          </ul>
		  	  <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Products <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="addproduct.php">Add Product</a></li>
            
            <li><a href="update.php">Update Product</a> </li>          
          
          
          </ul>
        </li>
         <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reports <span class="caret"></span></a>
          <ul class="dropdown-menu">
		   <li><a href="addsales.php">Add Sales</a></li>
           <li><a href="dailysales.php">Sales</a></li>
			     <li><a href="Sales_Report.php">Inventory</a></li>
				   <li><a href="rentalreport.php">Computer Rental</a></li>
                
          </ul>
        </li>

                     
          </ul>
        </li>
      </ul>
	
      <ul class="nav navbar-nav navbar-right">
    
     
        </a>
		
        </li>
         <li onclick="logout()"><a href="index.php"><span class="glyphicon glyphicon-log-out"></span> LogOut</a></li>
      </ul>
    </div>
  </div>
</nav>
