<!DOCTYPE html>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data" id="UploadForm">
<table width="500" border="0">
  <tr>
    <td>File : </td>
    <td><input name="file" type="file" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit"  id="SubmitButton" value="Upload" name="submit" /></td>
  </tr>
</table>
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
	//$file_name= $file['name'];
	$file_type= $file['type'];
	$file_size= $file['size'];
	$file_path= $file['tmp_name'];
  
    
             // start new image name
                $RandomNum   = rand(0, 9999999999);
                
                $ImageName      = str_replace(' ','-',strtolower($file['name']));
                //$ImageType      = $_FILES['file']['type']; //"image/png", image/jpeg etc.
            
                $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
                $ImageExt = str_replace('.','',$ImageExt);
            
                $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            
                //Create new image name (with random number added).
                $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;

                $target_dir="images/".$NewImageName;
                  //End of New image Name
    
	           //move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
            if($file!="" && ($file_type=="image/jpeg" || $file_type=="image/png"||$file_type=="image/gif") && $file_size<=900000){
            	
		    //move_uploaded_file($file_path, $target_dir);
            if(move_uploaded_file($file_path, $target_dir)){
            
            $query=mysql_query("insert into images values('','$$NewImageName','$target_dir')");
            }
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