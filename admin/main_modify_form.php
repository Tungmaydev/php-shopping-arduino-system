 <!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Arduino Bangkok</title>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link href="css_admin/main_admin.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="wrapper">
        <?php 
            include "../library/config.php"; 
            include "branner_admin.php";
            include "menu_admin.php";
            
            include("checklogin_admin_function.php");
              check_login("user_name","checklogin_admin_form.php");                 
              
                $mod_id = $_REQUEST['mod_id'];
             
                  $sql    = "SELECT * FROM main_category WHERE main_id ='$mod_id' ";
                  $result = mysqli_query($link, $sql)or die(mysqli_error());
                  $row    =   mysqli_fetch_array($result);
            
             ?>
            
            <div id="content_center"><br><br><br>
               <p style="text-align: center; color: #FE9221;font-weight: bold;font-size: 20px;"> Modify Main Category</p>
                <form>
                    <table style="font-size: medium; margin: auto; width: 90%;"  border="1" cellpadding="2" cellspacing="0">    
                        <tr>
                           <td style="background-color:#93c3cd; color: #004d4d; width: 30%; height: 40px; text-align: center; font-weight: bold; font-size: 19px;"  >Main Name :</td>
                           <td>
                               <input style="height: 39px; width: 99%; font-size: 18px;" type="text" name="main_name" size="100" maxlength="100" required value="<?php echo $row["main_name"]; ?>" >
                               <input type="hidden" name="mod_id"  id="mod_id" value="<?php echo $mod_id  ?>">
                           </td>
                        </tr>
                    </table>
                    <br>
                    <div style="text-align: center;">
                        <button style="border-radius:8px; padding: 9px 11px;  width: 20%; background-color:#93c3cd;  color: #004d4d; font-size: 15px; font-weight: bold;"  height="50px;" type="button" onClick='window.history.back()' >Back</button>  
                        <button style="border-radius:8px; padding: 9px 11px;  width: 20%; background-color:#93c3cd;  color: #004d4d; font-size: 15px; font-weight: bold;"  height="50px;" type="submit" name="submit" formaction="main_modify.php" formmethod="post"/>Modify</button>                      
                        
                    </div>
                    <br>
                </form> 

            </div>  
            </div>
    </body>
</html>