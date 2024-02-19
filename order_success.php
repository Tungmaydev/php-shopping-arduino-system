 <?php
     include"library/config.php";
     include"library/cart-functions.php";
     include"library/checkout-functions.php";
     global $link;
        $orderId     = saveOrder(); // saveOrder() บันทึกตารางลงในตาราง order และ order_item
        $orderAmount = getOrderAmount($orderId);
                        
            $sql    = "INSERT INTO order_bank (od_id, amt)
                       VALUES ($orderId, $orderAmount )"; //จะบันทึกเข้า ตาราง order_bank  และส่งภาพไปยังหน้า success_ATM.php			  
            $result = mysqli_query($link, $sql)or die(mysqli_error());	

              $_SESSION['orderId'] = $orderId;
              header('Location:success.php');

?>