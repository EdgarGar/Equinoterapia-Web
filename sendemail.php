<?php

	// Read the form values
	$success = false;

	// Save data from the form
	$from = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
	$to = 'equinoterapiafranco@gmail.com';
	$subject = isset( $_POST['subject'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['subject'] ) : "";
	$message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";
	$name = isset( $_POST['username'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['username'] ) : "";
	$phone = isset( $_POST['phone'] ) ? preg_replace( "/[^0-9]/", "", $_POST['phone'] ) : "";

	// If values exist, send e-mail
	if ( $name && $from && $phone && $subject && $message) {
		// Create header
		$headers = "From: " . $name . " <" . $from . ">";
		// Create the body of the message
		$message_body = "Nombre: " . $name ."\nCorreo: " . $from . "\nTelefono: " . $phone ."\nMensaje: " . $message . "";
		// Save if the submission of the e-mail was successful
		$success = mail( $to, $subject, $message_body, $headers);

		if ($success){
			// Set alert after successsfull submission
			echo "<script> alert('¡Mensaje enviado exitosamente!'); </script>";
		}else{
			// Set alert after unsuccesssfull submission
			echo "<script> alert('ERROR. Mensaje no enviado. Intente nuevamente o más tarde.'); </script>";
		}
		// Set location
		echo "<script> window.location.replace('cdmx-contacto.html'); </script>";
	}
	else{
		//Set alert and location after unsuccesssfull submission
		echo "
			<script> 
				alert('¡ERROR! Rellene los campos correctamente');
				window.location.replace('cdmx-contacto.html');
			</script>
			";
	}

?>