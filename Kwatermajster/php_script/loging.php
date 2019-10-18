<?php
    session_start();
    
    if((!isset($_POST['email'])) || (!isset($_POST['pass'])))
    {
        echo "błąd";
        exit();
        header('Location: ../login.php'); 
    }

    require_once "connect.php";

    $connection = @new mysqli($host, $db_user, $db_password, $db_name);
    
    if($connection->connect_errno!=0)
    {
        echo "Error: ".$connection->connect_errno;
    }
    else
    {
        $email = $_POST['email'];
        $password = $_POST['pass'];
#        echo "Tu wchodze 1111 $login $password ";
        $email= htmlentities($email, ENT_QUOTES, "UTF-8");
        
        if($results = @$connection->query(
        sprintf("SELECT * FROM users WHERE email='%s'",
        mysqli_real_escape_string($connection,$email))))
        {
            $ilu_userow = $results->num_rows;
            if($ilu_userow>0)
            {
                $row = $results->fetch_assoc();
                
                if(password_verify($password, $row['passone']))
                {   
                    $_SESSION['login'] = true;
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['user'] = $row['user'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['dnipremium'] = $row['dnipremium'];

                    unset($_SESSION[blad]);
                    $results->free_result();
                    header('Location: ../addBaza.php');
                }
                else
                {
                    $_SESSION['blad'] = '<span style="color:red">Nieprawidlowe dane logowania HE HE haslo </span>';
                    echo "tu wchodzę +++++++++++++++++";
                    header('Location: login.php');
                }
            }
            else
            {
                $_SESSION['blad'] = '<span style="color:red">Nieprawidlowe dane logowania he he username </span>';
                header('Location: login.php');
                
            }
            
        }        
        
        $connection->close();
    }
    
    

    
     
?>
