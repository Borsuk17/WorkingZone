<?php
    session_start();


    if (isset($_POST['email']))
    {


        $email = $_POST['email'];
        $pesel = $_POST['pesel'];
        $idcard = $_POST['idcard'];
        $surname = $_POST['surname'];
        $firstname = $_POST['firstname'];

        //udana walidacja? Tak
        $akcept_OK=true;

        //CHECK nikname
        $nick = $_POST['nick'];
        if((strlen($nick)<3) || (strlen($nick)>20))
        {
            $akcept_OK=false;
            $_SESSION['e_nick']="Nick musi posiadać od 3 do 20 znaków!";
        }
        if(ctype_alnum($nick)==false)
        {
            $akcept_OK=false;
            $_SESSION['e_nick']="Nick może składać sie tylko ze znaków alfanumerycznych";
        }

        //CHECK adresu e-mail
        $email =$_POST['email'];
        $emailB = filter_var($email, FILTER_SANITIZE_EMAIL); 

        if((filter_var($emailB, FILTER_VALIDATE_EMAIL)==False) ||($emailB!=$email))
        {
            $akcept_OK=false;
            $_SESSION['e_email']="Podaj poprawny adres e-mail";
        }

        //ChECK haslo 
        $pass1 =$_POST['pass1'];
        $pass2 =$_POST['pass2'];
        if((strlen($pass1)<8) || (strlen($pass1)>20))
        {
            $akcept_OK=false;
            $_SESSION['$e_pass1']="Hasło musi posiadać od 8 do 20 znaków!";
        }
        if(ctype_alnum($pass1)==false)
        {
            $akcept_OK=false;
            $_SESSION['$e_pass1']="Hasło może składać sie tylko ze znaków alfanumerycznych";
        }
        if($pass1!=$pass2)
        {
            $akcept_OK=false;
            $_SESSION['$e_pass2']="Hasła muszą być takie same";
        }
        $pass_hash = password_hash($pass1, PASSWORD_DEFAULT);

        //CHECK checkbox
        if(!isset($_POST['regulations']))
        {
            $akcept_OK=false;
            $_SESSION['$e_regulations']="Zaakceptuj regulamin!";
        }

        //CHECK bot recaptcha
        $secret = "6LdncbwUAAAAACVV7SoaKyuo5BmYJkB0qAFQ3VUX";
        $check = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);

        $answer = json_decode($check);
        if ($answer->success==false)
        {
            $akcept_OK=false;
            $_SESSION['$e_bot']="Potwierdz ze nie jesteś botem!";
        }
        
        //zapamietywanie wprowadzonych danych 
        $_SESSION['form_nick']=$nick;
        $_SESSION['form_email']=$email;
        $_SESSION['form_pass1']=$pass1;
        $_SESSION['form_pass2']=$pass2;
        $_SESSION['form_pesel']=$pesel;
        $_SESSION['form_idcard']=$idcard;
        $_SESSION['form_firstname']=$firstname;
        $_SESSION['form_surname']=$surname;
        if(isset($_POST['regulations']))
        {
            $_SESSION['form_regulations']=true;
        }
        
        

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
                //czy email już istnieje?
                $results = $connection->query("SELECT id FROM users WHERE email='$email'");
                if(!$results) throw new Exception($connection->error);
                $how_mach_emails = $results->num_rows;
                if($how_mach_emails>0)
                {
                    $akcept_OK= false;
                    $_SESSION['e_email']="Istnieje już konto o podanym adresie mailowym!";
                }

                //czy  nick już istnieje?
                $results = $connection->query("SELECT id FROM users WHERE user='$nick'");
                if(!$results) throw new Exception($connection->error);
                $how_mach_nicks = $results->num_rows;
                if($how_mach_nicks>0)
                {
                    $akcept_OK= false;
                    $_SESSION['e_nick']="Istnieje już konto o podanej nazwie urzytkownika! wybierz inny Nick";
                }


                //Końcowy werdykt walidacji 
                if ($akcept_OK==true)
                {
                    $topic = "Pierwszy temat na dzis";
                    $message = "Czesc to jest pierwszy mail od serwisu kwatermajster";
                    mail($email, $topic, $message);
                    
                    if($connection->query("INSERT INTO users (`id`, `user`, `passone`, `passtwo`, `email`, `date-registration`, `date-premium`, `confirm`, `pesel`, `idcard`, `surname`, `firstname`) VALUES (NULL, '$nick', '$pass_hash', '$pass_hash', '$email', '2019-10-09', '2019-10-09', '1', '$pesel', '$idcard', '$surname', '$firstname');"))
                    {
                        $_SESSION['goodregistracion']=true;
                        header('Location: welcome.php');
                        // exit();
                    }
                    else
                    {
                            throw new Exception($connections->error);
                    }

                }


                $connection->close();
            }
        }
        catch(Exception $e)
        {
            echo '<span class="error" ><br />Błąd servera! przepraszamy za nidogodnosci i prosimy o rejestrację w innym terminie</span>';
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
        <link href="img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <link rel="stylesheet" href="style.css">
        <script src="https://www.google.com/recaptcha/api.js?render=_reCAPTCHA_site_key"></script>
        <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('6LdscLwUAAAAAC0I7LtX3xESVw0FdqcNa-6oJvmV', {action: 'homepage'}).then(function(token) {
               ...
            });
        });
        </script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
                  <p id="">ZAREJESTRUJ SIĘ W SERWISIE</p>
                   <form  method="post">
                      
                         <div class="row"> Nikname: <input type="text" value="<?php
                             if(isset($_SESSION['form_nick']))
                             {
                                 echo $_SESSION['form_nick'];
                                 unset($_SESSION['form_nick']);
                             }
                            ?>" name="nick" /><br /></div>
                         <?php
                         if (isset($_SESSION['e_nick']))
                         {
                             echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
                             unset($_SESSION['e_nick']);
                         }
                         ?>


                        
                         <div class="row">e-mail: <input type="text" value="<?php
                             if(isset($_SESSION['form_email']))
                             {
                                 echo $_SESSION['form_email'];
                                 unset($_SESSION['form_email']);
                             }
                            ?>" name="email" /><br /></div>
                         <?php
                         if (isset($_SESSION['e_email']))
                         {
                             echo '<div class="error">'.$_SESSION['e_email'].'</div>';
                             unset($_SESSION['e_email']);
                         }
                         ?>

                         

                         <div class="row">haslo: <input type="password" value="<?php
                             if(isset($_SESSION['form_pass1']))
                             {
                                 echo $_SESSION['form_pass1'];
                                 unset($_SESSION['form_pass1']);
                             }
                            ?>" name="pass1" /><br /></div>
                         <?php
                         if (isset($_SESSION['$e_pass1']))
                         {
                             echo '<div class="error">'.$_SESSION['$e_pass1'].'</div>';
                             unset($_SESSION['$e_pass1']);
                         }
                         ?>

                         

                         <div class="row">powtórz haslo: <input type="password" value="<?php
                             if(isset($_SESSION['form_pass2']))
                             {
                                 echo $_SESSION['form_pass2'];
                                 unset($_SESSION['form_pass2']);
                             }
                            ?>" name="pass2" /><br /></div>
                         <?php
                         if (isset($_SESSION['$e_pass2']))
                         {
                             echo '<div class="error">'.$_SESSION['$e_pass2'].'</div>';
                             unset($_SESSION['$e_pass2']);
                         }
                         ?>
                         
                         
                         
                         <div class="row">Pesel: <label><input type="text" value="<?php
                             if(isset($_SESSION['form_pesel']))
                             {
                                 echo $_SESSION['form_pesel'];
                                 unset($_SESSION['form_pesel']);
                             }
                            ?>" name="pesel" placeholder="00000000000" id=""  ></label></div>
                         <?php
                         if (isset($_SESSION['$e_pesel']))
                         {
                             echo '<div class="error">'.$_SESSION['$e_pesel'].'</div>';
                             unset($_SESSION['$e_pesel']);
                         }
                         ?>
                         
                         
                         
                         <div class="row">Dowód Osobisty: <label><input type="text" value="<?php
                             if(isset($_SESSION['form_idcard']))
                             {
                                 echo $_SESSION['form_idcard'];
                                 unset($_SESSION['form_idcard']);
                             }
                            ?>" name="idcard" placeholder="xyz000000" id=""  ></label></div>
                         <?php
                         if (isset($_SESSION['$e_idcard']))
                         {
                             echo '<div class="error">'.$_SESSION['$e_idcard'].'</div>';
                             unset($_SESSION['$e_idcard']);
                         }
                         ?>
                         
                         
                         
                         <div class="row">Nazwisko: <label><input type="text" value="<?php
                             if(isset($_SESSION['form_surname']))
                             {
                                 echo $_SESSION['form_surname'];
                                 unset($_SESSION['form_surname']);
                             }
                            ?>" name="surname" placeholder="Kowslski" id="" ></label></div>
                         <?php
                         if (isset($_SESSION['$e_idcard']))
                         {
                             echo '<div class="error">'.$_SESSION['$e_idcard'].'</div>';
                             unset($_SESSION['$e_idcard']);
                         }
                         ?>
                         
                         
                         
                         <div class="row">Imię: <label><input type="text" value="<?php
                             if(isset($_SESSION['form_firstname']))
                             {
                                 echo $_SESSION['form_firstname'];
                                 unset($_SESSION['form_firstname']);
                             }
                            ?>" name="firstname" placeholder="jan" id="" ></label></div>
                         <?php
                         if (isset($_SESSION['$e_idcard']))
                         {
                             echo '<div class="error">'.$_SESSION['$e_idcard'].'</div>';
                             unset($_SESSION['$e_idcard']);
                         }
                         ?>
                         
                         
                         
                         <div class="row"><label>Akceptuje regulamin <input type="checkbox" name="regulations"<?php 
                         if(isset($_SESSION['form_regulations']))
                         {
                            echo "checked";
                            unset($_SESSION['form_regulations']);
                         }
                         ?> /></label><br /></div>
                         <?php
                         if (isset($_SESSION['$e_regulations']))
                         {
                             echo '<div class="error">'.$_SESSION['$e_regulations'].'</div>';
                             unset($_SESSION['$e_regulations']);
                         }
                         ?>
                         
                         
                         
                         <div class="g-recaptcha" data-sitekey="6LdncbwUAAAAAG1Vo0ajs6isGJz9NVlnBaAoO7XE"></div><br />
                         <?php
                         if (isset($_SESSION['$e_bot']))
                         {
                             echo '<div class="error">'.$_SESSION['$e_bot'].'</div>';
                             unset($_SESSION['$e_bot']);
                         }
                         ?>
                       
                       
                       <div class="row"><input type="submit" value="Zarejestruj" ></div>
                       
                   </form>
                   
                   
                </article>
            </section>
            
            <footer> 
                <a class="footer" href="index.html">Koniec strony </a>   
            </footer>
        </div>
    </body>
</html>