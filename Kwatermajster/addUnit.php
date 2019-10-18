<?php
 session_start();

// sprawdzenie zalogowania
    if (!isset($_SESSION['login']))
    {
        header('Location: index.php');
        exit();
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
        <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
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
                       <li><a href="php_script/logout.php">Wyloguj</a</li>
                       <li><a href="registracion.php">Rejesteracja</a></li>
                   </ul>
              </nav>
            </header>
            
            
            <section>
                <article>
                  <p id="addName">Dodaj nowy sprzęt</p>
                   <form action="php_script/add.php" method="post">
                      
                       <div class="row"><label><input type="text" name="name" placeholder="Podaj Nazwę do inventory" id="" >Nazwa</label></div>
        
                           <div class="row">
                                <label for=""> Kategoria</label>   
                                    <select name="category" id="">
                                        <option value="0"> Namiot </option>
                                        <option value="1"> Kanadyjka </option>
                                        <option value="2"> Materac </option>
                                        <option value="3"> Koc </option>
                                        <option value="4"> Rura </option>
                                   </select>
                               </label>
                           </div>
                       
                       
                       <div class="col">
                          <div class="row">   
                               <fieldset>
                                    <legend>Zniszczene - Stan</legend>
                                    <div><label for=""><input type="radio" value="1" name="destruction">Bardzo Zły </label></div>
                                    <div><label for=""><input type="radio" value="2" name="destruction">Zły </label></div>
                                    <div><label for=""><input type="radio" checked value="3" name="Zniszczenie">Średni </label></div>
                                    <div><label for=""><input type="radio" value="4" name="destruction">Dobry </label></div>
                                    <div><label for=""><input type="radio" value="5" name="destruction">Bardzo Dobry </label></div>   
                               </fieldset>
                           </div> 
                       </div>
                       
                       <div class="col">
                           <div class="row">   
                               <fieldset>
                                    <legend>Jakość</legend>
                                    <div><label for=""><input type="radio" value="1" name="quality">Bardzo Słaba </label></div>
                                    <div><label for=""><input type="radio" value="2" name="quality">Słaba </label></div>
                                    <div><label for=""><input type="radio" checked value="3" name="quality">Średna </label></div>
                                    <div><label for=""><input type="radio" value="4" name="quality">Dobra </label></div>
                                    <div><label for=""><input type="radio" value="5" name="quality">Bardzo Dobra </label></div>   
                               </fieldset>
                           </div>
                       </div>
                       <div class="row"><label><input type="date" name="date_buy" id="" >Data Zakupu</label></div>
                       
                       <div class="row"><label><input type="text" name="manufacturer" id="" >Producent</label></div>
                       
                       <div class="row"><label><input type="long-text" name="description" id="" >Opis</label></div>
                       
                       <div class="row"><label><input type="text" disabled name="qr_code" id="" >QRCode</label></div>
                       
                       <div class="row"><label><input type="text" disabled name="id_warehouse" id="" >IDMag</label></div>
                        
                       <div class="row"><label><input type="number" name="price_buy" step="0.01" id="" >Cena Zakupu</label></div>
                       
                       <div class="row"><label><input type="number" name="price_now" step="0.01" id="" >Szacunkowa wartość obecna</label></div>
                        
                        <div class="row"><label><input type="text" name="Id_owner" id="" >Szczep</label></div>
                         
                        <div class="row"><label><input type="text" name="additional_affiliation" id="" >Drużyna</label></div>
                         
                       <div class="row"><label><input type="text" name="folder_foto" id="" >Link do folderu zdjeciowego</label></div>
                       
                       <div class="row"><label><input type="number" name="weight" step="0.1"  id="" >Waga</label></div>
                       
                       <div class="row"><label><input type="number" name="volume" step="0.01"  id="" >Objęctosć w [m3]</label></div>
                       
                       <div class="row"><label><input type="number" placeholder="ilość w paczce" step="1" name="Ilosc" id="" >Ilość</label></div>
                       
                       <div class="row"><input type="submit" value="Dodaj do Bazy" ></div>
                       
                   </form>
                </article>
            </section>
            
             <footer> 
                <a class="footer" href="index.php">Created by Maciej Drążek ----------------------------- Index: 87029 SAN </a>   
            </footer>
            
            
            
            
        </div>
        
    </body>
    
</html>