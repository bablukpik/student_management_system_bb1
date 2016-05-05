<?php include_once "config.php";
  	     $link = connect_db();
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
                                        <th>Action</th>
                                </tr>
                        </thead>
                        <tbody>
                                    <?php 
                                        if(isset($_GET['action']) && $_GET['action'] == 'undo')
                                        {
                                            $id = $_GET['uid'];
                                            $sql = "UPDATE user SET status = 1 WHERE id = $id";
                                            mysql_query($sql);
                                            //header("Location: http://localhost/db/list.php");
                                        } 
                                        ?>
                                        
                                     <?php 
                                        if(isset($_GET['action']) && $_GET['action'] == 'delete')
                                        {
                                            $id = $_GET['uid'];
                                            $sql="DELETE FROM `ac`.`user` WHERE `user`.`id` = $id";
                                            $smg=mysql_query($sql);
                                            if($smg==null) print 'Not delete successfully';
                                            else print 'Successfully Deleted';
                                            //header("Location: http://localhost/db/list.php");
                                        } 
                                        ?>   
                                                              
                                <?php
                                //DB Query
                                        $result = mysql_query("SELECT * FROM user WHERE status = 0");
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
                                                    <td><a href="?action=undo&uid=<?php echo $row['id'];  ?>">Active</a> || <a href="?action=delete&uid=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to delete permanently?');">Delete</a>  </td>
                                                
                                                <?php                                                
                                                echo '</tr>';
                                        }
                                ?>
                        </tbody>
                </table>
                <a href="index.php">Preview Database</a>
                                 
        </body>
        
</html>
