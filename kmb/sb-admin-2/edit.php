<?php include_once "config.php";
  	     //$link = connect_db();
?>

<?php include "sub_edit.php";?>

<?php if(isset($_GET['id'])!=null){
sub_edit_form();
}
elseif (isset($_POST['pid']) && isset($_POST['submit'])){
    sub_edit_update();
    
}
else
include 'validation_form.php';
?>

