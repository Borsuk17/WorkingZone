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
              <img id="HeroImage"src="img/horizon.jpg" alt="Programista - Header" />
               
               
            </header>
            
            <nav>
                <a class="menu " href="index.php">O Projekcie</a>
                <a class="menu active" href="addBaza.php">Baza</a>
                <a class="menu " href="#">Kalendarz</a>
                <a class="menu " href="#">Wypożyczenia</a>
                <a class="menu " href="login.php">Logowanie</a>
                <a class="menu " href="registracion.php">Rejesteracja</a>
                
            </nav>
            
            <section>
                <article>
                  <p id="addName">Dodaj nowy sprzęt</p>
                   <form action="add.php" method="post">
                      
                       <div class="row"><label><input type="text" name="Name" placeholder="Podaj Nazwę do inventory" id="" >Nazwa</label></div>
        
                           <div class="row">
                                <label for=""> Kategoria</label>   
                                    <select name="Kategoria" id="">
                                        <option value=""> Namiot </option>
                                        <option value=""> Kanadyjka </option>
                                        <option value=""> Materac </option>
                                        <option value=""> Koc </option>
                                        <option value=""> Rura </option>
                                   </select>
                               </label>
                           </div>
                       
                       
                       <div class="col">
                          <div class="row">   
                               <fieldset>
                                    <legend>Zniszczene - Stan</legend>
                                    <div><label for=""><input type="radio" value="1" name="Zniszczenie">Bardzo Zły </label></div>
                                    <div><label for=""><input type="radio" value="2" name="Zniszczenie">Zły </label></div>
                                    <div><label for=""><input type="radio" checked value="3" name="Zniszczenie">Średni </label></div>
                                    <div><label for=""><input type="radio" value="4" name="Zniszczenie">Dobry </label></div>
                                    <div><label for=""><input type="radio" value="5" name="Zniszczenie">Bardzo Dobry </label></div>   
                               </fieldset>
                           </div> 
                       </div>
                       
                       <div class="col">
                           <div class="row">   
                               <fieldset>
                                    <legend>Jakość</legend>
                                    <div><label for=""><input type="radio" value="1" name="Jakość">Bardzo Słaba </label></div>
                                    <div><label for=""><input type="radio" value="2" name="Jakość">Słaba </label></div>
                                    <div><label for=""><input type="radio" checked value="3" name="Jakość">Średna </label></div>
                                    <div><label for=""><input type="radio" value="4" name="Jakość">Dobra </label></div>
                                    <div><label for=""><input type="radio" value="5" name="Jakość">Bardzo Dobra </label></div>   
                               </fieldset>
                           </div>
                       </div>
                       <div class="row"><label><input type="date" name="DataZakupu" id="" >Data Zakupu</label></div>
                       
                       <div class="row"><label><input type="text" name="Producent" id="" >Producent</label></div>
                       
                       <div class="row"><label><input type="long-text" name="Opis" id="" >Opis</label></div>
                       
                       <div class="row"><label><input type="text" disabled name="QRCode" id="" >QRCode</label></div>
                       
                       <div class="row"><label><input type="text" disabled name="IDMag" id="" >IDMag</label></div>
                        
                       <div class="row"><label><input type="number" name="WartośćZakupu" step="0.01" id="" >Cena Zakupu</label></div>
                       
                       <div class="row"><label><input type="number" name="WartośćObecna" step="0.01" id="" >Szacunkowa wartość obecna</label></div>
                        
                        <div class="row"><label><input type="text" name="Przynaleznosc" id="" >Szczep</label></div>
                         
                        <div class="row"><label><input type="text" name="Przynaleznosc dodatkowa" id="" >Drużyna</label></div>
                         
                       <div class="row"><label><input type="text" name="AdresFolderu" id="" >Link do folderu zdjeciowego</label></div>
                       
                       <div class="row"><label><input type="number" name="Waga" step="0.1"  id="" >Waga</label></div>
                       
                       <div class="row"><label><input type="number" name="Obiętosc" step="0.01"  id="" >Objęctosć w [m3]</label></div>
                       
                       <div class="row"><label><input type="number" placeholder="ilość w paczce" step="1" name="Ilosc" id="" >Ilość</label></div>
                       
                       <div class="row"><input type="submit" value="Dodaj do Bazy" ></div>
                       
                   </form>
                </article>
            </section>
            
            <footer> 
                <a class="footer" href="index.html">Koniec strony </a>   
            </footer>
            
            
            
            
        </div>
        
    </body>
    
</html>