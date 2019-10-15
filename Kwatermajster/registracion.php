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
              <img id="HeroImage" src="img/horizon.jpg" alt="Programista - Header" />
               
               
            </header>
            
            <nav>
                <a class="menu " href="index.php">O Projekcie</a>
                <a class="menu " href="addBaza.php">Baza</a>
                <a class="menu " href="#">Kalendarz</a>
                <a class="menu " href="#">Wypożyczenia</a>
                <a class="menu " href="login.php">Logowanie</a>
                <a class="menu active" href="registracion.php">Rejesteracja</a>
                
            </nav>
            
            <section>
                <article>
                  <p id="addName">Dodaj nowy sprzęt</p>
                   <form action="add.php" method="post">
                      
                       <div class="row"><label><input type="text" name="Name" placeholder="" id="" >Nazwa</label></div>
                       
                       <div class="row"><label><input type="password" name="passone" id="" >Hasło1</label></div>
                       
                       <div class="row"><label><input type="password" name="passtwo" id="" >Hasło2</label></div>
                       
                       <div class="row"><label><input type="email" name="email" id=""  >e-mail</label>
                       </div>
                       
                       
                       <div class="row"><label><input type="text" name="pesel" id=""  >Pesel</label>
                       </div>
                       
                       <div class="row"><label><input type="text" name="idcard" id=""  >dowód osobisty</label>
                       </div>
                       
                       <div class="row"><label><input type="text" name="surname" placeholder="Kowslski" id="" >Nazwisko</label></div>
                       
                       <div class="row"><label><input type="text" name="firstname" placeholder="jan" id="" >Imię</label></div>
                       
                   </form>
                </article>
            </section>
            
            <footer> 
                <a class="footer" href="index.html">Koniec strony </a>   
            </footer>
            
            
            
            
        </div>
        
    </body>
    
</html>