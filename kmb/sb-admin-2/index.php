<?php include_once "config.php";
  	     $link = connect_db();
       
?>

<?php
 /*
 $key=md5('bangladesh');
 $salt=md5('bangladesh');
 
 //Encrypt
  function eccrypt($string, $key){
        $string = rtrim(bas64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $string, MCRYPT_MODE_ECB)));
 }

//Decrypt
 function decrypt($string, $key){
        $string = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,$key,base64_decode($string), MCRYPT_MODE_ECB));
 }
 
 function hashword($string, $salt){
        $string = crypt($string, '$1$'.$salt. '$');
 }
*/
function protect($string){
        $string = mysql_real_escape_string(trim(strip_tags(addslashes($string))));
        return $string;
        }

 if(isset($_POST['submit']) && !empty($_POST['submit'])){
        $sl = addslashes(protect($_POST['sl']));
        $name = addslashes(protect($_POST['name']));
        $address = addslashes(protect($_POST['address']));
        $postcode = addslashes(protect($_POST['postcode']));
        $email = addslashes(protect($_POST['email']));
        $password = addslashes(protect($_POST['password']));
        
       if($name==NULL){
                $msg = 'Please Enter a name';
                $col = 'red';
        }else{
            if($address==NULL){
                        $msg = 'Please Enter an Address';
                        $col = 'red';
            }else{
                if($postcode==NULL){
                                $msg = 'Please Enter a Postcode';
                                $col = 'red';
                }else{
                    if($email==NULL){
                                $msg = 'Please Enter an Email';
                                $col = 'red';
                    }else{
                        if($password==NULL){
                                     $msg = 'Please Enter a Password';
                                     $col = 'red';
                                     //Check if password meets cirteria
                                    //Create a check password field         
                        }else{
                            if($sl==NULL){
                                     $msg = 'Please Enter a Serial Number';
                                     $col = 'red';       
                                    }else{
                                    
                                //Hash Password
                                //$password = md5($password, $salt);
                                
                                $sql = "INSERT INTO user values('','$sl','$name', '$address', '$postcode', '$email', '$password','0','')";
                                //$sql = "INSERT INTO user values ('".encrypt($name, $key)."', '".encrypt($address, $key)."', '".encrypt($postcode, $key)."', '".encrypt($email, $key)."', '".encrypt($password, $key)."',)";
                                if(mysql_query($sql))
                                {
                                        $msg = 'User created Successfully!';
                                        $col = 'green';
                                }else{
                                    $msg = 'Failed to create User in database <br>';
                                    //$msg = mysql_error($link);
                                    $col = 'red';
                                }
                        }
                    }}
                }
            }
        }
        
        echo '<div id="msg" class="'.$col.'">';
echo $msg;
echo '</div>';
 }

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../sb-admin-2/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../sb-admin-2/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../sb-admin-2/css/plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../sb-admin-2/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../sb-admin-2/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tables</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
							
							<!--Table start-->
						<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                                <tr>
                                        <th>SL.</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Postcode</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Trust</th>
                                        <th>Photo</th>
                                </tr>
                        </thead>
                        <tbody>
                        
                        <?php
                        //On/of Query
                            if(isset($_GET['action']) && $_GET['action'] == 'delete')
                                {
                                    $id = $_GET['id'];
                                    $sql = "UPDATE user SET status = 0 WHERE id = $id";
                                    mysql_query($sql);
                                   // header("Location: http://localhost/db/list.php");
                                }
                                
                        ?>
                                                    
                                <?php
                                //DB Query
                                        $result = mysql_query("SELECT * FROM user");
                                        While($row = mysql_fetch_array($result, MYSQL_ASSOC)){
                                                echo '<tr>';
                                                echo '<td>'.$row['sl']. '</td>';
                                                echo '<td>'.$row['id']. '</td>';
                                                echo '<td>'.$row['name']. '</td>';
                                                echo '<td>'.$row['address']. '</td>';
                                                echo '<td>'.$row['postcode']. '</td>';
                                                echo '<td>'.$row['email']. '</td>';
                                                echo '<td>'.$row['password']. '</td>';  
                                                ?>
                                                    <td><?php if($row['status'] == 1) {echo 'On';} else {echo 'Off';} ?></td>
                                                    
                                                <?php
                                                echo '<td><a href="edit.php?id='.$row['id'].'">Edit<a></td>';                                                
                                                ?>
                                                
                                                    <td><?php if($row['status'] != 0) { ?><a href="../sb-admin-2/?action=delete&id=<?php echo $row['id'];  ?>">Trush</a><?php } 														?>
													</td>
                                                
                                                <?php
                                                echo "<td><img src='".$row['photo']."' height='100px' width='100px'></td>";                                            
                                                echo '</tr>';
                                        }
                                ?>
                        </tbody>
                </table>
							<!--Table End-->
							
						
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
          <div class="row"><!-- /.col-lg-6 -->
              <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
            <div class="row">
              <!-- /.col-lg-6 -->
              <!-- /.col-lg-6 -->
</div>
            <!-- /.row -->
          <div class="row"><!-- /.col-lg-6 -->
              <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="../sb-admin-2/js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../sb-admin-2/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../sb-admin-2/js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../sb-admin-2/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="../sb-admin-2/js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../sb-admin-2/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>

</body>

</html>
