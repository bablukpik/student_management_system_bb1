<?php include_once "config.php";
  	     $link = connect_db();
?>


<html>
<?php 

if (isset($_POST['pid']) && isset($_POST['submit']))
{
	$id=trim($_POST['pid']);
	$sl= trim($_POST['sl']);
	//echo $first_name;
    $name= trim($_POST['name']);
	$address= trim($_POST['address']);
	$postcode= trim($_POST['postcode']);
    $email= trim($_POST['email']);
	$password= trim($_POST['password']);
	
	/*$sql = "update 'user_form' set 'user_id'='$user_id', 'first_name'='$first_name', 'last_name'='$last_name', 'user_name'='$user_name', 'user_pass'='$user_pass','address'='$address','zip'='$zip','user_email'='$user_email', 'user_web'='$user_web','user_company'='$user_company', 'user_country'='$user_country', 'user_city'='$user_city', 'user_state'='$user_state', 'user_phone'='$user_phone'";*/

	$sql="UPDATE `ac`.`user` SET `id` = '$id', `sl` = '$sl', `name` = '$name', `address` = '$address', `postcode` = '$postcode', `email` = '$email' ,`password` = '$password' WHERE `user`.`id` = $id";
   $mg=mysql_query($sql,$link);
   if($mg==null) print 'Not Connected'; else
   print "Your record has been updated";
   mysql_close($link);
  ?> 
   
<?php
  	}

elseif(isset($_GET['id']))	
{
	$id=$_GET['id'];
	$link = connect_db();
	$sql="select * from user where id=$id";
   $result=mysql_query($sql, $link);
   
   while($array=mysql_fetch_array($result)){
$id=$array['id'];

$sl=$array['sl'];
$name=$array['name'];
$address=$array['address'];
$postcode=$array['postcode'];
$email=$array['email'];
$password=$array['password'];
}
}
   ?>
   
   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="frm" >
 <table>
 
<tr>
<td><strong>ID:</strong></td>
<td><input type="text" name="pid"  value="<?php echo $id ?>" size="50" /></td>
</tr>

<tr>
<td><strong>Serial Number:</strong></td>
<td><input type="text" name="sl" value="<?php echo $sl ?>" size="50" /></td>
</tr>

<tr>
<td>Name:</td>
<td><input type="text" name="name" value="<?php echo $name ?>" size="50" /></td>
</tr>

<tr>
<td>Address: </td>
<td> <input type="text" name="address" value="<?php echo $address ?>" size="50" /></td>
</tr>

<tr>
<td>Postcode:</td>
<td><input type="text" name="postcode" value="<?php echo $postcode ?>" size="50" /></td>
</tr>

<tr>
<td>Email:</td>
<td><input type="text" name="email" value="<?php echo $email ?>" size="50" /></td>
</tr>

<tr>
<td>Password:</td>
<td><input type="password" name="password" value="<?php echo $password ?>" size="50" /> </td>
</tr>



<tr>
      <td><div align="right"></div></td>
      <td><div id="boxright">
          <input name="submit" type="submit" class="btn" value="Update" style="position: relative;"/>
          <td>
          <a href="php_validation.php">Back</a>
		</td>
        </div></td>
    </tr>
	</table>
  </form>

 </html>
