<?php

    try{
        $cnx = new PDO("mysql:host=localhost;dbname=zsite","root","");
        
    }catch (PDOException $e){
        echo $e->getMessage();
        $cnx=null;
    }