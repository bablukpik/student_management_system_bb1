<?php 
  	     //$link = connect_db();
?>
<?php 
//end function
//db_connect
//mysql_connect("localhost","root","") or die(mysql_erro());
//mysql_select_db("ac") or die(mysql_error());

function img_upload_validation(){
    
    $link = connect_db();
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
    
	                                  
}//end img_upload
?>