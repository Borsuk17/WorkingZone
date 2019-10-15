<?php
    session_start();
    
    if(!isset($_SESSION['login']))
    {
        header('Location: index.php');
        exit();
    }

    if (isset($_POST['name']))
    {


        $name = $_POST['name'];
        $kategoria = $_POST['kategoria'];
        $zniszczenie = $_POST['zniszczenie'];
        $jakosc = $_POST['jakosc'];
        $data_zakupu = $_POST['data_zakupu'];
        $producent = $_POST['producent'];
        $opis = $_POST['opis'];
        // $qr_code = ;
        // $id_mag = ;
        $wartosc_zakupu = $_POST['wartosc_zakupu'];
        $wartosc_obecna = $_POST['wartosc_obecna'];
        $przynaleznosc = $_POST['przynaleznosc'];
        $przynaleznosc_dodatkowa = $_POST['przynaleznosc_dodatkowa'];
        $adres_folderu = $_POST['adres_folderu'];
        $waga = $_POST['waga'];
        $obietosc = $_POST['obietosc'];
        $ilosc_w_paczce = $_POST['ilosc_w_paczce'];
        
        //Testowy element
        $qr_code = "01";
        $id_mag = "01";
        
        
        

        
        require_once "connect.php";
        
        mysqli_report(MYSQLI_REPORT_STRICT);

        try
        {
            $connection = new mysqli($host, $db_user, $db_password, $db_name);
            if($connection->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());
                echo "Error: ".$connection->connect_errno;
            }
            else
            {

                //Końcowy werdykt walidacji 
                if (true)
                {
                    
                    //$topic = "Pierwszy temat na dzis";
                    //$message = "Czesc to jest pierwszy mail od serwisu kwatermajster";
                    //mail($email, $topic, $message);
                    
                    if($connection->query("INSERT INTO `equipment` (`ID`, `Nazwa`, `Kategoria`, `Data zakupu`, `Zniszczenie`, `quality`, `Producent`, `Opis`, `Qr code`, `id Magazynu`, `Wartosc Zakupu`, `Wartosc Obecna`, `Id_owner`, `additional_affiliation`, `Folder zdjeciowy ADRES`, `Waga`, `volume`, `lock`) VALUES (NULL, '$name', '$kategoria', '$data_zakupu', '$zniszczenie', '$jakosc', '$producent', '$opis', '$qr_code', '$id_mag', '$wartosc_zakupu', '$wartosc_obecna', '$przynaleznosc', '$przynaleznosc_dodatkowa', '$adres_folderu', '$waga', '$obietosc', '$ilosc_w_paczce');"))
                    {
                        $_SESSION['goodadd']=true;
                        echo "Dodanie pomyślne";
                        //header('Location: welcome.php');
                         exit();
                    }
                    else
                    {
                            throw new Exception($connection->error);
                    }

                }


                $connection->close();
            }
        }
        catch(Exception $e)
        {
            echo '<span class="error" >Błąd servera! przepraszamy za nidogodnosci i prosimy o rejestrację w innym terminie</span>';
            echo '<br /><br /> <span class="errordev" >Informacja developerska: '.$e.'</span>';
        }
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
                  <p id="addName">Dodaj nowy sprzęt</p>
                   <form method="post">
                      
                       <div class="row"><label><input type="text" name="name" placeholder="Podaj Nazwę do inventory" id="" >Nazwa</label></div>
        
                           <div class="row">
                                <label for=""> Kategoria</label>   
                                    <select name="kategoria" id="">
                                        <option value="1"> Namiot </option>
                                        <option value="2"> Kanadyjka </option>
                                        <option value="3"> Materac </option>
                                        <option value="4"> Koc </option>
                                        <option value="5"> Rura </option>
                                   </select>
                               </label>
                           </div>
                       
                       
                       <div class="col">
                          <div class="row">   
                               <fieldset>
                                    <legend>Zniszczene - Stan</legend>
                                    <div><label for=""><input type="radio" value="1" name="zniszczenie">Bardzo Zły </label></div>
                                    <div><label for=""><input type="radio" value="2" name="zniszczenie">Zły </label></div>
                                    <div><label for=""><input type="radio" checked value="3" name="zniszczenie">Średni </label></div>
                                    <div><label for=""><input type="radio" value="4" name="zniszczenie">Dobry </label></div>
                                    <div><label for=""><input type="radio" value="5" name="zniszczenie">Bardzo Dobry </label></div>   
                               </fieldset>
                           </div> 
                       </div>
                       
                       <div class="col">
                           <div class="row">   
                               <fieldset>
                                    <legend>Jakość</legend>
                                    <div><label for=""><input type="radio" value="1" name="jakosc">Bardzo Słaba </label></div>
                                    <div><label for=""><input type="radio" value="2" name="jakosc">Słaba </label></div>
                                    <div><label for=""><input type="radio" checked value="3" name="jakosc">Średna </label></div>
                                    <div><label for=""><input type="radio" value="4" name="jakosc">Dobra </label></div>
                                    <div><label for=""><input type="radio" value="5" name="jakosc">Bardzo Dobra </label></div>   
                               </fieldset>
                           </div>
                       </div>
                       <div class="row"><label><input type="date" name="data_zakupu" id="" >Data Zakupu</label></div>
                       
                       <div class="row"><label><input type="text" name="producent" id="" >Producent</label></div>
                       
                       <div class="row"><label><input type="long-text" name="opis" id="" >Opis</label></div>
                       
                       <div class="row"><label><input type="text" disabled name="qr_code" id="" >QRCode</label></div>
                       
                       <div class="row"><label><input type="text" disabled name="id_mag" id="" >IDMag</label></div>
                        
                       <div class="row"><label><input type="number" name="wartosc_zakupu" step="0.01" id="" >Cena Zakupu</label></div>
                       
                       <div class="row"><label><input type="number" name="wartosc_obecna" step="0.01" id="" >Szacunkowa wartość obecna</label></div>
                        
                        <div class="row"><label><input type="text" name="przynaleznosc" id="" >Szczep</label></div>
                         
                        <div class="row"><label><input type="text" name="przynaleznosc_dodatkowa" id="" >Drużyna</label></div>
                         
                       <div class="row"><label><input type="text" name="adres_folderu" id="" >Link do folderu zdjeciowego</label></div>
                       
                       <div class="row"><label><input type="number" name="waga" step="0.1"  id="" >Waga</label></div>
                       
                       <div class="row"><label><input type="number" name="obietosc" step="0.01"  id="" >Objętość w [m3]</label></div>
                       
                       <div class="row"><label><input type="number" placeholder="ilość w paczce" step="1" name="ilosc_w_paczce" id="" >Ilość</label></div>
                       
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