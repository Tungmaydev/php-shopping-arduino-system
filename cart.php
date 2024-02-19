
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="ขาย จำหน่ายอุปกรณ์ MikroTik ,อุปกรณ์ MikroTik , ขาย MikroTik, ติดตั้ง MikroTik," />
    <meta name="description" content="จำหน่ายอุปกรณ์ MIkroTik สื่อความรู้ ,อุปกรณ์ MikroTik ,ติดตั้ง MikroTik " />
    <title>Arduino Bangkok</title>
    <title>ขาย จำหน่ายอุปกรณ์ MikroTik ,อุปกรณ์ MikroTik , ขาย MikroTik, ติดตั้ง MikroTik, โดยArduino Bangkok </title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="library/common.js" type="text/javascript"></script>
 <!--        <link href="New_Img/favicon.ico" rel="shortcut icon" type="image/x-icon" /> รูปที่  URL -->
 <style>        
    #content_right{
        width: 86%; 
        border: solid 0px #F00; 
        margin: auto; 
        min-height: 500px;
    }
    #head_detail{
        text-align: left;
    }   
@media only screen and (max-width: 480px),only screen and (max-device-width: 480px) {
    #content_right{
       float: left;
       width: 99%;      
       background-color:#FFFFFF;  
       margin-right: 12px;
       margin-left: 12px;
        
    }
}
        
</style>
</head>
    <body>
    <div id="wrapper">    
    <?php 
      include"library/config.php";
//       echo  $_SESSION['cart_id'] ;
//       session_id(); 
//echo session_id()."<br>";
//        exit();
       include"library/cart-functions.php"; 
       include"include/branner.php"; 
       
       ?><br>
    <div id="content_right">
        <div id="head" style="font-size:26px;" align="center"> 
            <span id="cart" style="color:#3333cc">ตะกร้าสินค้า</span>&nbsp;
            <span class="raquo" style="color:#000" >&raquo;&nbsp;</span>
            <span id="cust" style="color:#9A9A9A">ที่อยู่ในการจัดส่ง</span>&nbsp;
            <span class="raquo" style="color:#000" >&raquo;&nbsp;</span>
            <span id="done"style="color:#9A9A9A">ตรวจสอบรายการสั่งซื้อ</span>
            <span class="raquo" style="color:#000" >&raquo;&nbsp;</span>
            <span id="done"style="color:#9A9A9A">สั่งซื้อเรียบร้อย</span>
        </div><br/><br/>
        
        <div id="head_detail">
             <span style="font-size:28px; font-weight: bold">รายการสินค้าในตะกร้า</span><br>
              <span style="font-size:25px;">
                  กรุณาตรวจสอบรายการสินค้าและเลือกวิธีการจัดส่ง จากนั้นคลิกปุ่ม<span style="font-weight: bold;"> “สั่งซื้อสินค้า”</span> เพื่อไปขั้นตอนถัดไป
             </span>
        </div> 
        <?php
  
       include"shopping_time.php"; //เช็คเวลา 30 นาที ต่อหน้า 
       if(empty($_SESSION['cart_id'])){            
           header('Location:product_all.php');
        }
        else{
        
       // if(isset($_SESSION['cart_id'])){    
                         
           $cartContent = getCartContent(); // ดึงข้อมูลจากตาราง cart โดยอ้างอิงถึง session id ของตะกร้าปัจจุบัน แล้วนำไปเก็บในตัวแปร $cartContent
           $numItem = count($cartContent);  //นับจำนวนข้อมูลใน $cartContent (ตะกร้า)

                if ($numItem > 0 ) {
                 
        ?> 
                <form method="post" name="frmCart" id="frmCart">
                    <table width="99%" border="0px;">
                        <tr  style="background-color:#e6e6e6; font-size:25px;">
                            <td colspan="2" align="center"  width="58%"><b>สินค้า</b></td>
                            <td width="11%" align="center"><b>จัดส่งภายใน</b></td>
                            <td width="9%" align="center"><b>ราคา/ชิ้น</b></td>
                            <td width="9%" align="center"><b>จำนวน</b></td>
                            <td width="8%" align="center"><b>รวม</b></td>
                            <td width="12%" align="center">&nbsp;</td>
                        </tr>
                        <?php
                          $subTotal = 0;  //กำหนดให้ผลรวมราคาสินค้าทั้งหมดเป็น 0 ก่อน
                          $Max_date_ship = 0;  //ระยะเวลาในการจัดส่ง
                          
                            for ($i = 0; $i < $numItem; $i++) {  //ใช้  forวลลูปตามจำนวนสินค้าที่อยู่มน $cartContent
                                 extract($cartContent[$i]);  // extract เพื่อแยกข้อมูอาร์เรย์ออกมา
                                 $productUrl = "product_detail.php?pd_id=$pd_id";  //ลิงค์ เมื่อกดที่ชื่อจะเข้าไปหน้ารายละเอียดของ product นั้นๆ
                                 $subTotal  += $pd_price * $ct_qty;  //คำนวณหาผลรวมของสินค้า โดยเพิ่มราคาสนค้าเข้าไปยังตัวแปรง  $subTotal
                        ?>  
                        
                                <tr> 
                                    <td style=" text-align: left;" ><a href="<?php echo $productUrl; ?>"><img src="admin/images/product/<?php echo $pd_image; ?>" border="0" style="height:70px;"></a></td>
                                    <td style=" text-align: left;"><a href="<?php echo $productUrl; ?>"><?php echo $pd_name; ?></a> <br>
                                      <?php                           
                                          if(isset($_SESSION['product_'.$pd_id])== TRUE){ 
                                             echo $_SESSION['product_'.$pd_id];
                                             unset( $_SESSION['product_'.$pd_id] );   
                                         }
                                      ?>
                                    </td>
                                    <td style=" text-align: center; font-weight: bold;"><?php echo $date_ship ; ?> วัน
                                      <?php
                                          if(($date_ship) > $Max_date_ship){
                                              $Max_date_ship = $date_ship;                                        
                                          }  
                                       ?>
                                    </td>
                                    <td style=" text-align: right;"><?php echo $pd_price ; ?></td>
                                    <td style=" text-align: center;"><input name="txtQty[]" type="text" id="txtQty[]" size="3" value="<?php echo $ct_qty; ?>"  onkeypress="return isNumberKey(event);">
                                        <input name="hidProductId[]" type="hidden" value="<?php echo $pd_id; ?>">
                                    </td>
                                    <td style=" text-align: right;"><?php echo ($pd_price * $ct_qty); ?></td>
                                    <td style=" text-align: center;">     
                                            <button style="border-radius:8px; padding: 9px 12px; background-color:#CCCCCC;  font-size: 15px;" type="button"  id="deleteFromCartConfirm "onClick="deleteFromCartConfirm(<?php echo $pd_id; ?>, '<?php echo $pd_name; ?>', <?php echo $ct_qty; ?>)">ลบ</button>    
                                    </td>
                                </tr>
                            <?php  
                            }
                            ?>

                                <tr> 
                                    <td colspan="5" align="right">&nbsp;</td>
                                    <td  colspan="2" width="30%" align="center">
                                      <button style="border-radius:8px; padding: 9px 12px; background-color:#CCCCCC;  font-size: 14px;" name="btnUpdate"  type="submit" formaction="updateCart.php" formmethod="post"  id="btnUpdate" >อัพเดทราคา</button>
                                   </td>
                                </tr>
                            </table><br/>
                       
                            <table width="99%" border="0px;">
                               <hr color="#d9d9d9">
                                <tr> 
                                    <td colspan="5" align="left" style="font-size: 21px;"><b>สรุปรายการสินค้า</b></td>
                                    <td colspan="3" align="right" style="font-size: 21px;"><b>ราคาสินค้าทั้งหมด</b></td>
                                    <td align="right" ><b><?php echo $subTotal  ?></b>
                                        <input  name="subTotal" type="hidden" id="subTotal" value="<?php echo $subTotal ?>">
                                    </td>
                                    <td colspan="2" align="right" style="font-size: 21px;"><b>บาท</b></td>
                                </tr>
                            </table>
                   
                            <table width="99%" border="0px;">
                                 <hr color="#d9d9d9">
                                <tr> 
                                   <td style="font-size: 21px; text-align: left;  font-weight: bold; width: 21%">ระยะเวลาจัดเตรียมสินค้า  </td>
                                   <td style="font-size: 21px; text-align: left;  font-weight: bold; color: #F00;"><?php echo $Max_date_ship;  ?> วันทำการ หลังตรวจสอบยอดเงินเรียบร้อยแล้ว </td>
                                </tr>
                                <tr>
                                    <td style="color:#008000; font-size: 19px;" colspan="2" align="left"><i><b>&nbsp;&nbsp; เนื่องจาก Arduion Bangkok of Thailand มีศูนย์กระจายสินค้า โซนทวีปเอเชีย(เอเชียอาคเนย์  Southeast Asia)ตั้งอยู่ประเทศสิงคโปร์ ทำให้ต้องมีระยะเวลาในการจัดส่งสินค้า
                                          ตามระยะเวลาของสินค้าที่มีช่วงเวลาจัดส่งนานที่สุด</b></i>  </td>                            
                                </tr>
                            </table>
                            <hr color="#d9d9d9"><br/>                    
                    

                            <table style="width: 100%; text-align: center;"cellpadding="10">
                        <tr> 
                         <td style="width: 50%;"><button style="border-radius:8px; padding: 9px 12px; background-color:#CCCCCC;  font-size: 15px;" type="button"  id="button" onClick="window.location.href='product_all.php';"><< เลือกสินค้าเพิ่ม </button></td>
                         <td style="width: 50%;"><button style="border-radius:8px; padding: 9px 12px; background-color:#CCCCCC;  font-size: 15px;" type="submit" name="submit"  id="submit" formmethod="post" formaction="check_stock_pd.php">สั่งซื้อสินค้า checkout >> </button></td>
                          
                        </tr>    
                    </table><br></div><br><br><br>
                </form>
            </div><br></div><br><br>

            
            <?php
                      
            }
            
            else {
            ?>
                <hr color="#d9d9d9">
                <table width="99%" border="0"  cellpadding="10" cellspacing="0">
                    <tr>
                        <td><h3><p align="center" style="color:#F00; font-size: 25px;"  >ตะกร้าสินค้าว่างเปล่า..!</p></h3>
                    </tr>
                    <tr>
                        <td><input style="font-size: 15px;" name="btnContinue" type="button" id="btnContinue" value="เลือกสินค้า" onClick="window.location.href='product_all.php';"></td>
                    </tr>
                 </table>
            <?php
            }
        }
            
             ?>
             <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        </div>
        <?php include("include/footer.php"); ?>   
<script> 
    function deleteFromCartConfirm(product_id, product_name, ct_qty){
       
            var stringProduct = "คุณต้องการลบสินค้า "+ product_name +" หรือไม่ ";
            if (confirm(stringProduct) === true){
                window.location.href = "deleteFromCart.php?pd_id=" + product_id + "&ct_qty="+ ct_qty ;
       
            }
        
        return;
    }
</script>
    
   </body>
</html>
        
       