<?php
header('Content-Type: text/html; charset=utf-8'); 
require_once '../library/config.php';
//(!empty) คือ ไม่มีค่าว่าง , (empty) คือ มีค่าว่าง

if(!isset($_POST['submit'])){
      header("refresh: 0; url= product_list.php");
}
 else{
        if (!empty($_REQUEST)){   //empty เช็กว่ามีค่าว่างไหม
                 $cat_id    = $_REQUEST["cat_id"];  
                 $code      = $_POST["pd_code"];
                 $name      = $_POST["pd_name"];
                 $price     = $_POST["pd_price"];
                 $qty       = $_POST["pd_qty"];
                 $date_ship = $_POST["pd_date_ship"];
                 $detail    = $_REQUEST['detail']; 
                 

                     
                     if($_FILES){
                            $image   = $_FILES['fleImage']['name'];                                
                            $sur     = strrchr($image, "."); //ตัดนามสกุลไฟล์เก็บไว้
                            $newname = $code."".$sur; //ปลี่ยนชื่อรูปใหม่ที่ลูกค้า รหัสสินค้า.นามสกุลไฟล์
                                   move_uploaded_file($_FILES['fleImage']['tmp_name'],"images/product/$newname");                     


                       $sql ="INSERT INTO product (cat_id, pd_code, pd_name, pd_price, pd_qty, date_ship, pd_image, detail)
                              VALUES ('$cat_id','$code','$name','$price','$qty','$date_ship','$newname','$detail')";
                       $result = mysqli_query($link, $sql)or die(mysqli_error());


                       header("refresh: 1; url=product_list.php?cat_id= $cat_id");
                        echo "<h3>กำลังบันทึกข้อมูลใหม่....</h3>"; 

                 }

        }else
            {
             echo "<h3> ล้มเหลว! กรุณาใส่ข้อมูล</h3>
             <input type=button onClick='window.history.back()' value='กลับ'> 
            ";

         }   
 }   
       
?>