<?php
//Incluimos la clase de PHPMailer
/*
require_once('phpmailer/class.phpmailer.php');
 
$correo = new PHPMailer(); //Creamos una instancia en lugar usar mail()
 
//Usamos el SetFrom para decirle al script quien envia el correo
$correo->SetFrom("alexrcc17@gmail.com", "PREH-MEDIC");
 
//Usamos el AddReplyTo para decirle al script a quien tiene que responder el correo
$correo->AddReplyTo("alexrcc17@gmail.com","PREH-MEDIC");
 
//Usamos el AddAddress para agregar un destinatario
$correo->AddAddress($u_ibd, "PREH-MEDIC");
 
//Ponemos el asunto del mensaje
$correo->Subject = "Validacion de cuenta PREH-MEDIC";
 
/*
 * Si deseamos enviar un correo con formato HTML utilizaremos MsgHTML:
 * $correo->MsgHTML("<strong>Mi Mensaje en HTML</strong>");
 * Si deseamos enviarlo en texto plano, haremos lo siguiente:
 * $correo->IsHTML(false);
 * $correo->Body = "Mi mensaje en Texto Plano";
 */
//$correo->MsgHTML($palabra_v_email);

 
//Si deseamos agregar un archivo adjunto utilizamos AddAttachment
//$correo->AddAttachment("img/img1.jpeg");
 
//Enviamos el correo
//echo $u_ibd;
/*
if(!$correo->Send()) {
  echo "Hubo un error: " . $correo->ErrorInfo;
} else {
  //echo "Mensaje enviado con exito.";
}
 */
require("../assets/sendgrid-php/sendgrid-php.php");
		require '../assets/sendgrid-php/vendor/autoload.php';
		$sendgrid = new SendGrid('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');
		$email = new SendGrid\Email();
		$solicitante=$_GET["user_logged"];
		$title=$_GET["title"];
		$email
		    ->addTo($_GET["email"])
		    ->setFrom('administrador@radis.com')
		    ->setSubject('TBook-PETICION DE CAMBIO')	    
		    ->setHtml("
					    <label 
					    	style='font-family: arial;
					    		font-weight: bold;
					    	'>El usuario: </label> 
					    <label 
					    	style='font-family: arial;
					    		font-weight: bold;
					    		color: rgb(51,65,133);
								text-decoration: none;
					    	'>$solicitante</label>
						<label
							style='font-family: arial;
							'>está interesado en el libro </label>
						<label 
							style='font-family: arial;
								font-weight: bold;
								color: rgb(233,96,74);
								text-transform: uppercase;
							'>$title</label>
					")
		;	
		try {
		    $sendgrid->send($email);
		    //echo "correo enviado";
		} catch(\SendGrid\Exception $e) {
		    echo $e->getCode();
		    foreach($e->getErrors() as $er) {
		        echo $er;
		    }
		}
?>

		<!-- <a href='location.href='http://localhost/TBookProject/model/validar_registro.php?pv=".$palabra_v."'>
			    			<button id='_btnValidar' style='
				    			width: 15%;			    			
						      	background-color: rgb(233,96,74);
						      	cursor: pointer;
						      	border-style: none;
						      	border-radius: 5pt;
						      	color: white;
						      	height: 25pt;
						      	font-size: 90%;
						      	font-weight: bold;
						      	letter-spacing: 1pt;'
						     >VALIDAR CUENTA
							</button>
						</a> -->