<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginValidator
 *
 * @author marynovski
 */

include_once('RegisterValidator.class.php');
include_once('../Model/Database.class.php');

abstract class LoginValidator {
    
    static public function loginSpecialChars($login){
        return RegisterValidator::loginSpecialChars($login);
    }
    
    static public function passwordSpecialChars($password){
        return RegisterValidator::passwordSpecialChars($password);
    }
    
    static public function loginExists($login) {
        $db = new DataBase("localhost", "root", "", "hurtownia");
        $query = 'SELECT login FROM users WHERE login="'.$login.'"';
        $row = $db->selectFromDatabase($query);
        
        if($row[1] < 1){
            $_SESSION['loginNotExists'] = '<span class="error">Niepoprawne dane!</span>';
            return false;
        } else{
            return true;
        }
    }
    
    static public function passwordIsGood($password){
        $db = new DataBase("localhost", "root", "", "hurtownia");
        $query = 'SELECT password FROM users WHERE password="'.$password.'"';
        $row = $db->selectFromDatabase($query);
        
        if($row[1] < 1){
            $_SESSION['passwordDoesntMatch'] = '<span class="error">Niepoprawne dane!</span>';
            return false;
        } else{
            return true;
        }
    }
    
    
}

/*
$login = "marynovski";
$password = "honolulu";

if(!LoginValidator::loginExists($login)){
    echo $_SESSION['loginNotExists'];
    unset($_SESSION['loginNotExists']);
} else{
    echo "OK";
}

if(!LoginValidator::passwordIsGood($password)){
    echo $_SESSION['passwordDoesntMatch'];
    unset($_SESSION['passwordDoesntMatch']);
} else{
    echo "OK";
}*/

?>