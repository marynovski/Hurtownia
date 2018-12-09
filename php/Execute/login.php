<?php

session_start();

include_once('../Validators/LoginValidator.class.php');
include_once('../Validators/LoginSanitize.class.php');
include_once('../Validators/RegisterValidator.class.php');
include_once('../Validators/RegisterSanitize.class.php');
include_once('../Model/Database.class.php');

$login = $_POST['login'];
$password = $_POST['password'];

$dataIsValid = true;

if(!LoginSanitize::sanitizeHtmlEntities($login)){$dataIsValid = false;}
if(!LoginSanitize::sanitizeHtmlEntities($password)){$dataIsValid = false;}

if(!LoginSanitize::cutSpacesFromString($login)){$dataIsValid = false;}
if(!LoginSanitize::cutSpacesFromString($password)){$dataIsValid = false;}

if(!LoginValidator::loginSpecialChars($login)){$dataIsValid = false;}
if(!LoginValidator::passwordSpecialChars($password)){$dataIsValid = false;}

if($dataIsValid === true){
    if(!LoginValidator::loginExists($login)){$dataIsValid = false;}
    if(!LoginValidator::passwordIsGood($password)){$dataIsValid = false;}
}

if($dataIsValid === false){
    $_SESSION['loginError'] = '<span class="error">Niepoprawne dane!</span>';
    header('Location: ../../pages/strona-główna');
} else{
    $_SESSION['logged'] = true;
    
    $db = new DataBase("localhost", "root", "", "hurtownia");
    $query = 'SELECT * FROM users WHERE login="'.$login.'" AND password="'.$password.'"';
    $row = $db->selectFromDatabase($query);
    $_SESSION['userId']         = $row[0][0]['id'];
    $_SESSION['userLogin']      = $row[0][0]['login'];
    $_SESSION['userPassword']   = $row[0][0]['password'];
    $_SESSION['userEmail']      = $row[0][0]['email'];
    $_SESSION['userName']       = $row[0][0]['name'];
    $_SESSION['userSurname']    = $row[0][0]['surname'];
    $_SESSION['userAdress']     = $row[0][0]['adress'];
    $_SESSION['userCity']       = $row[0][0]['city'];
    $_SESSION['userPhone']      = $row[0][0]['phone'];
    $_SESSION['userRole']       = $row[0][0]['role'];
    
    header('Location: ../../pages/strona-główna');
    
}




?>