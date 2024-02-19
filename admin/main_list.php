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
        include"../library/config.php";  
        include"branner_admin.php"; 
        include"menu_admin.php";
        
          include("checklogin_admin_function.php");
                   check_login("user_name","checklogin_admin_form.php");
     ?>
        <div id="content_center"><br><br><br>
             <p style="text-align: center; color: #FE9221;font-weight: bold;font-size: 20px;">Main Category</p>
                <?php
                    $sql   = "SELECT * FROM  main_category";
                    $query = mysqli_query($link, $sql)or die(mysqli_error());
                    $num   = mysqli_num_rows ($query);             
                ?>
                    <table style="font-size: medium; margin: auto; width: 100%;"  border="1" cellpadding="2" cellspacing="0">    
                        <tr>                            
                           <td style="background-color:#93c3cd; width: 30%; color:#004d4d; text-align: center; font-size: 20px; height: 40px; font-weight: bold;">Main Name</td>
                           <td style="background-color:#93c3cd; width: 5%; color: #004d4d; text-align: center; font-size: 20px; font-weight: bold;" >Modify</td>
                           <td style="background-color:#93c3cd; width: 5%; color: #004d4d; text-align: center; font-size: 20px; font-weight: bold;">Delete</td>                      
                        </tr>
                    <?php
                        $i = 0; 
                        while(($result = mysqli_fetch_array($query)) != NULL){ 
                         
                            $i++;      
                    ?>  
                        <tr>
                           <td style="text-align: left; height: 40px; font-size: 15px;"><?php echo  $result["main_name"];?></td>
                           <td style="text-align: center;"><a href="main_modify_form.php?mod_id=<?php echo $result["main_id"]; ?>">Modify</a></td>
                           <td style="text-align: center;"><a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='main_delete.php?del_id=<?php echo $result["main_id"]; ?>';}">Delete</a></td>

                        </tr>
                    <?php
                        }
                    ?>
                        <tr>
                            <td style="text-align: right;" colspan="5"><br>     
                                <button  style="border-radius:8px; padding: 9px 11px;  width: 15%; background-color:#93c3cd;  color: #004d4d; font-size: 15px;font-weight: bold;"  height="50px;" type="button"  onclick="window.location.href='main_add_form.php'" >Add Main</button>
                           </td>
                        </tr>
                    </table><br><br><br>
                </div>      
        </div>
    </body>
</html>