<?php
  // ถ้า เวลา $_SESSION['LAST_ACTIVITY'] ไม่มี ให้ สร้างใหม่
  if(isset($_SESSION['LAST_ACTIVITY'])== FALSE){ 
       $_SESSION['LAST_ACTIVITY'] = mysqli_insert_id($link); 
       $_SESSION['LAST_ACTIVITY']= time(); 
        
  }  
    //ให้เวลาในการทำราย แต่ละเพจ แค่ 30 นาที(30*60=1800)หลังจากนั้นก็จะมีการคืนสต๊อก และ  unset($_SESSION['cart_id']);
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
            if(isset($_SESSION['cart_id'])){  //ถ้ามี cart_id
               $sid = $_SESSION['cart_id']; 

                if(isset($sid)== TRUE) {   //ถ้ามี cart_id จริง
                     
                    $cartContent = getCartContent(); // ดึงข้อมูลจากตาราง cart โดยอ้างอิงถึง session id ของตะกร้าปัจจุบัน แล้วนำไปเก็บในตัวแปร $cartContent
                    $numItem = count($cartContent);
                       for ($i = 0; $i < $numItem; $i++) { //ใช้  forวลลูปตามจำนวนสินค้าที่อยู่มน $cartContent
                          extract($cartContent[$i]); 

                            //เมื่อลบสินค้าแล้ว ก็เอา จำนวนสินค้า  + กลับ เข้าไปในสต๊อกเท่า กับ จำนวนสินค้า หยิบเพิ่มมา (ทำสินค้า ล่าสุด)
                             $sql_stock = "UPDATE product  SET pd_qty = pd_qty + '$ct_qty'  WHERE pd_id = '$pd_id'";
                             $result_stock = mysqli_query($link,$sql_stock) or die(mysqli_error());


                             //ถ้ามีการส่ง  cart_id  จริง ให้ DETELE ในตาราง cart WHERE ct_id  AND pd_id (ทำ)
                              $sql_item    = "DELETE  FROM cart_item WHERE ct_id = '$sid' ";
                              $resul_item  = mysqli_query($link,$sql_item ) or die(mysqli_error());
                        }
                        
                       //เช็กในตาราง cart_item ว่ายังมี ct_id ของ $_SESSION['cart_id'] อีกหรือไม่          
                       $sql_check = "SELECT ct_id FROM cart_item WHERE ct_id = '$sid' ";  
                       $result_check = mysqli_query($link,$sql_check ) or die(mysqli_error());
                       $row_check = mysqli_fetch_assoc($result_check);

                                // ถ้าไม่มี   ct_id ของ $_SESSION['cart_id'] แล้ว
                                if(!$row_check['ct_id']){  
                                    $sql_cart   = "DELETE  FROM cart WHERE ct_id = '$sid'"; //ให้ ลบ ct_id ในตาราง cart ด้วย
                                    $resul_cart  = mysqli_query($link,$sql_cart ) or die(mysqli_error());


                                }   
                }
                 
            }
              //ทำการ ลบ cart_id และ เวลาในการ Shopping $_SESSION['LAST_ACTIVITY']
               unset($_SESSION['cart_id']);
               unset($_SESSION['LAST_ACTIVITY']);
                    echo "<h2>หมดเวลาในการ shopping ...</h2>";
                   header("Refresh: 4; url=index.php");
                  exit;
    }
    else{         
        // ถ้าเวลา ยังไม่เกิน 60 นาที จะอัปเดต เวลาเริ่ม  Shopping ใหม่
        $_SESSION['LAST_ACTIVITY']= time(); 

    }
        
     
        
?>