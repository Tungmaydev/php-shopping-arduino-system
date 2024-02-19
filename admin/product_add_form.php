<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Arduino Bangkok</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="css_admin/main_admin.css" rel="stylesheet" type="text/css"/>
    <script src="tinymce/tinymce/tinymce.min.js" type="text/javascript"></script>
<script>
tinymce.init({
    selector: "textarea",
    theme: "modern",
  //  width: 1000,
//    height: 300,
   height: 900,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
         "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
   ],
   toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
   toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
   image_advtab: true ,
   
   external_filemanager_path:"./filemanager/",
   filemanager_title:"Responsive Filemanager" ,
  external_plugins: { "filemanager" : "../filemanager/plugin.min.js"}
   ,relative_urls:false,
   remove_script_host:false,
//   document_base_url:"http://localhost/m"
//document_base_url:"http://localhost/arduionbangkok_2/admin/tinymce"
document_base_url:"http://localhost/arduionbangkok_2/admin"
 });
</script>

<style>
    #content_right1{
        width: 80%;
        padding-left: 20px;
        margin: auto;
     
    }
</style>
</head>
    <body>
    <div id="wrapper">
     <?php
          include("../library/config.php"); 
          include("branner_admin.php"); 
          include("menu_admin.php"); 
          include("checklogin_admin_function.php");
          check_login("user_name","checklogin_admin_form.php");
       
                  // $cat_id = $_REQUEST["cat_id"]; //ส่งจากหน้า product_list จากปุ๋ม add                 
          if($_GET["cat_id"]== !""){
              $cat_id = $_REQUEST["cat_id"]; //ส่งจากหน้า product_list จากปุ๋ม add      
      
       ?>
        <div id="content_center" style="background-image: "><br><br><br>
                <p style="text-align: center; color: #FE9221;font-weight: bold;font-size: 20px;">Add Product</p>
                <form>
                    <table width="80%" border="1 solid" align="center" cellpading="5" cellspacing="0">
                       <tr>
                            <td style="background-color:#93c3cd; color: #004d4d; width: 15%; height: 40px; text-align: center; font-weight: bold; font-size: 19px;">Code</td>
                            <td><input style="height: 39px; width: 100%; font-size: 18px;"  type="text" name="pd_code" id="pd_code" required ></td>
                        </tr>                       
                        <tr>
                            <td style="background-color:#93c3cd; color: #004d4d;  height: 40px; text-align: center; font-weight: bold; font-size: 19px;">Image</td>
                            <td style="text-align: right;"> <input style="font-size: 15px;" type="file" name="fleImage" required ></td>
                        </tr>
                        <tr>
                           <td style="background-color:#93c3cd; color: #004d4d;  height: 40px;  text-align: center; font-weight: bold; font-size: 19px;">Product Name</td>
                           <td><input style="height: 39px; width: 100%; font-size: 18px;"  type="text" name="pd_name" id="pd_name" size="40" maxlength="60" required ></td>
                        </tr>
                        <tr>
                            <td style="background-color:#93c3cd; color: #004d4d;   height: 40px; text-align: center; font-weight: bold; font-size: 19px;">Price</td>
                           <td><input style="height: 39px; width: 80%; font-size: 18px;"  type="text" name="pd_price" id="pd_price" size="40" maxlength="60" required > บาท</td>
                        </tr>
                        <tr>
                            <td style="background-color:#93c3cd; color: #004d4d;  height: 40px; text-align: center; font-weight: bold; font-size: 19px;">Quantity</td>
                           <td><input style="height: 39px; width: 99%; font-size: 18px;"  type="text" name="pd_qty" id="pd_qty" size="40" maxlength="60" required ></td>
                        </tr>
                        <tr>
                            <td style="background-color:#93c3cd; color: #004d4d;  text-align: center; font-weight: bold; font-size: 19px;">Date Ship</td>
                            <td><input  style="height: 39px; width: 99%; font-size: 18px;"  type="text" name="pd_date_ship" id="pd_date_ship" size="10" maxlength="10" required ></td>                           
                        </tr>
                        <tr> 
                            <td style="background-color:#93c3cd; color: #004d4d;  text-align: center; font-weight: bold; font-size: 19px; vertical-align: top;">Product Detail</td>
                            <td> <textarea id="elm1" name="detail"></textarea></td>
                        </tr>
                        <tr> <!-- ส่งค่า cat_id ไปแบบ hidden เพื่อจะ refresh กลับมา หน้า cat_id ที่เลือก -->
                            <input type="hidden" name="cat_id" value="<?php echo $cat_id; ?>" >
                        </tr>
                        
                    </table><br>                    
                   
                     <div style="text-align: center;">                      
                       <button style="border-radius:8px; padding: 9px 11px;  width: 20%; background-color:#93c3cd;  color: #004d4d; font-size: 15px; font-weight: bold;"  height="50px;" type="button" onClick='window.history.back()' >Back</button>  
                       <button style="border-radius:8px; padding: 9px 11px;  width: 20%; background-color:#93c3cd;  color: #004d4d; font-size: 15px; font-weight: bold;"  height="50px;" type="submit" name="submit" formaction="product_add.php" formmethod="post" formenctype="multipart/form-data">Add Product</button>                       
                     </div>  
                </form>
            </div> <br><br>
        
        <?php 
        }
        else {
            echo "<h3>กรุณาเลือก Category ก่อนเพิ่มสินค้า !</h3>";
         ?>
            <button style="border-radius:8px; padding: 9px 11px;  width: 20%; background-color:#93c3cd;  color: #004d4d; font-size: 15px; font-weight: bold;"  height="50px;" type="button" onClick='window.history.back()' >Back</button>
       <?php

        } 
        ?>
    </div>
    </body>
</html>