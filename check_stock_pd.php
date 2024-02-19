<?php
include 'library/config.php';
include'library/cart-functions.php';
header('Content-Type: text/html; charset=utf-8');

  if(isset($_SESSION['cart_id'])){ //เช็กค่า  cart_id จาก session 
        $sid = $_SESSION['cart_id']; // กำหนดตัวแปรให้  $_SESSION['cart_id'];

        $productId  = $_POST['hidProductId']; //เก็บรหัสสินค้า ซึ่งเป็นแบบอาร์เรย์
	$itemQty    = $_POST['txtQty'];    //เก็บจำนวนสินค้า ซึ่งเป็นแบบอาร์เรย์
	$numItem    = count($itemQty);    //นับจำนวนสินค้าที่ส่งมา
	$notice     = '';

        for ($i = 0; $i < $numItem; $i++) { //วนลูปตามจำนวนรายการสินค้าที่ส่งมา
	      $newQty = (int)$itemQty[$i];
              
               //SELECT cart_item  เพื่อนำจำนวนสินค้า + กลับเข้าไปในตาราง product
                 $sql_cart_item   = "SELECT * FROM cart_item WHERE ct_id = '$sid' AND pd_id = '$productId[$i]'";
                 $result_cart_item = mysqli_query($link, $sql_cart_item)or die(mysqli_error());
                 $row = mysqli_fetch_assoc($result_cart_item);
                 
                        //จำนวนสินค้าในตาราง cart_item (ค่าเดิม)
                        $ct_qty = $row['ct_qty'];  
                        
                        if ($newQty < 1) { //คือ ลูกค้าใส่ 0 มา หมายถึงไม่มีสินค้า

                                // + จำนวนสินค้าที่เลือกไว้ของสินค้าที่ ลูกค้าใส่ 0 กลับเข้าไปในสต๊อก ตาราง product
                                $sql_check_0 = "UPDATE product  SET pd_qty = pd_qty + $ct_qty WHERE pd_id = '$productId[$i]'";
                                $result_check_0 = mysqli_query($link,$sql_check_0) or die(mysqli_error());                                 
                                
                                 
                            
                                 // SELECT  FROM product เพื่อดูราคา ของสินค้าที่ส่งมา
                                $sql_qty     = "SELECT * FROM product WHERE pd_id = '$productId[$i]'";
                                $result_qty  = mysqli_query($link,$sql_qty) or die(mysqli_error());
                                $row_qty     = mysqli_fetch_array($result_qty);

                                $pd_price = $row_qty['pd_price']; // $pd_price คือ ราคา ของสินค้า

                                $qty_0 = $pd_price; //ราคาของสินค้า
                                $qty_0 *=  $ct_qty; // จ.น.

                               //บันทึกราคา  $X ลงตาราง cart (ราคา * จ.น.)= $X
                               $sql_cart_price     = "UPDATE cart SET subTotal= subTotal - '$qty_0' WHERE  ct_id = '$sid'";
                               $result_cart_price  = mysqli_query($link,$sql_cart_price) or die(mysqli_error()); 


                                

                                // ถ้าจำนวนสินค้าที่ลูกค้าเปลี่ยนน้อยกว่า 1 ให้ลบสินค้าออกจากตะกร้า (คือ ลูกค้าใส่ 0 มา หมายถึงไม่มีสินค้า)
                                $sql    = "DELETE FROM cart_item WHERE ct_id = '$sid' AND pd_id = '$productId[$i]'";
                                $result = mysqli_query($link,$sql) or die(mysqli_error());  
                                 
                                
                                //เช็กในตาราง cart_item ว่ายังมี ct_id ของ $_SESSION['cart_id'] อีกหรือไม่ 
                                $sql_check = "SELECT ct_id FROM cart_item WHERE ct_id = '$sid' ";  
                                $result_check = mysqli_query($link, $sql_check ) or die(mysqli_error());
                                $row_check = mysqli_fetch_assoc($result_check);

                                       if(!$row_check['ct_id']){  
                                                // ถ้าไม่มี   ct_id ของ $_SESSION['cart_id'] แล้ว
                                             $sql_cart   = "DELETE  FROM cart WHERE ct_id = '$sid'"; //ให้ ลบ ct_id ในตาราง cart ด้วย
                                             $resul_cart  = mysqli_query($link ,$sql_cart ) or die(mysqli_error());

                                                unset($_SESSION['cart_id']);  // และ  unset($_SESSION['cart_id']) นั้น
                                                      header('Location:product_all.php');  // ส่งกลับ ไปยังหน้า product_all.php  เพื่อให้ลูกค้าเลือกสินค้าใหม่ โดยเริ่ม start session ใหม่
                                                       exit;
                                        }
                                 
                                
                                header('Location: cart.php');  
                                 exit();
                                

                            }
                            else {
                            
                                $sql    = "SELECT  *  FROM product WHERE pd_id = {$productId[$i]}";
                                $result = mysqli_query($link,$sql) or die(mysqli_error());
                                $row    = mysqli_fetch_assoc($result);
                                      
                                      $pd_price = $row['pd_price']; //ราคา
                                      $qty_stock = $row['pd_qty']; //ค่าในสต๊อก
                             
                                        if ($newQty > $ct_qty) {  //หยิบเพิ่ม
                                               $X = $newQty; //(จ.น.สินค้าใหม่)
                                               $X -= $ct_qty;  //(จ.น.สินค้าใหม่ - จ.น.สินค้าเดิม = A) ; (A คือ ส่วนต่าง)  

                                                    if($X <= $qty_stock){
                                                         //นำส่วนต่าง(X) + กลับเข้าไปในตาราง product
                                                        $sql_stock_X = "UPDATE product  SET pd_qty = pd_qty - '$X'   WHERE pd_id = '$productId[$i]'";  
                                                        $result_stock_X = mysqli_query($link,$sql_stock_X) or die(mysqli_error()); 
                                                        
                                                        
                                                         $XX = $pd_price; //ราคาของสินค้า
                                                         $XX *=  $X; // จ.น.

                                                         //บันทึกราคา  $XX ลงตาราง cart (ราคา * จ.น.)= $XX
                                                         $sql_cart_price_X     = "UPDATE cart SET subTotal= subTotal + '$XX' WHERE  ct_id = '$sid'";
                                                         $result_cart_price_X  = mysqli_query($link,$sql_cart_price_X) or die(mysqli_error()); 


                                                    }
                                                    else{
                                                        //สินค้านี้เหลือไม่เพียงพอ ไม่สามารถสั่งซื้อได้            
                                                          $_SESSION['product_'.$productId[$i]] = '<span style=color:red;font-size:17px;>* จำนวน ' . $row['pd_name'] . ' เหลือในสต๊อกอีกแค่ ' . $row['pd_qty'] . ' ชิ้น</span>';
                                                        header('Location: cart.php');  
                                                        exit();
                                                    }


                                        }
                                        else{ // หยิบออก
                                           $Y = $ct_qty;  //(จ.น.สินค้าเดิม)
                                           $Y -= $newQty ;  //(จ.น.สินค้าเดิม - จ.น.สินค้าใหม่ = A) ; A คือ ส่วนต่าง

                                                      //นำส่วนต่าง(X) + กลับเข้าไปในตาราง product
                                                      $sql_stock_Y = "UPDATE product  SET pd_qty = pd_qty + '$Y'   WHERE pd_id = '$productId[$i]'";  
                                                      $result_stock_Y = mysqli_query($link,$sql_stock_Y) or die(mysqli_error()); 
                                                      
                                                      
                                                       $YY = $pd_price; //ราคาของสินค้า
                                                       $YY *=  $Y; // จ.น.

                                                     //บันทึกราคา  $YY ลงตาราง cart (ราคา * จ.น.สินค้า)= $YY
                                                     $sql_cart_price     = "UPDATE cart SET subTotal= subTotal - '$YY' WHERE  ct_id = '$sid'";
                                                     $result_cart_price  = mysqli_query($link,$sql_cart_price) or die(mysqli_error()); 


                                        }
                                   //อัปเดตตาราง cart_item  ก่อนตัดสต๊อกในตาราง product     
                                $sql_updateCart = "UPDATE cart_item SET ct_qty = $newQty WHERE ct_id = '$sid' AND pd_id = '$productId[$i]'";
                                mysqli_query($link,$sql_updateCart) or die(mysqli_error());
                                
                                
                           
                                if(!isset($_SESSION['member_name'])){
                                      //ตัดจำนวนสินค้าในตาราง product
                                      header('Location: checkout_account.php');
                                }
                                else {
                                      
                                        header('Location:info.php');
                                  } 

                        }
              
        } 
  }
?>