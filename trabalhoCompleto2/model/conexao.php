<?php
try{
    $bd = new PDO('mysql:host=localhost;dbname=TrabalhoPHP;','root','');
}catch(PDOException $e){
    die($e->getMessage());
}