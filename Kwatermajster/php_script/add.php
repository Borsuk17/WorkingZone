<?php
    session_start();


    if (isset($_POST['name']))
    {
        //Zdefinowaie zmiennych z metody post z pliku addBaza.php
        $name = $_POST['name'];
        $category = $_POST['category'];
        $date_buy = $_POST['date_buy'];
        $destruction = $_POST['destruction'];
        $quality = $_POST['quality'];
        $manufacturer = $_POST['manufacturer'];
        $description = $_POST['description'];
        // $qr code = $_POST['qr code'];
        // $id_warehouse = $_POST['id_warehouse'];
        $price_buy = $_POST['price_buy'];
        $price_now = $_POST['price_now'];
        $Id_owner = $_POST['Id_owner'];
        $additional_affiliation = $_POST['additional_affiliation'];
        $folder_foto = $_POST['folder_foto'];
        $weight = $_POST['weight'];
        $volume = $_POST['volume'];
        // $lock = $_POST['lock'];
       

        //udana walidacja? Tak ( wirtualne trochę narazie )
        $akcept_OK=true;

        // Połączenie z bazą danych i dodanie przedmiotu.
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
                if ($akcept_OK==true)
                {
                    
                    if($connection->query("INSERT INTO `equipment` (`ID`, `name`, `category`, `date_buy`, `destruction`, `quality`, `manufacturer`, `description`, `Qr_code`, `id_warehouse`, `price_buy`, `price_now`, `Id_owner`, `additional_affiliation`, `folder_foto`, `weight`, `volume`, `lock`) VALUES (NULL, '$name', '$category', '$date_buy', '$destruction', '$quality', '$manufacturer', '$description', '$qr_code', '$id_warehouse', '$price_buy', '$price_now', '$Id_owner', '$additional_affiliation', '$folder_foto', '$weight', '$volume', '0');"))
                    {
                        $_SESSION['goodAdd']=true;
                        header('Location: ../good/goodAdd.php');
                        exit();
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
            echo '<span class="error" ><br />Błąd servera! przepraszamy za niedogodnosci i prosimy o rejestrację w innym terminie</span>';
            echo '<br /><br /> <span class="errordev" >Informacja developerska --add.php-- :'.$e.'</span>';
        }
    }

?>
