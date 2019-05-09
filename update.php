<?php

session_start();

require_once 'generateToken.php';

 $display_msg = "";

  if(isset($_POST['firstname'], $_POST['lastname'], $_POST['csrf_token'])){

      $fname = $_POST['firstname'];
      $lname = $_POST['lastname'];
      $csrf_token = $_POST['csrf_token'];

      if(!empty($fname) && !empty($lname) && !empty($csrf_token))
	  {
        if(Token::check_token($csrf_token))
		{
          $msg = "Updated Successfully! " ;
          $display_msg = "<p class=\"text-success\"  style='background-color:#fff;padding:10px;'><strong>".$msg."</strong></p>";
        }
        else{
          $msg = "Error Invalid Token";
          $display_msg = "<p class=\"text-danger\"  style='background-color:#fff;padding:10px;'><strong>".$msg."</strong></p>";
        }
      }
      else{
        echo "<script>alert('Check your details');</script>";
      }
  }




?>


<html>

	<head>
		<meta charset="UTF-8">
		<title>Updating User</title>
		<link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="css/login.css" rel="stylesheet">
<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
	</head>

<body>
<div class="container-fluid">
<div class="second">
<div class="inside">
	 <?php
        if (session_id() == '' || !isset($_SESSION['logeduser'])) { 
          header('Location: ./index.php');
      ?>
      <?php
        } 
        else {
          echo "<span style='color:#fff;'>Hello Welcome, " . $_SESSION['logeduser'] . " | </span>";
      ?>
<form action="" method ="post">
<table class="table1">
<tr>
<td><h2> <td><h2 class="title-up">Updating
User</h2></td></h2></td>
</tr>
<tr>
	<td><label for="firstname">First Name</label></td> 
	<td>
	  <input class="updatename left" name="firstname" placeholder="&#xf007  First Name" value="" type="text" required>
	</td>
	</tr>		
<tr>	
	<td><label for="lastname">Last Name </label></td>
	 <td><input class="updatepass" name="lastname" placeholder="&#xf007  Last Name" value="" type="text" required></td>
</tr>
<tr>	
	
</tr>
</table>

<div>
<input id="login-username" type="hidden" class="form-control" name="csrf_token" value="<?php  echo $_SESSION["token"];  ?>">  
</div>

<button class="login" value="Update"> Update </button>

<button type="reset" value="Reset" class="cancel">Reset Button</button>

   <a href="logout.php"   class="cancel  btn btn-default" style="float: right;
    margin-top: 8px;
    background-color: pink;">Logout</a> 
</form>
	  <div>
		 <?php
        echo $display_msg;
        }
		?>
		</div>
	<script type="text/javascript" src="./script.js"></script>
	
</body>
</html>