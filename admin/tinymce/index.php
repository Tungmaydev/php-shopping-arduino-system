<!--
<html>
<form method="post" action="test.php">  
         <textarea id="elm1" name="detail"></textarea>
         <button type="submit"> submit</button>
</form>

</html>	

<script src="tinymce/tinymce.min.js" type="text/javascript"></script>
<script>
tinymce.init({
    selector: "textarea",theme: "modern",width: 680,height: 300,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
         "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
   ],
   toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
   toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
   image_advtab: true ,
   
   external_filemanager_path:"./filemanager/",
   filemanager_title:"Responsive Filemanager" ,
  external_plugins: { "filemanager" : "../filemanager/plugin.min.js"}
   ,relative_urls:false,
   remove_script_host:false,
//   document_base_url:"http://localhost/m"
document_base_url:"http://localhost/arduionbangkok_2/admin/tinymce"
 });
</script>-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="ขาย จำหน่ายอุปกรณ์ MikroTik ,อุปกรณ์ MikroTik , ขาย MikroTik, ติดตั้ง MikroTik," />
    <meta name="description" content="จำหน่ายอุปกรณ์ MIkroTik สื่อความรู้ ,อุปกรณ์ MikroTik ,ติดตั้ง MikroTik " />
    <title>Arduino Bangkok</title>
    <title>ขาย จำหน่ายอุปกรณ์ MikroTik ,อุปกรณ์ MikroTik , ขาย MikroTik, ติดตั้ง MikroTik, โดยArduino Bangkok </title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
 <!--        <link href="New_Img/favicon.ico" rel="shortcut icon" type="image/x-icon" /> รูปที่  URL -->
 <script src="tinymce/tinymce.min.js" type="text/javascript"></script>
<script>
tinymce.init({
    selector: "textarea",
    theme: "modern",
//    width: 680,
//    height: 300,
   height: 900,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
         "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
   ],
   toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
   toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
   image_advtab: true ,
   
   external_filemanager_path:"./filemanager/",
   filemanager_title:"Responsive Filemanager" ,
  external_plugins: { "filemanager" : "../filemanager/plugin.min.js"}
   ,relative_urls:false,
   remove_script_host:false,
//   document_base_url:"http://localhost/m"
document_base_url:"http://localhost/arduionbangkok_2/admin/tinymce"
 });
</script>
<style>
    #content_right{
        width: 80%;
        padding-left: 20px;
        margin: auto;
     
    }
</style>
</head>
 <body>
   <?php
  // include '../../library/config.php';
      
    ?>
      <div id="content_right">
          <form>             
             <textarea id="elm1" name="detail">
                 
             </textarea><br><br>
             
                 <select style="width: 15%;" name="pd_code"  >
                    <option selected >--Product  All--</option>
                        <?php
                            $sql = "SELECT * FROM product";
                            $query   = mysqli_query($link,$sql) or die (mysqli_error());                                  
                                while ($data = mysqli_fetch_array($query) ) {
                                    echo "<option value=$data[pd_code]> $data[pd_code] </option>";
                                    
                                }
                        ?>
                </select><br><br>
                <button  type="submit" name="submit" formmethod="POST" formaction="save_Tinymce.php"> submit</button>
         </form>
      </div>
  </body>
 </body>
</html>





<!--<html>
<form method="post" action="test.php">  
         <textarea id="elm1" name="detail"></textarea>
         <button type="submit"> submit</button>
</form>

</html>	-->


