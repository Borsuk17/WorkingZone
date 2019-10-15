
<?php

// ini_set ( string $varname , string $newvalue ) : string

ini_set( "smtp_server", "smtp.gmail.com");
ini_set( "SMTP", "smtp.gmail.com");
ini_set( "sendmail_from", '"\"C:\xampp\sendmail\sendmail.exe\" -t"');
ini_set( "sendmail_path", "smtp.gmail.com");
ini_set( "smtp_port", "587");
ini_set( "error_logfile", "error.log");
ini_set( "debug_logfile", "debug.log");
ini_set( "auth_username", "inventory.mail.zhr@gmail.com");
ini_set( "auth_password", "inventory1956");
ini_set( "force_sender", "inventory.mail.zhr@gmail.com");

    
$to      = "maciek.drazek@zhr.pl";
$subject = 'Temat - Sukces!';
$message = "Wiadomość została pomyslnie wyslana z serwera lokalnego.";
$headers = 'From: inventory.mail.zhr@gmail.com' . "\r\n" .
    'Reply-To: inventory.mail.zhr@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
//, $headers
mail($to, $subject, $message);

if(mail($to, $subject, $message))
{
    echo "Wiadomosc wysłana!";
}
else
{
    echo "Niepowodzenie !";
}
    ;

?>
