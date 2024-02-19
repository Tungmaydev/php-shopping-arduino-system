
<?php
	$strTo = $To;
	$strHeader = "MIME-Version: 1.0" . "\r\n";
        $strHeader .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	
	//$strHeader .= "Content-type:text/plain; charset=UTF-8" . "\r\n";
	  
	$strHeader .= "From: xxxxxxxxxxx@gmail.com" . "\r\n";
	$strSubject = $Subject;  
	$strMessage = $Message;
	
	//echo "Header=".$strHeader . "<br/>";
//	echo "To=".$strTo . "<br/>";
//	echo "Subject=".$strSubject . "<br/>";
	$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //
	// if($flgSend){
//		  echo "Email Sending.";
//	   }
//	   else{
//		  echo "Email Can Not Send.";
//	   }
        
        

?> 

