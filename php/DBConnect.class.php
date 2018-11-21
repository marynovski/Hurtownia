<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBConnect
 *
 * @author marynovski
 */

include 'Exceptions/DBConnectException.class.php';
class DBConnect {
    
    static public function getConnection($host, $user, $password, $dbname){
        
        try{
            $connection = new mysqli($host, $user, $password, $dbname);
            if($connection->connect_errno != 0){
                throw new Exception("Błąd połączenia z bazą danych!", $connection->connect_errno);
                echo "Nie OK!";
                return false;
            }
            else{
                echo "OK";
                return $connection; 
            }
        }catch(Exception $e){
            $e->getMessage();
            $e->getCode();
        }
        
            
    }    
}
