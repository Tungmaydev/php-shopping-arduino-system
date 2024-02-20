

<?php    
    session_start();
    
    $host = "localhost";
    $username = "xxxx";
    $password = "xxxx";
    $database = "arduino";  
    $link = mysqli_connect($host, $username, $password, $database);
    

      
    mysqli_set_charset($link, "utf8");
    
    if(!$link){
        
        die('Connection Failed'.  mysqli_connect_error());
        
    }
  
?>
