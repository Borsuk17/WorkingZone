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
                 
                    <?PHP

                        function printCalendar()
                        {
                          $year = date("Y");
                          $monthNum = date("n");
                          $daysofmonth = date("t");
                          $dayofweek = date("w");
                          $dayofmonth = date("j");
                          $firstdayofmonth = date("w", mktime(0,0,0,$monthNum, 1, $year));

                          if($dayofweek == 0) $dayofweek = 7;
                          if($firstdayofmonth == 0) $firstdayofmonth = 7;

                          switch($monthNum){
                            case 1 : $monthName = "Styczeń";break;
                            case 2 : $monthName = "Luty";break;
                            case 3 : $monthName = "Marzec";break;
                            case 4 : $monthName = "Kwiecień";break;
                            case 5 : $monthName = "Maj";break;
                            case 6 : $monthName = "Czerwiec";break;
                            case 7 : $monthName = "Lipiec";break;
                            case 8 : $monthName = "Sierpień";break;
                            case 9 : $monthName = "Wrzesień";break;
                            case 10 : $monthName = "Październik";break;
                            case 11 : $monthName = "Listopad";break;
                            case 12 : $monthName = "Grudzień";break;
                          }

                          echo("<TABLE border = 1><TR>");
                          echo("<TD bgcolor=\"yellow\" align=\"center\" colspan=\"7\">");
                          echo($monthName." ".$year);
                          echo("</TD></TR><TR>");
                          ?>
                          <TR>
                          <TD align="center" bgcolor="pink">Pn</TD>
                          <TD align="center" bgcolor="pink">Wt</TD>
                          <TD align="center" bgcolor="pink">Sr</TD>
                          <TD align="center" bgcolor="pink">Cz</TD>
                          <TD align="center" bgcolor="pink">Pi</TD>
                          <TD align="center" bgcolor="pink">So</TD>
                          <TD align="center" bgcolor="pink">Nd</TD>
                          </TR>
                          <?
                          $j = $daysofmonth + $firstdayofmonth - 1;

                          for($i = 0; $i < $j; $i++){
                            if($i < $firstdayofmonth - 1){
                              echo("<TD bgcolor=\"white\"></TD>");
                              continue;
                            }
                            if(($i % 7) == 0){
                              echo("</TR><TR>");
                            }
                            if(($i - $firstdayofmonth + 2) == $dayofmonth){
                              $color = "yellow";
                            }
                            else{
                              $color = "green";
                            }
                            echo("<TD bgcolor=\"$color\" align=\"center\">");
                            echo($i - $firstdayofmonth + 2);
                            echo("</TD>");
                          }
                          echo("</TR></TABLE>");
                        }
                        printCalendar();
                    ?>
                     
            </section>
            
            
            <footer> 
                <a class="footer">Koniec strony </a>   
            </footer>
        </div> 
    </body>
</html>