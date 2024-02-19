<!DOCTYPE html>
<?php
require_once 'library/config.php';
        if(isset($_SESSION['cart_id'])){   //เช็กค่า  cart_id จาก session 
                $sid = $_SESSION['cart_id'];  // กำหนดตัวแปรให้  $_SESSION['cart_id'];
                $pd_id  = $_REQUEST['pd_id']; // กำหนดตัวแปรให้  $_REQUEST['pd_id'];
                $ct_qty = $_REQUEST['ct_qty']; 
          
               
                    if(isset($pd_id)== TRUE) {  
                         //ถ้ามีการส่ง  cart_id  จริง ให้ DETELE ในตาราง cart WHERE ct_id  AND pd_id 
                         $sql_item    = "DELETE  FROM cart_item WHERE ct_id = '$sid' AND pd_id = '$pd_id' ";
                         $resul_item  = mysqli_query($link,$sql_item ) or die(mysqli_error());
                         
                         
                         
                         //เมื่อลบสินค้าแล้ว ก็เอา จำนวนสินค้า  + กลับ เข้าไปในสต๊อกเท่า กับ จำนวนสินค้า หยิบเพิ่มมา
                         $sql_stock = "UPDATE product  SET pd_qty = pd_qty + '$ct_qty'  WHERE pd_id = '$pd_id'";
                         $result_stock = mysqli_query($link,$sql_stock) or die(mysqli_error()); 
                          
                         
                         
                         // SELECT  FROM product เพื่อดูราคา ของสินค้าที่ส่งมา
                         $sql_qty     = "SELECT * FROM product WHERE pd_id = '$pd_id'";
                         $result_qty  = mysqli_query($link,$sql_qty ) or die(mysqli_error());
                         $row_qty     = mysqli_fetch_array($result_qty);
                    
                            $pd_price = $row_qty['pd_price']; // $pd_price คือ ราคา ของสินค้า
                            $X = $pd_price; //ราคาของสินค้า
                            $X *=  $ct_qty; // จ.น.
                            
                         //บันทึกราคา  $X ลงตาราง cart (ราคา * จ.น.)= $X
                         $sql_cart_price     = "UPDATE cart SET subTotal= subTotal - '$X' WHERE  ct_id = '$sid'";
                         $result_cart_price  = mysqli_query($link,$sql_cart_price) or die(mysqli_error()); 
                    
                    }  
                    
                         $sql_check = "SELECT ct_id FROM cart_item WHERE ct_id = '$sid' ";  //เช็กในตาราง cart_item ว่ายังมี ct_id ของ $_SESSION['cart_id'] อีกหรือไม่ 
                         $result_check = mysqli_query($link, $sql_check ) or die(mysqli_error());
                         $row_check = mysqli_fetch_assoc($result_check);

                               if(!$row_check['ct_id']){  
                                        // ถ้าไม่มี   ct_id ของ $_SESSION['cart_id'] แล้ว
                                     $sql_cart   = "DELETE  FROM cart WHERE ct_id = '$sid'"; //ให้ ลบ ct_id ในตาราง cart ด้วย
                                     $resul_cart  = mysqli_query($link,$sql_cart ) or die(mysqli_error());
                               
                                        unset($_SESSION['cart_id']);  // และ  unset($_SESSION['cart_id']) นั้น
                                              header('Location:product_all.php');  // ส่งกลับ ไปยังหน้า product_all.php  เพื่อให้ลูกค้าเลือกสินค้าใหม่ โดยเริ่ม start session ใหม่
                                               exit;
                                }
                   
                    header('Location:cart.php'); 
        }
?>



