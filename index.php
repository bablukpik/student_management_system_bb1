<?php session_start(); require_once('kmb/config.php');
  if(!empty($_POST['form_email']) and !empty($_POST['form_password'])){
	$form_email=$_POST['form_email'];
	$form_password=$_POST['form_password'];
	
	$strlenth = strlen($form_email);
	$strlenth = strlen($form_password);
	connect_db();
	
		$sql="select * from user where email='$form_email' and password='$form_password'";
		$query =mysql_query($sql);
		if($row=mysql_fetch_array($query))
			{
				$_SESSION['email']= $row['email'];
				$_SESSION['password']=$row['password'];
				header('location:kmb/index.php');
			}
		else
			{
		$msg="Login Faild";
			}
	echo "<div style='background:#ADFF2F; width:100%; text-align:center; padding:5px;'>$msg <a href='index.php' style='background:#87CEEB; padding:5px; display:inline-block; border-radius:5px;'>Try Again</a></div>"; 
	}
else{
?>




<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title> Login Form</title>
<link rel="stylesheet" href="style.css" />
<style>	
			body {
				background: #7f9b4e url(bg2.jpg) no-repeat center top;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				background-size: cover;
			}
			.container > header h1,
			.container > header h2 {

				text-shadow: 0 1px 1px rgba(0,0,0,0.7);
			}
		body,td,th {
	color: #FFFFFF;
}
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<div class="wapper">
  <div id="main">
       	  <div class="form-4">
				    <h1>Login or Register</h1>
				    <p>
				        <label for="login">Username or email</label>
			          <input type="text" name="form_email" placeholder="E-mail" required>
				    </p>
				    <p>
			          <label for="password">Password</label>
				        <input type="password" name='form_password' placeholder="Password" required> 
				    </p>

				    <p>
				        <input type="submit" name="submit" value="submit">
				    </p>      
				</div>
 
	</div>
</div>
</form>
</body>
</html>
<?php } ?>