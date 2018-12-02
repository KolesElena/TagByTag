
<?php  require("class.phpmailer.php");
   # Get JSON as a string
   $json_str = file_get_contents('php://input');

   # Get as an object
   $content = json_decode($json_str); 
   
   $nombre= $content->nombre;
   $text_mensaje= $content->text_mensaje;
   $correo= $content->correo;
  
  if ((isset($text_mensaje))&&(isset($correo))) {
    
 $mail=new phpmailer();
    $mail->Mailer="smtp";
    
    $mail->Host="smtp.beget.com";
    $mail->Port=465;
    
    
    //Le indicamos que el servidor smtp no requiere autenticación
	$mail->SMTPAuth=true;
        $mail->SMTPSecure = 'ssl';
	//Le dicimos cual es nuestro nombre de usuario y password
	//al no necesitar autenticación no serian necesarios
	$mail->Username="info@tagbytag.es";
	$mail->Password="ole350008";
	
	//Indicamos cual es nuestra dirección de correo y el nombre que
	//queremos que vea el usuario que lee nuestro correo
	$mail->From="info@tagbytag.es";
	$mail->FromName="TagByTag";
 
	
	
	$mail->CharSet="UTF-8";
	
	
	$mail->AddAddress("info@tagbytag.es");
	$mail->Subject="Mensaje tagbytag";
        $mail->IsHTML(true);
       
       
	$mail->Body="<html><body>$nombre - $correo - $text_mensaje</body></html>";
          
     


	
	$exito=$mail->Send();
	
	if(!$exito) {
		echo("Problemas enviando mensaje!");
		echo("<br>" . $mail->ErrorInfo);
	}
	else {
		echo "<font color='green'><p><b>Gracias por enviar mensaje! En breve me pongo en contacto contigo!</b></p></font>";
	}  

  }
    

?>

