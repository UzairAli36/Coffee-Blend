<?php

try {
    //host
    define("HOST", "localhost");

    //user
    define("USER", "root");

    //pass
    define("PASS", "");

    //dbname
    define("DBNAME", "coffee-blend");


    $conn = new PDO("mysql:host=".HOST.";dbname=".DBNAME."", USER,PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }   catch(PDOException $Exception) {

        echo $Exception->getMessage();
    }
