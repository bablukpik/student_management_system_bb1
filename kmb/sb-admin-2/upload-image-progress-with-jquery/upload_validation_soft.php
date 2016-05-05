<!DOCTYPE html>
<html>
<body>
<form action="upload_validation.php" method="post" enctype="multipart/form-data">
<input type="submit" value="Upload File" name="submit">  <input type="file" name="file"><br>

</form>
</body>
</html>

<?php 
//db_connect
mysql_connect("localhost","root","") or die(mysql_erro());
mysql_select_db("ac") or die(mysql_error());


if(isset($_POST['submit'])){

	$query=null;

	$file=$_FILES['file'];
	$file_name= $file['name'];
	$file_type= $file['type'];
	$file_size= $file['size'];
	$file_path= $file['tmp_name'];
    $target_dir='images/'.$file_name;
	
            if($file!="" && ($file_type=="image/jpeg" || $file_type=="image/png"||$file_type=="image/gif") && $file_size<=900000){
            	
		    move_uploaded_file($file_path, $target_dir);
            
            $query=mysql_query("insert into images values('','$file_name','$target_dir')");
            }
            	      
            if($query==true){
            	      echo "Uploaded successfully"; 

            }else{
                if($file_size==null)
                echo 'Select an image';
                else                
                    echo "upload error or large size from 500kb";
                
                }
                $insert_id = mysql_insert_id();
                if(isset($insert_id)){
$result=mysql_query("select * from images where id=$insert_id");
while($row=mysql_fetch_array($result)){
echo "<img src='".$row['photo']."' height='130px' width='130px'>";
}
}
                          
}
?>