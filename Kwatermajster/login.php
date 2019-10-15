<?php
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
              <img id="HeroImage"src="img/horizon.jpg" alt="Programista - Header" />
              <nav>
                <a class="menu active" href="index.php">O Projekcie</a>
                <a class="menu " href="addBaza.php">Baza</a>
                <a class="menu " href="#">Kalendarz</a>
                <a class="menu " href="#">Wypożyczenia</a>
                <a class="menu " href="login.php">Logowanie</a>
                <a class="menu " href="registracion.php">Rejesteracja</a>
              </nav>
            </header>
            
            <section>
                <article>
                    <h1> Logowanie </h1>
                       <form action="loging.php" method="post">
                            e-mail:<input type="text" name="email">
                            <br /><br />
                            Password:<input type="password" name="pass">
                            <br /><br />
                            <input type="submit" value="Zaloguj" />
                        </form>
                        
                        <form method="post">
                            <input type="submit" value="Wyloguj" name="logout" />
                        </form>
                        
                    <?php 
                    if(isset($_SESSION['blad']))
                    {
                        echo $_SESSION['blad'];
                    }
                    ?>

                        <br><a href="index.php">Strona główna</a>
                        <br></br> 
                </article>
            </section>
            
            <footer> 
                <a class="footer" href="index.html">Koniec strony </a>   
            </footer>
            
            
            
            
        </div>
        
    </body>
    
</html>