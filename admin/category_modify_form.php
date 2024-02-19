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
    include("../library/config.php"); 
    include("branner_admin.php"); 
    include("menu_admin.php"); 
         include("checklogin_admin_function.php");
          check_login("user_name","checklogin_admin_form.php");
          
             $cat_id = $_REQUEST['cat_id'];

              $sql = "SELECT * FROM category WHERE cat_id ='$cat_id' "; //ติดต่อฐานข้อมูลเพื่อ เอาค่า $cat_id มาดึง main_id เพื่อส่ง hidden ไปหน้าmodify 
              $query = mysqli_query($link, $sql)or die(mysqli_error());
               $row = mysqli_fetch_array($query);
         ?>

        <div id="content_center"><br><br><br>
         <p style="text-align: center; color: #FE9221;font-weight: bold;font-size: 20px;">Modify Category</p>
           <form>
                <table style="font-size: medium; margin: auto; width: 90%;"  border="1" cellpadding="2" cellspacing="0">    
                    <tr>
                       <td style="background-color:#93c3cd; color: #004d4d; width: 30%; height: 40px; text-align: center; font-weight: bold; font-size: 19px;">Category Name</td>
                       <td>
                           <input style="height: 39px; width: 99%; font-size: 18px;"  type="text" name="cat_name"  size="100" maxlength="100" required value="<?php echo $row["cat_name"]; ?>" >
                           <input type="hidden" name="cat_id" value="<?php echo $cat_id; ?>" > 
                           <input type="hidden" name="main_id" value="<?php echo $row['main_id']; ?>" > 
                       </td>
                    </tr>                    
                </table>
                <br>
               <div style="text-align: center;">                      
                   <button style="border-radius:8px; padding: 9px 11px;  width: 20%; background-color:#93c3cd;  color: #004d4d; font-size: 15px; font-weight: bold;"  height="50px;" type="button" onClick='window.history.back()' >Back</button>  
                   <button style="border-radius:8px; padding: 9px 11px;  width: 20%; background-color:#93c3cd;  color: #004d4d; font-size: 15px; font-weight: bold;"  height="50px;" type="submit" name="submit" formaction="category_modify.php" formmethod="post"/>Modify</button>
               
               </div>                
                <br>



           </form> 

        </div>  
 </div>
</body>
</html>