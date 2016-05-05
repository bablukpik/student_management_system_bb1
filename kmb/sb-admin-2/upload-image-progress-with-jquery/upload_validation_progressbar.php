<!DOCTYPE html>
<head>
    <title>Image Upload</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<style type="text/css">
      img {border-width: 0}
      * {font-family:'Lucida Grande', sans-serif;}
</style>
<script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>

<script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>

<script>
        $(document).ready(function() {
        //elements
        var progressbox     = $('#progressbox');
        var progressbar     = $('#progressbar');
        var statustxt       = $('#statustxt');
        var submitbutton    = $("#SubmitButton");
        var myform          = $("#UploadForm");
        var output          = $("#output");
        var completed       = '0%';
                $(myform).ajaxForm({
                    beforeSend: function() { //brfore sending form
                        submitbutton.attr('disabled', ''); // disable upload button
                        statustxt.empty();
                        progressbox.slideDown(); //show progressbar
                        progressbar.width(completed); //initial value 0% of progressbar
                        statustxt.html(completed); //set status text
                        statustxt.css('color','#000'); //initial color of status text
                    },
                    uploadProgress: function(event, position, total, percentComplete) { //on progress
                        progressbar.width(percentComplete + '%') //update progressbar percent complete
                        statustxt.html(percentComplete + '%'); //update status text
                        if(percentComplete>50)
                            {
                                statustxt.css('color','#fff'); //change status text to white after 50%
                            }
                        },
                    complete: function(response) { // on complete
                        output.html(response.responseText); //update element with received data
                        myform.resetForm();  // reset form
                        submitbutton.removeAttr('disabled'); //enable submit button
                        progressbox.slideUp(); // hide progressbar
                    }
            });
        });

    </script>
<style>
#progressbox {
border: 1px solid #0099CC;
padding: 1px; 
position:relative;
width:400px;
border-radius: 3px;
margin: 10px;
display:none;
text-align:left;
}
#progressbar {
height:20px;
border-radius: 3px;
background-color: #003333;
width:1%;
}
#statustxt {
top:3px;
left:50%;
position:absolute;
display:inline-block;
color: #000000;
}
</style>

</head>
<body>
<form action="upload_validation.php" method="post" enctype="multipart/form-data" id="UploadForm">
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
<div id="progressbox"><div id="progressbar"></div ><div id="statustxt">0%</div ></div>
<?php //<div id="output"></div>?>
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