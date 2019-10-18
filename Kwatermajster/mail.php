
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
mail($to, $subject, $message);


?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charlset="UTF-8" >
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title> Inwentory - Index </title>
        
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap&subset=latin-ext" rel="stylesheet">
        <link rel="icon" href="favicon.ico">
        <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <link rel="stylesheet" href="style.css">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>    
    <body>
        <div id="wrapper">
            <header> 
             <div class="herro_image">
                  <img id="HeroImage"src="img/horizon.jpg" alt="Programista - Header" />
              </div>
              <nav>
                   <ul class="ul-nav">
                       <li class=""><a href="index.php">O Projekcie</a></li>
                       <li><a href="addBaza.php">Dodaj</a></li>
                       <li><a href="view.php">Przeglądaj</a></li>
                       <li><a href="free1.php">Wolne1</a></li>
                       <li><a href="calendar.php">Kalendarz</a></li>
                       <li><a href="districts.php">Okręgi</a></li>
                       <li><a href="mail.php">Mail-Test</a></li>
                       <li><a href="messages.php">Wiadomości</a></li>
                       <li><a href="logout.php">Wyloguj</a</li>
                       <li><a href="registracion.php">Rejesteracja</a></li>
                   </ul>
              </nav>
            </header>
            
            
            <section>
                <article>
                  <h1>Wysyłka maila </h1>
                  <p>
                   <?php
                      if(mail($to, $subject, $message))
                        {
                            echo "Wiadomosc wysłana!";
                        }
                        else
                        {
                            echo "Niepowodzenie !";
                        }
                    ?>
                 </p>
                </article>
                
            </section>
            
            <footer> 
                <a class="footer">Koniec strony </a>   
            </footer>
            
            
            
            
        </div>
        
    </body>
    
</html>

