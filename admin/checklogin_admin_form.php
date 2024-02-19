<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Arduino Bangkok</title>
        <link rel="stylesheet" type="text/css" href="css/main.css">
<!--        <link rel="stylesheet" type="text/css" href="css/index.css">-->
    </head>
    <body>
             
        <div id="wrapper">
            <div id="content">
             <?php include("../library/config.php"); ?> 
<!--                 <p><img src="New_Img/logo.JPG" width="137" height="91"><br /><br /></p>-->
                  <h2 align="center" style="color:#666" >เข้าสู่ระบบหลังร้าน</h2>
                  <form id="form1" name="form1" method="post" action="checklogin_admin.php">
                  <table width="290" height="143" border="0" align="center" cellpadding="0" cellspacing="3">
                        <tr>
                            <td style="color:#666">ชื่อผู้ใช้  :</td>
                            <td>
                            <label>
                                <input name="user_name" type="text" id="name" size="25" />
                            </label>
                            </td>
                        </tr>
                        
                        <tr>
                            <td height="32" style="color:#666">รหัสผ่าน   :</td>
                            <td>
                            <label>
                                <input name="user_password" type="password" id="password"  size="25" />
                            </label>
                            </td>
                        </tr>
                        
                        <tr>
                            <td style="text-align:right">
                                <!-- <label>
                                    <input type="reset" name="reset" value="เครียร์" />
                                  </label>-->
                            </td>
                            <td style="text-align:left">
                            <label>
                                <input type="submit" name="Submit" value="เข้าสู่ระบบ" />
                            </label>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        
                         </table>
                    </form>
            </div>   
            </div>
    </body>
</html>