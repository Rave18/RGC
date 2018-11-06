<?php 
session_start();

global $warn;
if(isset($_POST["login"])){
	global $warn;
	include "connection.php";
	$username=filter_input(INPUT_POST,"user");
	$password=filter_input(INPUT_POST,"Passw");
	$query=$conn->prepare("select * from tblaccounts where username=:Username and password=:password");
	$query->bindParam("Username",$username);
	$query->bindParam("password",$password);
	$query->execute();
	$result=$query->rowCount();
	
	if($result){
		while($row=$query->fetch(PDO::FETCH_ASSOC)){
			$_SESSION["username"]=$row["Username"];
						
			$_SESSION["ID"]=$row["ID"];
			if($row["UserType"]=="Admin"){
				//header("location:home.php");
				$success = "Thank you for logging in!";
				print "<script>window.location.replace('product.php');</script>";
			}
			else if($row["UserType"]=="Branch"){
				//header("location:branchhome.php");
					$success = "Thank you for logging in!";
				print "<script>window.location.replace('branchhome.php');</script>";
	
					$success = "Thank you for logging in!";
				print "<script>window.location.replace('branchindex.php');</script>";
				return;
			}
			
			
			else{
				//header("location:userhome.php");
					$success = "Thank you for logging in!";
				print "<script>window.location.replace('userhome.php');</script>";
			}
			
		}
		
	}else{
		
	}
}
	
	?>
	


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Rave's Gaming Cafe</title>
<style>
#form1
{
margin:20px auto;
width:320px;


}
#text
{
display:block;
margin-bottom:25px;
width:100%;
border:1px solid;
font-family:Cambria;

}
#pass
{
	font-family:Cambria;
display:block;
margin-bottom:25px;
width:100%;
border:1px solid;

}
#line{
	
	border-top:1px solid gray;
	width:960px;
		margin: 0 auto;

}
#sub1{
	width: 344px;
	height:55px;
	background: #FAFAFA;
	margin: 10px auto;
	font-size:18px;
	font-family:Cambria;
	line-height:0px;
	text-align: center;
	border: 1px solid gray;
}
#sub1:hover{
	background: gray;
	color: #FAFAFA;	
}

#content {

	
}
</style>
<link href="css/responsiveslides.css" rel="stylesheet" type="text/css">
<meta name="viewport" content= "width=device-width, initial-scaling=1"/>
<link href="css/indexPhone.css" rel="stylesheet" type="text/css" media="only screen and (min-width: 0px) and (max-width: 320px)" >
<link href="css/indexTablet.css" rel="stylesheet" type="text/css" media="only screen and (min-width: 321px) and (max-width: 768px)" >
<link href="css/index.css" rel="stylesheet" type="text/css"  media="only screen and (min-width: 769px)">
<meta name="viewport" content="width=device-width, maximum-scale=1.0" />

<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="js/responsiveslides.min.js"></script>
<script type="text/javascript" src="hei/script.js"></script>
<script type="text/javascript">
   $(function() {
    $(".rslides").responsiveSlides({
		 maxwidth: 900,       
		 speed: 800
		
		});
  });
</script>
</head>

<body>
<div id="wrapper">
	

<nav>
    	<div id="mainNav">    	
   	
            <div id="logo" ><a href="index.php"><img src="images/rgc.png" width="207" height="92" alt="" style="margin-left:870px"/></a></div>
         
        </div>
	</nav>
    <div id="line">
  
  
  </div>
  
 
	<div id="content">
    <form method="POST" id="form1">
<fieldset>
<h3 style="font-family:Cambria;text-align:center;margin-top:30px">LOGIN</h3></br>

<input type="text" name="user" minlength=5 id="text" placeholder="Username" size="35" style="margin:5px;padding:10px;font-size:inherit;width:320px;margin-top:30px" required/><br>
<input type="password" name="Passw" minlength=5 placeholder="Password" size="35" id="pass" style="margin:5px;padding:10px;font-size:inherit;width:320px" required/><br>
<strong><input type="submit" value="LOG-IN" id="sub1" name="login"></strong>

</fieldset>
</form>

</div>
     <div id="line">
  
  
  </div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</body>
</html>
