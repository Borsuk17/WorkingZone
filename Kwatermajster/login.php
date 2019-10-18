<?php
// wylogowanie
    session_start();
    if(isset($_POST['logout']))
    {
        unset($_SESSION['login']);
    }
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charlset="UTF-8" >
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title> Inwentory - Index </title>
        
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap&subset=latin-ext" rel="stylesheet">
        <link rel="icon" href="favicon.ico">
        <link href="img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <link rel="stylesheet" href="style.css">
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
                       <li><a href="login.php">Logowanie</a</li>
                       <li><a href="registracion.php">Rejesteracja</a></li>
                   </ul>
              </nav>
            </header>
            
            
            <section>
                <article>
                  <h1> Logowanie </h1>
                       <form action="php_script/loging.php" method="post">
                            e-mail:<input type="text" name="email">
                            <br /><br />
                            Password:<input type="password" name="pass">
                            <br /><br />
                            <input type="submit" value="Zaloguj" />
                        </form>
                        
                    <?php 
                    if(isset($_SESSION['blad']))
                    {
                        echo $_SESSION['blad'];
                    }
                    ?>
                    
                </article>
            </section>
            
            
            <footer> 
                <a class="footer" href="index.php">Created by Maciej Drążek ----------------------------- Index: 87029 SAN </a>   
            </footer>
        </div>
        
    </body>
    
</html>