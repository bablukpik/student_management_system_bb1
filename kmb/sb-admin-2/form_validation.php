<?php include "img_upload_validation.php"; 
//$link = connect_db();  
?>
<!DOCTYPE Html>
<html>
<body>
<?php
function form_validation(){
$link = connect_db();
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

 if(isset($_POST['submit']) && !empty($_POST['submit'])&& ($_POST['action'])=='validation'){
        //img_upload_validation();
        //start imge script
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
        
        //end img script
        
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
                                        
                                        //img start
                                         //move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
            if($file!="" && ($file_type=="image/jpeg" || $file_type=="image/png"||$file_type=="image/gif") && $file_size<=900000){
            if($file_size==null)
                echo 'Select an image';
                else{	
		    //move_uploaded_file($file_path, $target_dir);
            $move=move_uploaded_file($file_path, $target_dir);
            	      
            if($move==true){
            	      echo "Preview image"; 

            }
            }
            }
            else{
                    $msg="Image not uploaded. Max file size 500kb";
                    $col='red';
                      echo '<div id="msg" class="'.$col.'">';
                      echo $msg;
                      echo '</div>';
                                  
                }     
                
                          
                            
            
            
            
            
            //img end            
                                    
                                //Hash Password
                                //$password = md5($password, $salt);
                                
                                $sql = "INSERT INTO user values('','$sl','$name', '$address', '$postcode', '$email', '$password','0','$target_dir')";
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
        
        //start img display
                $insert_id = mysql_insert_id();
                if(isset($insert_id)){
                $result=mysql_query("select * from user where id=$insert_id");
                while($row=mysql_fetch_array($result)){
                echo "<img src='".$row['photo']."' height='130px' width='130px'>";
                }
                }
        //end img displa
        
        echo '<div id="msg" class="'.$col.'">';
echo $msg;
echo '</div>';
 }
}//end form_validation
?>
</html>