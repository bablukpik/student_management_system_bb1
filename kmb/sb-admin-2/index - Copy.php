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
                <meta charset ="utf-8">

                <title>Eccryption and Decryption</title>
                
                <script src="Flexible-Client-Side-Table-Sorting-Plugin-tablesorter/js/jquery.tablesorter.widgets-filter-formatter.min.js"></script>

                <!-- Demo styling -->
        	<link href="Flexible-Client-Side-Table-Sorting-Plugin-tablesorter/docs/css/jq.css" rel="stylesheet">
            <link href="style.css" rel="stylesheet">            
        
        	<!-- jQuery: required (tablesorter works with jQuery 1.2.3+) -->
        	<script src="Flexible-Client-Side-Table-Sorting-Plugin-tablesorter/docs/js/jquery-1.2.6.min.js"></script>
        
        	<!-- Pick a theme, load the plugin & initialize plugin -->
        	<link href="Flexible-Client-Side-Table-Sorting-Plugin-tablesorter/css/theme.default.css" rel="stylesheet">
        	<script src="Flexible-Client-Side-Table-Sorting-Plugin-tablesorter/js/jquery.tablesorter.min.js"></script>
        	<script src="Flexible-Client-Side-Table-Sorting-Plugin-tablesorter/js/jquery.tablesorter.widgets.min.js"></script>
        	<script>
        	$(function(){
        		$('table').tablesorter({
        			widgets        : ['zebra', 'columns'],
        			usNumberFormat : false,
        			sortReset      : true,
        			sortRestart    : true
        		});
        	});
        	</script>

                
                       </head>
        
        <body>
        
               <div class="reg" style="text-align: center;">
                    <h1>Institute of Scince, Trade and Technology</h1>
                    
               </div>

                
                
                
                
                <div style="display: inline; clear: both">
                    <div style="float: left;"> <h4>Preview Database</h4>
                    <div style="clear: both;"></div>
                    <div style=""><?php $sql="select * from user";
                             $result=mysql_query($sql, $link);
                            $num_rows=mysql_num_rows($result);
                             print "Total : $num_rows Rows <br/>"; ?>
                    </div>
                    </div>
                    <div style="float: right; ">
                    <a href="home.php" align=right>Add New</a> ||
                    <a href="search.php" align=right>Search</a> || 
                    <a href="delete.php" align=right>Action Center</a>
                    </div>
                    
                </div>
                
                <script type="text/javascript">
    jQuery(document).ready(function() {
        $("#myTable")
        .tablesorter({debug: false, widgets: ['zebra'], sortList: [[0,0]]})
        .tablesorterFilter({filterContainer: "#filter-box",
                            filterClearContainer: "#filter-clear-button",
                            filterColumns: [0]});
    });
</script>
        
                           
                <table id="myTable" class="tablesorter"  border=1 >
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
                                                
                                                    <td><?php if($row['status'] != 0) { ?><a href="?action=delete&id=<?php echo $row['id'];  ?>">Trush</a><?php } ?></td>
                                                
                                                <?php
                                                echo "<td><img src='".$row['photo']."' height='100px' width='100px'></td>";                                            
                                                echo '</tr>';
                                        }
                                ?>
                        </tbody>
                </table>
                
               <?php /* <script>
                        $(document).ready(function(){
                                $("#myTable").tablesorter({sortList:[[0,0], [2,1]], widgets:['zebra']});
                                });

                </script>
                
                
                <script>
                    $(document).ready(function() 
                        { 
                            $("#myTable").tablesorter(); 
                        } 
                    );
                </script>
                
                <script>
                $(document).ready(function() 
                 { 
                     $("#myTable").tablesorter( {sortList: [[0,0], [1,0]]} ); 
                    } 
                        ); 
                </script>
                
                */ ?>
                
                
                                
        </body>
        
</html>
