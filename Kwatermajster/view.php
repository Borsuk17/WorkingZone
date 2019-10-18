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
                       <li><a href="php_script/logout.php">Wyloguj</a</li>
                       <li><a href="registracion.php">Rejesteracja</a></li>
                   </ul>
              </nav>
            </header>
            
            <section>
                <article>
                  <p>Dzień dobry !!! </p>
                   
                    <table width="900" align="center" border="1" bordercolor="#d5d5d5" cellpadding="0" cellspacing="0">     
                    <tr>
                    <?php 
                    ini_set("display_errors", 0);
                    require_once 'php_script/connect.php';
                    $connection = new mysqli($host, $db_user, $db_password, $db_name);
                    // $polaczenie = mysqli_connect($host, $user, $password);
                    mysqli_query($connection, "SET CHARSET utf8");
                    mysqli_query($connection, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
                    mysqli_select_db($connection, $database);


                    $rezults = mysqli_query($connection, "SELECT * FROM `equipment`");
                    $ile = mysqli_num_rows($rezults);
                     
                    echo<<<END
                    <td width="100" align="center" bgcolor="e5e5e5">Nazwa</td>
                    <td width="80" align="center" bgcolor="e5e5e5">Kategoria</td>
                    <td width="95" align="center" bgcolor="e5e5e5">Data Zakupu</td>
                    <td width="40" align="center" bgcolor="e5e5e5">Zniszczenie</td>
                    <td width="40" align="center" bgcolor="e5e5e5">Jakość</td>
                    <td width="200" align="center" bgcolor="e5e5e5">Opis</td>
                    <td width="50" align="center" bgcolor="e5e5e5">Właściciel</td>
                    <td width="85" align="center" bgcolor="e5e5e5">Zakup</td>
                    <td width="100" align="center" bgcolor="e5e5e5">folder_foto</td>
                    <td width="50" align="center" bgcolor="e5e5e5">Waga</td>
                    <td width="50" align="center" bgcolor="e5e5e5">Obiętość</td>
                    
                    </tr><tr>
                    END;
                    
                        for ($i = 1; $i <= $ile; $i++) 
                        {

                            $row = mysqli_fetch_assoc($rezults);
                            $name = $row['name'];
                            $category = $row['category'];
                            $date_buy = $row['date_buy'];
                            $destruction = $row['destruction'];
                            $quality = $row['quality'];
                            $manufacturer = $row['manufacturer'];
                            $description = $row['description'];
                            // $qr code = $row['qr code'];
                            // $id_warehouse = $row['id_warehouse'];
                            $price_buy = $row['price_buy'];
                            $price_now = $row['price_now'];
                            $Id_owner = $row['Id_owner'];
                            $additional_affiliation = $row['additional_affiliation'];
                            $folder_foto = $row['folder_foto'];
                            $weight = $row['weight'];
                            $volume = $row['volume'];
                            // $lock = $row['lock'];
                            
                            // Przetwarzanie zmiennych z bazy danych
                            switch ($category) // sprawdzamy zmienną $category
                            {
                            case 0:
                              $category_i = "Namiot";
                              break;
                            case 1:
                              $category_i = "Kanadyjka";
                              break;
                            case 2:
                              $category_i = "Materac";
                              break;
                            case 3:
                              $category_i = "Koc";
                              break;
                            case 4:
                              $category_i = "Rura";
                              break;
                            default:
                              $category_i = "Null";
                              break;
                            }
                            
                             switch ($destruction) // sprawdzamy zmienną $destruction
                            {
                            case 1:
                              $destruction_i = "B-zły";
                              break;
                            case 2:
                              $destruction_i = "zły";
                              break;
                            case 3:
                              $destruction_i = "średni";
                              break;
                            case 4:
                              $destruction_i = "dobry";
                              break;
                            case 5:
                              $destruction_i = "B-dobry";
                              break;      
                            default:
                              $destruction_i ="Null";
                              break;
                            }
                            
                            switch ($quality) // sprawdzamy zmienną $quality
                            {
                            case 1:
                              $quality_i = "B-słaby";
                              break;
                            case 2:
                              $quality_i = "słaby";
                              break;
                            case 3:
                              $quality_i = "średni";
                              break;
                            case 4:
                              $quality_i = "dobry";
                              break;
                            case 5:
                              $quality_i = "B-dobry";
                              break;
                            default:
                              $quality_i = "Null";
                              break;
                            }
                            
                            

                    echo<<<END
                    <td width="100" align="center">$name</td>
                    <td width="80" align="center">$category_i</td>
                    <td width="95" align="center">$date_buy</td>
                    <td width="40" align="center">$destruction_i</td>
                    <td width="40" align="center">$quality_i</td>
                    <td width="200" align="center">$description</td>
                    <td width="50" align="center">$id_owner</td>
                    <td width="85" align="center">$price_buy</td>
                    <td width="100" align="center"><a href="$folder_foto">$folder_foto</a></td>
                    <td width="50" align="center">$weight</td>
                    <td width="50" align="center">$volume</td>
                    </tr><tr>
                    END;

                        }


                    ?>


                    </tr></table>
                    
                    <p>Dowidzenia !!! </p>
                </article>
            </section>
            
            
            <footer> 
                <a class="footer">Koniec strony </a>   
            </footer>                        
        </div>        
    </body>
</html>