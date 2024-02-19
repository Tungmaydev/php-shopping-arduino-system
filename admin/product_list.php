<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Arduino Bangkok</title>
<link rel="stylesheet" type="text/css" href="css/main.css">
<link href="css_admin/main_admin.css" rel="stylesheet" type="text/css"/>
   <script>
      function viewCategory(){ 
        with (window.document.frmListProduct) {
            if (cboCategory.selectedIndex === 0) {
                window.location.href = 'product_list.php';
            } 
            else {
                 window.location.href = 'product_list.php?cat_id=' + cboCategory.options[cboCategory.selectedIndex].value;
            }
        }    
      }
   </script>
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
        <br><br>
    <div id="content_center">
         <p style="text-align: center; color: #FE9221;font-weight: bold;font-size: 25px;">Products</p>
        <form  method="post" action="product_list.php" name="frmListProduct" id="frmListProduct">          
            <div style="margin-right: 58px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                   <td style="text-align: right; font-size: 18px; font-weight: bold; color:#FE9221;">View Category All  :  
                    <select style="width: 20%; font-size: 15px;"name="cboCategory"  onChange="viewCategory();"  >
                    <option selected >-- Category All--</option>
                        <?php
                            $sql = "SELECT * FROM category";
                            $query = mysqli_query($link, $sql)or die(mysqli_error());                         
                                while ($data = mysqli_fetch_array($query) ) {
                                    if($_GET['cat_id'] == $data[cat_id]){
                                        echo "<option value=$data[cat_id] selected> $data[cat_name]</option>";
                                    }else{
                                        echo "<option value=$data[cat_id]> $data[cat_name]</option>";
                                    }
                                }
                        ?>
                    </select>
                  </td>
                </tr>
            </table>
            </div>
            <br>
            <table style="font-size: medium; margin: auto; width: 100%;"  border="1" cellpadding="2" cellspacing="0">
                  <tr>
                        <td  style="background-color:#93c3cd; width: 15%; color:#004d4d; text-align: center; font-size: 20px; height: 40px; font-weight: bold;">Code</td>
                        <td style="background-color:#93c3cd; width: 15%; color: #004d4d; text-align: center; font-size: 20px; font-weight: bold;">Image</td>
                        <td style="background-color:#93c3cd; width: 25%; color: #004d4d; text-align: center; font-size: 20px; font-weight: bold;">Product Name</td>
                        <td style="background-color:#93c3cd; width: 10%; color: #004d4d; text-align: center; font-size: 20px; font-weight: bold;">Price</td>
                        <td style="background-color:#93c3cd; width: 8%; color: #004d4d; text-align: center; font-size: 20px; font-weight: bold;"">Quantity</td>
                        <td style="background-color:#93c3cd; width: 8%; color: #004d4d; text-align: center; font-size: 20px; font-weight: bold;">Date Ship</td>
                        <td style="background-color:#93c3cd; width: 10%; color: #004d4d; text-align: center; font-size: 20px; font-weight: bold;">Modify</td>
                        <td style="background-color:#93c3cd; width: 10%; color: #004d4d; text-align: center; font-size: 20px; font-weight: bold;">Delete</td>                      
                  </tr>
                    <?php
                        if(isset($_GET['cat_id']) == FALSE) {
                            $sql  = "select * from category,product where category.cat_id = product.cat_id order by pd_id asc";
                        }
                        else {
                             $sql  = "select * from category,product where category.cat_id = product.cat_id and category.cat_id=" . $_GET['cat_id'] . "  order by pd_id asc";
                        }

                            $query = mysqli_query($link, $sql)or die(mysqli_error());
                            while($result = mysqli_fetch_array($query)){
                    ?>
                  <tr>

                        <td style="text-align: left; height: 40px; font-size: 18px;"><?php echo $result["pd_code"]; ?></td>
                        <td style="text-align: center;"><img src="images/product/<?php echo  $result["pd_image"];?>" width='50px' height='50px'></td>
                        <td style="text-align: left; "><?php echo  $result["pd_name"];?></td>
                        <td style="text-align: right;"><?php echo  $result["pd_price"];?></td>
                        <td style="text-align: right;"><?php echo  $result["pd_qty"];?></td>
                        <td style="text-align: right;"><?php echo  $result["date_ship"];?></td>
                        <td style="text-align: center;"><a href="product_modify_form.php?pd_id=<?php echo $result["pd_id"]; ?>">Modify</a></td>
                        <td style="text-align: center;"><a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='product_delete.php?pd_id=<?php echo $result["pd_id"]; ?>&cat_id=<?php echo $_GET['cat_id'];?>';}">Delete</a></td>

                  </tr>
                    <?php
                        }
                    ?>

                  <tr>                 
                    <td style="text-align: right;" colspan="8"><br> 
                        <span style="color: red; font-size: 15px;">*ปุ่ม Add Category กับ ปุ่ม Delete จะทำงานก็ต่อเมื่อคุณได้เลือก Main Category ก่อนเท่านั้น!!</span>
                       <button  style="border-radius:8px; padding: 9px 11px;  width: 15%; background-color:#93c3cd;  color: #004d4d; font-size: 15px;font-weight: bold;"  height="50px;" type="button"  onclick="window.location.href='product_add_form.php?cat_id=<?php echo $_GET['cat_id']; ?>'" >Add Product</button>
                    </td>
                  </tr>
            </table>
        </form><br><br>                    
    </div>      
    </div>
 </body>
</html>