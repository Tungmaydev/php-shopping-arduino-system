<style>
    a {
      text-decoration:none;
      color:#006666;     
     } 
     a:hover{
      color:#e90;
      text-decoration:none;
     }     
     #search{
         margin-top: 18px;         
     }     
     #main_nav{
       padding-left:5%;      
     }
     #facebook{
         margin:auto;         
     }
     .loading{
     background-image: url("ajax-loader.gif");
     background-repeat: no-repeat;
     display: none;
     height: 100px;
     width: 100px;
 }
    
</style>
<div id="content_left">
    <div id="search">
        <form>
        <span style="font-size: 25px;">ค้นหา Arduino </span>
            <table border="0" cellspacing="7" cellpadding="0">
              <tr> 
                  <td><input style="width: 80%;"  type="text" name="search_pd"></td>
                <td>
                  <button type="submit" name="submit" formaction="search.php" formmethod="POST" style="border-radius:8px; padding: 5px 9px; background-color:#CCCCCC;  font-size: 12px;" >ค้นหา</button>
                </td>
              </tr>
            </table>
        </form>
    </div><br>   
    
   <img src="./images/arrow.jpg" alt="" style="width:100%; height:40px;"/>
   
   <div id="main_nav">    
        <p style=" font-size:22px; text-align: left; font-weight: bold;"><a href="product_all.php"> สินค้าทั้งหมด</a></p>
        <p style=" font-size:22px; text-align: left; font-weight: bold;"><a href="product_new.php"> สินค้ามาใหม่</a></p>
        <p style=" font-size:22px; text-align: left; font-weight: bold;"><a href="product_recommend.php"> สินค้าแนะนำ</a></p>
     
   <!-- ...........................................................-->
   <!-- Main Category  --> 
         <?php 
              $sql = "SELECT main_category.main_id, main_category.main_name, 
                      category.cat_id, category.main_id, category.cat_name 
                      FROM main_category

                      INNER JOIN category  ON main_category.main_id = category.main_id
                      GROUP BY main_category.main_id";

               $query = mysqli_query($link, $sql);
               
               $i = 1;   
                  while(($data = mysqli_fetch_array($query)) != ""){ 
                    $i++;
                       
             ?>
   <span style="text-align: center;">................................</span>
                 <p style=" font-size:18px; text-align: left;font-weight: bold; ">
                    <a href="main_show.php?main_id=<?php echo $data['main_id'];?>"><?php echo $data['main_name']; ?></a></p>
                <!-- End of Main Category  -->  
                
                 <!-- Category -->  
                 <?php
                 
                  $main_id = $data['main_id'];
                  
                  $sql = "select * from category where main_id = '$main_id'";                  
                  $query_cat = mysqli_query($link, $sql);
                 
 
                  while($data = mysqli_fetch_array($query_cat)){
                                   
                  ?>
                    <p style=" font-size:15px; text-align: left;"><a href="product_show.php?cat_id=<?php echo $data['cat_id'];?>"> 
                            &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $data['cat_name']; ?></a></p>
                      
                  <?php
                  }
                             
                  ?> 
                 
                 
                 <!-- End of Category -->                 
                  
             <?php
             
             }
                             
           ?> 
           
        
    </div>

    <div id="facebook" >     
        <span style="font-size: 13px; text-align: center;">เช็คเลขสถานะสินค้า</span><br><br>
        <a target="_blank" href="http://track.thailandpost.co.th/trackinternet/">
            <img  alt="ตรวจสอบสถานะ EMS และไปรษณีย์ลงทะเบียน" style="width:60%; text-align: center;" src="images/Track&Trace.gif" />
        </a>
       
       
                   
<!--<div id="facebook" >-->
        <iframe src="//www.facebook.com/plugins/likebox.php?href=xxxxxxxxxx;width=190&amp;height=350&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:80%; height:350px; margin: auto;" allowTransparency="true"></iframe>                  
    </div>
</div>
