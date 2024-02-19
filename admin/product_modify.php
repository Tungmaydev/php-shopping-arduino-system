<?php
//header('Content-Type: text/html; charset=utf-8'); 
//require_once '../library/config.php';
//
//   if(!isset($_POST['submit'])){
//       header("refresh: 0; url=product_list.php");
//   }
//    else{
//            $pd_id     = $_REQUEST["pd_id"];
//            $cat_id    = $_REQUEST["cat_id"];
//            $code      = $_POST["text_pd_code"];
//            $name      = $_POST["text_pd_name"];
//            $price     = $_POST["text_pd_price"];
//            $qty       = $_POST["text_pd_qty"];
//            $date_ship = $_POST["text_pd_date_ship"];
//       
//            
//            
//            if(!empty($_FILES)){ //ถ้าไม่ว่าว คือมีการแก้รูปใหม่ ถึงเข้ามาทำ
//                
//              //if(is_uploaded_file($_FILES['picture']['tmp_name'])){
//                 $image   = $_FILES['fleImage']['name'];                                
//                 $sur     = strrchr($image, "."); //ตัดนามสกุลไฟล์เก็บไว้
//                 $newname = $code."".$sur; //ปลี่ยนชื่อรูปใหม่ที่ลูกค้า รหัสสินค้า.นามสกุลไฟล์
//                     move_uploaded_file($_FILES['fleImage']['tmp_name'],"images/product/$newname");                   
//
//                      
//
//                       $sql ="UPDATE  product SET cat_id = '$cat_id',pd_code = '$code',pd_name = '$name',pd_price = '$price', pd_qty = '$qty', 
//                              date_ship = '$date_ship' ,pd_image='$newname' WHERE pd_id = '$pd_id'";
//                       mysqli_query($link, $sql)or die(mysqli_error());
//
//                      echo "<h3>กำลังบันทึกข้อมูลใหม่....</h3>"; 
//                      header("refresh: 0; url=product_list.php?cat_id=$cat_id");
//
//                }else
//                    {
//                       echo "<h3>ล้มเหลว!</h3>";
//
//                } 
//            
//            
//             }         
//


    ?>

<?php
header('Content-Type: text/html; charset=utf-8'); 
require_once '../library/config.php';

if(!isset($_POST['submit'])){
       header("refresh: 0; url=product_list.php");
   }
   else{
        
        if(empty($_POST)){
               header("refresh: 0; url=product_list.php");
              exit;
          
        }else{
            $pd_id     = $_REQUEST["pd_id"];
            $cat_id    = $_REQUEST["cat_id"];
            $code      = $_POST["text_pd_code"];
            $name      = $_POST["text_pd_name"];
            $price     = $_POST["text_pd_price"];
            $qty       = $_POST["text_pd_qty"];
            $date_ship = $_POST["text_pd_date_ship"];
            $detail    = $_POST["detail"];
       
            
            if(is_uploaded_file($_FILES['fleImage']['tmp_name'])){
 
                $filename = explode(".",$_FILES['fleImage']['name']); 

                $destination = "images/product/";
                $newfile = $destination.$pd_id.".".$filename[1];
                $newfilename = $pd_id.".".$filename[1];

                     move_uploaded_file($_FILES['fleImage']['tmp_name'], $newfile);

                       $sql ="UPDATE  product SET cat_id = '$cat_id',pd_code = '$code',pd_name = '$name',pd_price = '$price', pd_qty = '$qty',  date_ship = '$date_ship' ,pd_image='$newfilename',detail='$detail' WHERE pd_id = '$pd_id'";
                       

            }
            else{
                      $sql ="UPDATE  product SET cat_id = '$cat_id',pd_code = '$code',pd_name = '$name',pd_price = '$price', pd_qty = '$qty',  date_ship = '$date_ship',detail='$detail' WHERE pd_id = '$pd_id'";
                    
            }
                
                
            $result_update  =   mysqli_query($link, $sql)or die(mysqli_error());
              
                if($result_update == FALSE){
                      die("ไม่สามารถอัพเดทข้อมูลเข้าไปในระบบได้ กรุณาติดต่อ Admin");
                }
                     echo "<h3>กำลังบันทึกข้อมูลใหม่....</h3>"; 
                      header("refresh: 2; url=product_list.php?cat_id=$cat_id");
                   
                }            
            
   }        



    ?>