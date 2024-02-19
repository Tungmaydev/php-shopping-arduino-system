<?php
require_once 'library/config.php';
header('Content-Type: text/html; charset=utf-8');

// ลบออเดอร์ที่ทำรายการ ในตาราง cart ของเมื่อวาน $yesterday = date('d') - 1

function deleteAbandonedCart(){   
    
    global $link;
    $yesterday  = date('Y-m-d H:i:s', mktime(0,0,0, date('m'), date('d') - 1, date('Y')));    
    //SELECT cart_id  ที่ < $yesterday จากตาราง cart
    $sql_cart    = "SELECT * FROM cart  WHERE ct_date < '$yesterday'";   
    
    $result_cart = mysqli_query($link , $sql_cart)or die(mysqli_error());
    $row_cart    = mysqli_fetch_assoc($result_cart);

        $ct_id_yesterday = $row_cart['ct_id']; // cart id ที่ < $yesterday

        if($ct_id_yesterday == TRUE){  //ถ้ามี cart id ที่ < $yesterday จริง
            //ลบ ct_id ที่ วันเกินในตาราง cart WHERE ct_id = '$ct_id_yesterday
            $sql_de = "DELETE FROM cart  WHERE ct_id = '$ct_id_yesterday'";
             mysqli_query($link,$sql_de) or die(mysqli_error());


                 //SELECT FROM cart ขึ้นมา  WHERE ct_id = '$ct_id_yesterday เพื่อวนลูป สินค้าที่ < $yesterday
                 $sql_ii= "SELECT * FROM  cart_item WHERE ct_id = '$ct_id_yesterday'";
                 $result_ii = mysqli_query($link,$sql_ii) or die(mysqli_error());

                    while($row_ii = mysqli_fetch_assoc($result_ii)){ 
                          $ct_qty = $row_ii['ct_qty'];
                          $pd_id = $row_ii['pd_id'];
                          //เมื่อลบสินค้าแล้ว ก็เอา จำนวนสินค้า  + กลับ เข้าไปในสต๊อกเท่า กับ จำนวนสินค้า หยิบเพิ่มมา (ทำสินค้า ล่าสุด)
                             $sql_stock    = "UPDATE product  SET pd_qty = pd_qty + '$ct_qty'  WHERE pd_id = '$pd_id'";
                             $result_stock = mysqli_query($link,$sql_stock) or die(mysqli_error()); 


                             //เช็กในตาราง cart_item ว่ายังมี ct_id ของ $_SESSION['cart_id'] อีกหรือไม่ 
                              $sql_check     = "SELECT ct_id FROM cart WHERE cart.ct_id = '$ct_id_yesterday' ";  
                              $result_check  = mysqli_query($link,$sql_check ) or die(mysqli_error());
                              $row_check     = mysqli_fetch_assoc($result_check);

                                    if(!$row_check['ct_id']){  // ถ้า ct_id ไม่มีในตาราง cart แล้วให้ลบ ct_id ในตาราง  cart_item
                                           $sql_cart_item   = "DELETE  FROM cart_item  WHERE ct_id = '$ct_id_yesterday'"; //ให้ ลบ ct_id ในตาราง cart ด้วย
                                           mysqli_query($link,$sql_cart_item) or die(mysqli_error());
                                    } 
                    }     
        }      
}
?>


<?php 
$current_Stock = 0;
     
     //ตรวจดูว่ามีการส่งรหัสสินค้ามาหรือไม่ , (int)คือ ส่งเป็นตัวเลขมา
    if (isset($_GET['p']) && (int)$_GET['p'] > 0) { 
	$productId = (int)$_GET['p'];
                
            // ดูในฐานข้อมูลว่า pd_id ที่ส่งมา(ที่ลูกค้าเลือกมา) มีสินค้าที่ลูกค้าต้องการหรือไหม
            $sql_pd     = "SELECT pd_id, pd_qty, pd_price FROM product WHERE pd_id = $productId";  
            $result_pd  = mysqli_query($link,$sql_pd ) or die(mysqli_error());
                   
                if(mysqli_num_rows($result_pd) !=1){ //ดูว่าสินค้ามีอยู่ในสต๊อกหรือไม่
                     heade('Location:cart.php');   //ถ้าไม่พบสินค้าในฐานข้อมูล 
                }
                else{
                    $row   = mysqli_fetch_assoc($result_pd); //หาจำนวนสินค้าในสต๊อก
                    $current_Stock = $row['pd_qty'];
                        if($current_Stock == 0){  //ถ้าไม่พบสินค้าในสต๊อก แสดงข้อความให้ลุกค้าทราบ
                            echo'สินค้าที่คุณเลือก ไม่มีอยู่ในสต๊อก';
                            heade('Location:cart.php');
                            exit;
                        }
                }
  
                 //==========================================
                 

                 //  บันทึกลงใน ตาราง cart
                if(isset($_SESSION['cart_id'])== FALSE){   //ถ้าไม่มี  $_SESSION['cart_id']  ให้  INSERT
                    $sql_cart     = "INSERT INTO cart(ct_id,ct_date) VALUES('',NOW())";  
                    $result_cart  = mysqli_query($link,$sql_cart) or die(mysqli_error());
                    
                    $_SESSION['cart_id'] = mysqli_insert_id($link); // cart_id
                   
                }
                    // SELECT  FROM product เพื่อดูราคา ของสินค้าที่ส่งมา
                    $sql_qty     = "SELECT * FROM product WHERE pd_id = $productId";  
                    $result_qty  = mysqli_query($link,$sql_qty ) or die(mysqli_error());
                    $row_qty     = mysqli_fetch_array($result_qty);
                    
                        $pd_price = $row_qty['pd_price']; // $pd_price คือ ราคา ของสินค้า
                        $last_id = $_SESSION['cart_id']; // $last_id เป็น cart_id  ที่ต้องใส่ในตาราง  cart_item
                      
                        //  บันทึกลงใน ตาราง cart_item 
                        $sql_item     = "SELECT pd_id, ct_qty FROM cart_item  WHERE pd_id = $productId and ct_id = '$last_id'";
                        $result_item  =  mysqli_query($link,$sql_item) or die(mysqli_error());
                        $row          =  mysqli_num_rows($result_item);
  
                                if($row== 0){  //ถ้า session ไหน = 0 ก็เพิ่มทีละ 1 
                                        $sql = "INSERT INTO cart_item (ct_id ,pd_id, ct_qty) VALUES ('$last_id' ,'$productId' , 1)";
                                        $result = mysqli_query($link,$sql) or die(mysqli_error());
                                }
                                else if($row== 1){
                                        if(($row['ct_qty']+1)<= $current_Stock){   //แต่ถ้า session มี 1 อยู่แล้ว ก็เพิ่มไปอีก 1 
                                               //อัพเดทข้อมูล จำนวนสินค้าลงในตาราง cart
                                               $sql    = "UPDATE cart_item SET ct_qty = ct_qty + 1   WHERE  ct_id = '$last_id' AND pd_id = $productId";
                                               $result = mysqli_query($link,$sql) or die(mysqli_error());
                                               
                                        }
                                        else{
                                                //แก้ไขเวลา เพื่อให้สามารถเลือกเวลาล่าสุดมาแสดงในตะกร้า
                                                 $sql = "UPDATE cart_item SET ct_date = NOW() WHERE ct_id = '$last_id' AND pd_id = $productId";
                                                 $result = mysqli_query($link,$sql) or die(mysqli_error());
                                                 
                                                    echo"สินค้าที่คุณเพิ่ม เกินจำนวนที่มีอยู่ในสต๊อก";
                                                     header('Location:cart.php');
                                                    exit;
                                        }
                                }
                                        
                       //บันทึกราคา $pd_price ลงตาราง cart (+ เพิ่มขึ้นเรื่อยๆ)
                        $sql_cart_price     = "UPDATE cart SET subTotal= subTotal + '$pd_price' WHERE  ct_id = '$last_id'";
                        $result_cart_price  = mysqli_query($link,$sql_cart_price) or die(mysqli_error()); 


                        //ตัดในสต๊อกทีละ 1 เพราะเวลา หยิบเพิ่มมาทีละ 1 
                         $sql_stock = "UPDATE product  SET pd_qty = pd_qty - 1
                                 WHERE pd_id = $productId";
                        $result_stock = mysqli_query($link,$sql_stock) or die(mysqli_error());            
                       
                        
     
            deleteAbandonedCart();  // ลบสิ้นค้าที่ หยิบค้างอยู่ในตะกร้า ไม่จ่าย แล้วออกจาร้านไป ที่เวลามากกว่า 1 วัน(คือ ค้างไว้มากกว่า 24 ชม.)
            header('Location:cart.php');                  
       
            exit();
        } 
        else {
            header('Location: product_all.php');  //ถ้าไม่ส่งมา กลับไปยังหน้า product_all.php
      }
?>



