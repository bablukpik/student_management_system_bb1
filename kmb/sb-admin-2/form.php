
<!DOCTYPE html>
<html lang="en">
        <head>
                <link href="style.css" rel="stylesheet">
                <meta charset ="utf-8">
                <title>Eccryption and Decryption</title>
                 
        </head>
        
        <body>
        <div>
               <div class="">
                    <h3>Register</h3>
                    
                    <form action="home.php" method="post" enctype="multipart/form-data" id="UploadForm">
                        <table>
                        
                            <tr>
                                    <td>SL:</td>
                                     <td><input type="text" name = "sl" size="40" /></td>
                                     <input type="hidden" name = "action" value= "validation" size="40" />
                            </tr>
                            
                            <tr>
                                    <td>Name:</td>
                                     <td><input type="text" name = "name" size="40" /></td>
                            </tr>
    
                            <tr>
                                    <td>Address:</td>
                                     <td><input type="text" name = "address" size="40"/></td>
                            </tr>
                            
                            <tr>
                                    <td>Postcode:</td>
                                     <td><input type="text" name = "postcode" size="40"/></td>
                            </tr>
                            
                            <tr>
                                    <td>Email:</td>
                                     <td><input type="text" name = "email" size="40"/></td>
                            </tr>
                            
                            <tr>
                                    <td>Password:</td>
                                     <td><input type="password" name="password" size="40" /></td>
                            </tr>
				
                            
			                 <tr>
                                    <td>Picture:</td>
                                     <td><input type="file" name="file"  /></td>
                             </tr>
                            


                            <tr>
                                    <td></td>
                                     <td><input type="submit"  id="SubmitButton" value="Save record" name="submit" /></td>
                            </tr>
                            
                        </table>
                    </form>
                </div> <!-- end 1st form-->
                <div>
</body>
</html>