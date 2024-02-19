<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Arduino Bangkok</title>
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link href="css_admin/main_admin.css" rel="stylesheet" type="text/css"/>
  <script>
    function viewMainCategory(){
	    with (window.document.frmListCategory) {  //frmListCategory คือ name ของ form ที่ส่งค่า
		  if (cboMainCategory.selectedIndex === 0) {
			window.location.href = 'category_list.php';
		  } 
                  else {
			window.location.href = 'category_list.php?main_id=' + cboMainCategory.options[cboMainCategory.selectedIndex].value;
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
include"checklogin_admin_function.php";
      check_login("user_name","checklogin_admin_form.php");                 

 ?>
<br><br><br><br><br>                
    <div id="content_center" >
        <form  method="post" action="category_list.php" name="frmListCategory" id="frmListCategory">
     
     <div style="margin-right: 58px;">
        <table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr>
              <td style="text-align: right; font-size: 18px; font-weight: bold; color:#FE9221;">View Main Category  :  
              <select style="width: 20%; font-size: 15px; " name="cboMainCategory"  onChange="viewMainCategory();"  >
                <option selected >--Main Category All--</option>
                    <?php
                        $sql = "SELECT * FROM main_category";
                        $query = mysqli_query($link, $sql)or die(mysqli_error());                                  
                            while ($data = mysqli_fetch_array($query) ) {

                                if($_GET['main_id'] == $data[main_id]){
                                    echo "<option value=$data[main_id] selected> $data[main_name]</option>";
                                }else{
                                    echo "<option value=$data[main_id]> $data[main_name]</option>";
                                }
                            }
                    ?>
              </select>
            </td>
          </tr>
           </table>
       </div><br>

           <table style="font-size: medium; margin: auto; width: 100%;"  border="1" cellpadding="2" cellspacing="0">    
            <tr>
               <td style="background-color:#93c3cd; width: 30%; color:#004d4d; text-align: center; font-size: 20px; height: 40px; font-weight: bold;">Category Name</td>
               <td style="background-color:#93c3cd; width: 5%; color: #004d4d; text-align: center; font-size: 20px; font-weight: bold;" >Modify</td>
               <td style="background-color:#93c3cd; width: 5%; color: #004d4d; text-align: center; font-size: 20px; font-weight: bold;" >Delete</td>                      
            </tr>
           <?php

                    if (isset($_GET['main_id']) == FALSE) {
                        $sql  = "select * from main_category,category where main_category.main_id = category.main_id order by cat_id asc";
                    }
                    else {
                        $sql  = "select * from main_category,category where main_category.main_id = category.main_id and main_category.main_id=" . $_GET['main_id'] . "  order by cat_id asc";
                    }

                    $query = mysqli_query($link, $sql)or die(mysqli_error());
                   // $num = mysql_num_rows ($query);
                    while($result = mysqli_fetch_array($query)){
            ?>
            <tr>
               <td style="text-align: left; height: 40px; font-size: 18px;"><?php echo  $result["cat_name"];?></td>
               <td style="text-align: center;"><a href="category_modify_form.php?cat_id=<?php echo $result["cat_id"]; ?>">Modify</a></td>
               <td style="text-align: center;"><a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='category_delete.php?cat_id=<?php echo $result["cat_id"]; ?>&main_id=<?php echo $_GET['main_id'] ?>';}">Delete</a></td>          
               
            </tr>
            <?php
                     }
              ?>
             <tr>
                 <td style="text-align: right;" colspan="5"><br> 
                     <span style="color: red; font-size: 15px;">*ปุ่ม Add Category กับ ปุ่ม Delete จะทำงานก็ต่อเมื่อคุณได้เลือก Main Category ก่อนเท่านั้น!!</span>
                 <button  style="border-radius:8px; padding: 9px 11px;  width: 15%; background-color:#93c3cd;  color: #004d4d; font-size: 15px;font-weight: bold;"  height="50px;" type="button"  onclick="window.location.href='category_add_form.php?main_id=<?php echo $_GET["main_id"]; ?>'" >Add Category</button>
                </td>
             </tr>
        </table>
      </form><br><br>
    </div>
</div>      
</body>
</html>