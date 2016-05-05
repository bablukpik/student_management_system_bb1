<?php include_once "config.php";
  	     $link = connect_db();
?>

<!--SEARCH START -->
<form name="searchFrm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="text" name="search" id="search" />&nbsp;
    <input type="submit" name="submit" value="Submit" />
</form>
<!--SEARCH END -->

  
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
                
                
                <script type="text/javascript">
    jQuery(document).ready(function() {
        $("#myTable")
        .tablesorter({debug: false, widgets: ['zebra'], sortList: [[0,0]]})
        .tablesorterFilter({filterContainer: "#filter-box",
                            filterClearContainer: "#filter-clear-button",
                            filterColumns: [0]});
    });
</script>
        
                           
                <table id="myTable" class="tablesorter" border=1 cellpadding=0 cellspacing=0 >
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
                                </tr>
                        </thead>
                        <tbody> 
                                
                                <?php		
                            		if(isset($_POST['submit']))
                            		{
                                        //Search Code
                            			$search = addslashes(trim($_POST['search']));
                                        echo $search;
                            			$sql_search = "SELECT * FROM `user` WHERE name LIKE '%$search%' OR id LIKE '%$search%' ";
                            			//For HW
                            			//$sql_search = "SELECT * FROM index_table WHERE user_name LIKE '%$search%' AND user_email LIKE '%$search%'";
                            			$r=mysql_query($sql_search);
                            			
                                       if($r==null) {
                            			     echo "Not Connected";	
                            			}
                            			else
                            			{
                            				$msg = "Result found!";
                            			}
                            		//}	
                            	
                                ?>
                                    
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
                                        if($r!=null){
                                                while($data = mysql_fetch_array($r)){        
                                                echo '<tr>';
                                                echo '<td>'.$data['sl']. '</td>';
                                                echo '<td>'.$data['id']. '</td>';
                                                echo '<td>'.$data['name']. '</td>';
                                                echo '<td>'.$data['address']. '</td>';
                                                echo '<td>'.$data['postcode']. '</td>';
                                                echo '<td>'.$data['email']. '</td>';
                                                echo '<td>'.$data['password']. '</td>';
                                                ?>
                                                
                                                    <td><?php if($data['status'] == 1) {echo 'On';} else {echo 'Off';} ?></td>
                                                    
                                                <?php
                                                echo '<td><a href="edit.php?id='.$data['id'].'">Edit<a></td>';                                                
                                                ?>
                                                
                                                    <td><?php if($data['status'] != 0) { ?><a href="?action=delete&id=<?php echo $row['id'];  ?>">Trush</a><?php } ?></td>

                                                
                                                <?php                                                
                                                echo '</tr>';
                                                }
                                        }
                                    }
                                ?>
                        </tbody>
                </table>
                <a href="index.php">Preview Database</a>
                                 
        </body>
        
</html>
