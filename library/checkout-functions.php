<?php
require_once 'config.php';


/*********************************************************
*                 CHECKOUT FUNCTIONS 
*********************************************************/
function saveOrder(){
    global $link;
     
	$member_name          = $_SESSION["member_name"];
        $orderId              = 0;
        $pd_Total             =  $_REQUEST["hidsubTotal"]; //ราคาสินค้า (ไม่รวมค่า ขนส่ง)
        $hidShip              =  $_REQUEST["hidShip"]; // hidShip  ส่งแบบ
        $hidShipCost          =  $_REQUEST["hidShipCost"]; //od_shipping_cost  ราคาค่าส่ง
        $hidShippingFirstName =  $_REQUEST["hidShippingFirstName"];
        $hidShippingLastName  =  $_REQUEST["hidShippingLastName"];
        $hidShippingPhone     =  $_REQUEST["hidShippingPhone"];
        $hidShippingAddress1  =  $_REQUEST["hidShippingAddress1"];
        $hidShippingAddress2  =  $_REQUEST["hidShippingAddress2"];
        $hidShippingState     =  $_REQUEST["hidShippingState"];
        $hidShippingCity      =  $_REQUEST["hidShippingCity"];
        $hidShippingPostalCode=  $_REQUEST["hidShippingPostalCode"];
        $hidShippingEmail     =  $_REQUEST["hidShippingEmail"];
        $hidPaymentFirstName  =  $_REQUEST["hidPaymentFirstName"];
        $hidPaymentLastName   =  $_REQUEST["hidPaymentLastName"];
        $hidPaymentPhone      =  $_REQUEST["hidPaymentPhone"];
        $hidPaymentAddress1   =  $_REQUEST["hidPaymentAddress1"];
        $hidPaymentAddress2   =  $_REQUEST["hidPaymentAddress2"];
        $hidPaymentState      =  $_REQUEST["hidPaymentState"];
        $hidPaymentCity       =  $_REQUEST["hidPaymentCity"];
        $hidPaymentPostalCode =  $_REQUEST["hidPaymentPostalCode"];
        $hidPaymentEmail      =  $_REQUEST["hidPaymentEmail"];
        
       
		
		// ucwords ทำให้อักษรตัวแรก เป็นตัวพิมพ์ใหญ่
		$hidShippingFirstName = ucwords($hidShippingFirstName);
		$hidShippingLastName  = ucwords($hidShippingLastName);
		$hidPaymentFirstName  = ucwords($hidPaymentFirstName);
		$hidPaymentLastName   = ucwords($hidPaymentLastName);
	        $hidShippingCity      = ucwords($hidShippingCity);
		$hidPaymentCity       = ucwords($hidPaymentCity);
				
		$cartContent = getCartContent(); // ดึงข้อมูลจากตาราง cart โดยอ้างอิงถึง session id ของตะกร้าปัจจุบัน แล้วนำไปเก็บในตัวแปร $cartContent
		$numItem     = count($cartContent); //นับจำนวนข้อมูลใน $cartContent (ตะกร้า)
		
		// บันทึก ในตาราง order save ( order & get order id)
		$sql = "INSERT INTO tbl_order(member_name,od_date, ship, od_shipping_first_name,od_shipping_last_name, od_shipping_address1, 
		                       od_shipping_address2, od_shipping_phone, od_shipping_state, od_shipping_city, od_shipping_postal_code, od_shipping_cost,od_pd_Total,od_shipping_email,
                                       od_payment_first_name, od_payment_last_name, od_payment_address1, od_payment_address2, 
                                       od_payment_phone, od_payment_state, od_payment_city, od_payment_postal_code, od_payment_email)
                        VALUES ('$member_name',NOW(),'$hidShip' ,'$hidShippingFirstName','$hidShippingLastName', '$hidShippingAddress1', 
			        '$hidShippingAddress2', '$hidShippingPhone', '$hidShippingState', '$hidShippingCity', '$hidShippingPostalCode', '$hidShipCost','$pd_Total','$hidShippingEmail',
				'$hidPaymentFirstName', '$hidPaymentLastName', '$hidPaymentAddress1', 
				'$hidPaymentAddress2', '$hidPaymentPhone', '$hidPaymentState', '$hidPaymentCity', '$hidPaymentPostalCode','$hidPaymentEmail')";

                 $result = mysqli_query($link, $sql) or die(mysqli_error($link));
            //  $result = mysqli_query($link, $sql) or die(mysqli_error($link). "<br>$sql");
            //  $result = mysqli_query($link, $sql)or die(mysqli_error());
           
                
		
		// get the order id
		//$orderId = dbInsertId();
                $orderId = mysqli_insert_id($link);
		
		if ($orderId) {
			// บันทึกใน ตาราง order items (save order items)
			for ($i = 0; $i < $numItem; $i++) {
				$sql = "INSERT INTO order_item(od_id, pd_id, od_qty)
                                        VALUES ($orderId, {$cartContent[$i]['pd_id']}, {$cartContent[$i]['ct_qty']})";
				$result = mysqli_query($link,$sql) or die(mysqli_error());					
			}
		
			

			
			// then remove the ordered items from cart
			for ($i = 0; $i < $numItem; $i++) { 
				$sql = "DELETE FROM cart_item
				        WHERE ct_id = {$cartContent[$i]['ct_id']}";
				$result = mysqli_query($link,$sql) or die(mysqli_error());                               
                        
                      
                        //และลบ cart ในตาราง cart ที่มี ct_id เดียวกัน 
                         $sql_check = "SELECT ct_id FROM cart_item  WHERE ct_id = {$cartContent[$i]['ct_id']}";  //เช็กในตาราง cart_item ว่ายังมี ct_id ของ $_SESSION['cart_id'] อีกหรือไม่ 
                         $result_check = mysqli_query($link, $sql_check ) or die(mysqli_error());
                         $row_check = mysqli_fetch_assoc($result_check);
                            
                               if(!$row_check['ct_id']){  
                                        // ถ้าไม่มี   ct_id ของ $_SESSION['cart_id'] แล้ว
                                     $sql_cart   = "DELETE  FROM cart  WHERE ct_id = {$cartContent[$i]['ct_id']}"; //ให้ ลบ ct_id ในตาราง cart ด้วย
                                     $resul_cart  = mysqli_query($link,$sql_cart ) or die(mysqli_error());
                               }
                        }
                        //เมื่อสั่งซื้อเสร็จแล้วก็จะ unset session (เสมือนว่า จ่ายเงินเสร็จ ก็เอาตะกร้าคืนร้าน)
                         unset($_SESSION['cart_id']);
		}					
	
	
	return $orderId;
}



/*
	Get order total amount ( total purchase + shipping cost )
*/
function getOrderAmount($orderId){
    global $link;
	$orderAmount = 0;
	
	$sql = "SELECT SUM(pd_price * od_qty)
	        FROM order_item oi, product p 
		WHERE oi.pd_id = p.pd_id and oi.od_id = $orderId
			
			UNION
			
			SELECT od_shipping_cost 
			FROM tbl_order
			WHERE od_id = $orderId";
	$result = mysqli_query($link,$sql) or die(mysqli_error());

	if (mysqli_num_rows($result) == 2) {
		$row =  mysqli_fetch_row($result);
		$totalPurchase = $row[0];
		
		$row = mysqli_fetch_row($result);
		$shippingCost = $row[0];
		
		$orderAmount = $totalPurchase + $shippingCost;
	}	
	
	return $orderAmount;	
}

?>