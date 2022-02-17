<?php


try {
$baglanti=new PDO("mysql:host=localhost;dbname=eticaret", 'root','');
}catch(Exception $e) {
    echo $e->getMessage();
}

?>