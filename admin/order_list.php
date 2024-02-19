<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Arduino Bangkok</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="css_admin/main_admin.css" rel="stylesheet" type="text/css"/>
    <script>
      function viewStatus(){ 
        with (window.document.frmListProduct) {
            if (cboOrder.selectedIndex === 0) {
                window.location.href = 'order_list.php';
            } 
            else {
                 window.location.href = 'order_list.php?status=' + cboOrder.options[cboOrder.selectedIndex].value;
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
     <br><br>
    <div id="content_center">
          <p style="text-align: center; color: #FE9221;font-weight: bold;font-size: 25px;">Order</p>
          <form  method="post" action="product_list.php" name="frmListProduct" id="frmListProduct">   
                <div style="margin-right: 58px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                   <td style="text-align: right; font-size: 18px; font-weight: bold; color:#FE9221;">View Order Status  :  
                    <select style="width: 20%; font-size: 15px;"name="cboOrder" id="cboOrder" onChange="viewStatus();"  >
                    <option selected >--  All--</option>
                        <?php
                            $sql = "SELECT * FROM tbl_order";
                            $query = mysqli_query($link, $sql)or die(mysqli_error()); 
                            
                          //     while ($data = mysqli_fetch_array($query) ) {
                                   
                                   
                                   $shippingCost = "" ;  
                                    if  ($_GET['status'] ==  'NEW'){
                                          $shippingCost = 50;  
                                    }else if ($_GET['status'] ==  'Paid'){
                                          $shippingCost = 30; 
                                    }else if ($_GET['status'] ==  'Shipped'){
                                          $shippingCost = 30; 
                                    }else if ($_GET['status'] ==  'Completed'){
                                          $shippingCost = 30; 
                                    }else{  //Cancelled
                                          $shippingCost = 0; 
                                    }
                                   
                                   
                                   
                                   
                                   
                                   
                                    if($_GET['status'] == $data[status]){
                                        echo "<option value=$data[status] selected> $data[status]</option>";
                                    }else{
                                        echo "<option value=$data[status]> $data[status]</option>";
                                    }
                        //        }
                        ?>
                    </select>
                  </td>
                </tr>
            </table>
            </div>
           
                        <?php
//                            $sql = "SELECT  * FROM tbl_order
//                                    INNER JOIN order_bank
//                                    ON tbl_order.od_id=order_bank.od_id
//                                    ORDER BY tbl_order.od_id DESC";
//                          $query = mysqli_query($link,$sql)or die(mysqli_errno());
//                          $row   = mysqli_num_rows($query);                        
//                                 
//                        
                        ?>
                    
            
            <br>    
            
                   <table style="font-size: medium;" width="70%" border="1px solid gray" cellpadding="5" cellspacing="1"  align="center">    
                       <tr style="text-align: center; background-color: #93c3cd;">
                           <td width="10%">Order #</td>
                           <td width="20%">Customer Name</td>
                           <td width="20%">Amount</td>
                           <td width="20%">Order Time</td>
                           <td width="10%">Status</td>
                        </tr>
                        <?php
                        
                        
                        if(isset($_GET['cat_id']) == FALSE) {
                            $sql  = "SELECT  * FROM tbl_order  INNER JOIN order_bank  ON tbl_order.od_id=order_bank.od_id ORDER BY tbl_order.od_id DESC";
                         
                        }
                        else {
                            
                             $sql  = "SELECT  * FROM tbl_order INNER JOIN order_bank  ON tbl_order.od_id=order_bank.od_id
                                        WHERE tbl_order.od_status =".$data['status']."  ORDER BY tbl_order.od_id DESC";
                                        
                        }

                            $query_show = mysqli_query($link, $sql)or die(mysqli_error());
                            while($result = mysqli_fetch_array($query_show)){
                  
                          ?>
                            <tr>
                              <td><a href="order_detail.php?od_id=<?php echo  $result["od_id"]; ?>"><?php echo  $result["od_id"]; ?></a></td>
                              <td style="text-align: left"><?php echo  $result["od_shipping_first_name"];?> &nbsp; <?php echo  $result["od_shipping_last_name"];?></td>
                              <td style="text-align: center"><?php echo  $result["amt"];?></td>
                              <td style="text-align: center"><?php echo  $result["od_date"];?></td>
                              <td style="text-align: center"><?php echo  $result["od_status"];?></td>
                            </tr>
                    <?php
                        }
                    ?>
                   </table> 
                       
                    
    </div>      
</div>
</body>
</html>