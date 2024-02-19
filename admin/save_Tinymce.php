
<!DOCTYPE html>

        <?php
       include '../../library/config.php';
 //   if(isset($_POST['detail_pd']) == TRUE){
        
        $detail    = $_REQUEST['detail']; //รายละเอียดของสินค้า
        $pd_code = $_POST['pd_code'];  //รหัสสินค้า

        $sql ="UPDATE product  SET detail ='$detail' 
                WHERE pd_code ='$pd_code'";
                 
        $result   = mysqli_query($link,$sql) or die (mysqli_error());
           header("refresh: 1; url= index.php");
        echo "<h3>กำลังบันทึกข้อมูลใหม่....</h3>"; 

      
  //  }
?>
 
