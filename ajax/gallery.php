<div id="maincontent">
  <div id="login">
    <?php 	 
	   	if($_SESSION['admin'] != ""){
	    	echo"<h3> ยินดีต้อนรับ :{$_SESSION['admin']}</h3>
	  		     <a href=logout.php>ออกจากระบบ</a><br>";
	?>
		
        
        <!-- ติดตอฐานข้อมูลเพือให้โชว์ชื่อ กิจกรรม-->
    <?php 
		include('connection.php');
		   $connect_db = $conn;
		   $sql = "SELECT activity_name FROM activity_gallery where activity_id=".$_GET["activity_id"];
		  // echo $sql."<br />";
		   
		   $result = mysql_query($sql,$connect_db);
		   echo mysql_error();
		   $num = mysql_num_rows($result);
		  // mysql_close();
		   $row = mysql_fetch_array($result, MYSQL_ASSOC)
	 ?>
        <form name="form" method="post" enctype="multipart/form-data" action="save_pictures.php">
           <td height="500px" width="900" align="center" >   
              <fieldset >   
                 <h3><left>อัปโหลดรูป กิจกรรม "<?php echo $row["activity_name"]; ?>"</left></h2>
                    รูปที่ 1 ชื่อ :<input type="file" name="upfile[]" ><br/ ><br />
                    <!-- ระบุเลขกิจกรรม-->
                    <input type="hidden" name="activity_id" value="<?php echo $_GET["activity_id"]?> ">
                      <td align="center"><input type="submit" name="submit" value="Upload" />
               </fieldset>
         </form>
      

  
       <form action="delete.php" method="POST" name="form1" id="form1">
       		<input type="submit" name="button" id="button" value="Delete" />
            <input type="hidden" name="activity_id" value="<?php echo $_GET["activity_id"] ?>" /> 
            
      </div>
        <?php } ?>

  <div style="width:100%">
       <button ><a href="index.php?page=gallery_album">กลับ</a></button></div>
   
   
 
<!-- ติดตอฐานข้อมูลเพือให้โชว์ชื่อ กิจกรรม-->
     <?php 
		 include('connection.php');
			$connect_db = $conn;
			$sql = "SELECT activity_name FROM activity_gallery where activity_id=".$_GET["activity_id"];
			$result = mysql_query($sql,$connect_db);
			$num = mysql_num_rows($result);
			mysql_close();
			$row = mysql_fetch_array($result, MYSQL_ASSOC)
	 ?>
            
         <h1 style="text-align:center;">กิจกรรม "<?php echo $row["activity_name"]; ?>"</h1>
          
            
        
        
              
              
<!-- ติดตอฐานข้อมูลเพือให้โชว์ รูปในแต่ละกิจกรรม--> 
              
      <?php					
		  include('connection.php');
			 $connect_db = $conn;
			 $sql = "SELECT * FROM gallery where activity_id=".$_GET["activity_id"];
			 $result = mysql_query($sql);
			 $result = mysql_query($sql,$connect_db);
			  	
				 while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
														
      ?>
      
            <div style="display:inline-block; margin-bottom: 5%">
                 <a href="fileupload/<?php echo $row['name']; ?>" rel="lightbox[roadtrip]">
                    <img src="fileupload/<?php echo trim($row['name']); ?>" width="183" height="192"style="height: 250px; width:200px; border: 1px; cellpadding:2px; cellspacing:2px"></a>
                                   
                          <!-- เข้าเงื่อนไขแอดมินเพื่อโชว์checkbox -->
                   <?php
		 	         if($_SESSION['admin'] != ""){                       
                   ?>   
                                     
                      <input style="display:block; margin:auto;" name="id[]" type="checkbox" value="<?php echo $row['id']; ?>" />
            
                          
                   <?php } ?>    
            </div>
        <?php } ?>
   
   </form>
   
</div>
