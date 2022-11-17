<?php   
    $dbhost = "localhost";
    $dbname = "sklep";
    $dbuser = "root";
    $dbpassword = "";
    try{
        $db_conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword);
    } catch (PDOException $e){
        echo "Błąd połączenia z bazą danych";
    }    
?>