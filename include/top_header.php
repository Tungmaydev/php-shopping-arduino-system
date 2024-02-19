<div id="top_header" >  
<?php
//    header('Content-Type: text/html; charset=utf-8');
//   
//    
//     
//        if(isset($_SESSION['member_name']) == ""){
//            
//            echo"<a href=user_login_form.php title=เข้าสู่ระบบ>
//                <h3><img src=images/key.png width=38 height=27 />เข้าสู่ระบบ</a>&nbsp;|
//		
//	        <a href=register_form.php title=สมัครสมาชิก>
//                <img src=images/login.png width=28 height=29 />สมัครสมาชิก</a></h3>";
//        }
//        else{
//          
//             echo"<div align=right ><h3> ยินดีต้อนรับคุณ :{$_SESSION['member_name']}&nbsp;|
//                 <a href=user_logout.php>Log Out </a> &nbsp;
//	         <a href=addmin_login.php>เข้าสู่โหมด Admin </a></h3></div>";
//        }
             
?>
    
    <?php 
        header('Content-Type: text/html; charset=utf-8');
   
        if(empty($_SESSION['member_name'])){  // ถ้า member_name ว่าง  
           
        ?>
                <a href=user_login_form.php title=เข้าสู่ระบบ>
                    <img src=images/key.png style="width: 3%" /><span style="font-size: 20px;">เข้าสู่ระบบ</span></a>&nbsp;|
		
	        <a href=register_form.php title=สมัครสมาชิก>
                    <img src=images/login.png style="width: 2.5%"><span style="font-size: 20px;">สมัครสมาชิก</span></a></h3>
      <?php
       
        }
        else{
         ?>
         
             <div align=right;color:#e90; ><span style="font-size: 20px;">คุณ : <?php echo $_SESSION['member_name']; ?>&nbsp;|
                     <a href=user_logout.php><span style="font-size: 20px;">Log Out </span></a> &nbsp;
                     <a href=addmin_login.php><span style="font-size: 20px;">เข้าสู่โหมด Admin</span> </a></span></div>
             
        <?php   
        }
          
    ?>
</div>

