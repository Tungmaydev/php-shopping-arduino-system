
<?php

//  include'config.php';
// ลบออเดอร์ที่ทำรายการ ในตาราง cart ของเมื่อวาน $yesterday = date('d') - 1

function getCartContent(){
    global $link;
    $cartContent = array(); 
    if(isset($_SESSION['cart_id'])){
        $sid = $_SESSION['cart_id'];
        
        $sql = "SELECT ct.ct_id, ct.pd_id, ct.ct_qty, pd.pd_name, pd.pd_price, pd.date_ship,  pd.cat_id ,pd.pd_image
                FROM cart_item ct, product pd, category cat
                WHERE ct_id = '$sid' AND ct.pd_id = pd.pd_id AND cat.cat_id = pd.cat_id";
        $result = mysqli_query($link, $sql)or die(mysqli_error());
            while ($row = mysqli_fetch_assoc($result)) {
                 $cartContent[] = $row;  //นำข้อมูลจากฐานข้อมูลเก็บเข้าอารเรย์
            }
	
	return $cartContent;
    }

}




//function isCartEmpty(){
//  
//    //เมื่อตะกร้าสินค้าว่าง จริงหรือไม่ (มีค่า =0 หรือไม)
//    global $link;
//    $isEmpty = false;
//    $sid = session_id();
//    
//	$sql = "SELECT ct_id FROM cart_item ct  WHERE ct_session_id = '$sid'";
//	$result = mysqli_query($link, $sql)or die(mysqli_error());
//	    if (mysqli_num_rows($result) == 0) {
//		$isEmpty = true;
//	    }	
//	
//	   return $isEmpty;
//}
?>