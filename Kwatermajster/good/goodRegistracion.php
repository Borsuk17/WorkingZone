<?php
    session_start();

    if(!isset($_SESSION['goodregistracion']))
    {
        header('Location: ../index.php');
        exit();
    }
    else
    {
        unset($_SESSION['goodregistracion']);
    }
    
    //Usuwamy wartości zmiennych zapamiętane w formularzu na wypadek nieudanego "submit".
    if(isset($_SESSION['form_nick'])) unset($_SESSION['form_nick']);
    if(isset($_SESSION['form_email'])) unset($_SESSION['form_email']);
    if(isset($_SESSION['form_pass1'])) unset($_SESSION['form_pass1']);
    if(isset($_SESSION['form_pass2'])) unset($_SESSION['form_pass2']);
    if(isset($_SESSION['form_pesel'])) unset($_SESSION['form_pesel']);
    if(isset($_SESSION['form_idcard'])) unset($_SESSION['form_idcard']);
    if(isset($_SESSION['form_firstname'])) unset($_SESSION['form_firstname']);
    if(isset($_SESSION['form_surname'])) unset($_SESSION['form_surname']);
    if(isset($_SESSION['form_regilations'])) unset($_SESSION['form_regilations']);
    
    //Usuwanie kodów błędów formularza rejestracji.

    if(isset($_SESSION['e_nick'])) unset($_SESSION['e_nick']);
    if(isset($_SESSION['e_email'])) unset($_SESSION['e_email']);
    if(isset($_SESSION['e_pass1'])) unset($_SESSION['e_pass1']);
    if(isset($_SESSION['e_pass2'])) unset($_SESSION['e_pass2']);
    if(isset($_SESSION['e_pesel'])) unset($_SESSION['e_pesel']);
    if(isset($_SESSION['e_idcard'])) unset($_SESSION['e_idcard']);
    if(isset($_SESSION['e_firstname'])) unset($_SESSION['e_firstname']);
    if(isset($_SESSION['e_surname'])) unset($_SESSION['e_surname']);
    if(isset($_SESSION['e_regilations'])) unset($_SESSION['e_regilations']);
    if(isset($_SESSION['e_bot'])) unset($_SESSION['e_bot']);


?>
 
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charlset="UTF-8" >
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title> Inwentory - WELCOME </title>
        
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap&subset=latin-ext" rel="stylesheet">
        <link rel="icon" href="favicon.ico">
        <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <link rel="stylesheet" href="../style.css">
    </head>    
    <body>
        <div id="wrapper">
            <header> 
             <div class="herro_image">
                  <img id="HeroImage"src="../img/horizon.jpg" alt="Programista - Header" />
              </div>
              <nav>
                   <ul class="ul-nav">
                       <li class=""><a href="index.php">O Projekcie</a></li>
                       <li><a  href="addBaza.php">Baza</a></li>
                            
                            
                            
                       </li>
                       <li><a href="#">Kalendarz</a></li>
                       <li><a href="mail.php">Mail</a></li>
                       <li><a href="login.php">Logowanie</a</li>
                       <li><a href="registracion.php">Rejesteracja</a></li>
                   </ul>
              </nav>
            </header>
            <section>
                <article>
                  <h1>Projek Kwatermejster / Gratulujemy udanej rejestracji !!!</h1>
                  <p>Dziekuję za wiarę w projekt</p>
                  <p><a href="login.php">Zaloguj się na swoje nowe konto!!!</a></p>
                   
                </article>
                
            </section>
            
            <footer> 
                <a class="footer">Koniec strony - footer </a>   
            </footer>
            
            
            
            
        </div>
        
    </body>
    
</html>