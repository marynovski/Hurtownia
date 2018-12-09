<?php

session_start();

include_once('../Validators/RegisterSanitize.class.php');
include_once('../Validators/RegisterValidator.class.php');
include_once('../Model/Database.class.php');

$login          =   $_POST['login'];
$password       =   $_POST['password'];
$passwordRep    =   $_POST['passwordRep'];
$email          =   $_POST['email'];
$name           =   $_POST['name'];
$surname        =   $_POST['surname'];
$adress         =   $_POST['adress'];
$city           =   $_POST['city'];

$dataIsValid = true;

if(!RegisterSanitize::sanitizeHtmlEntities($login)){$dataIsValid = false;}
if(!RegisterSanitize::sanitizeHtmlEntities($password)){$dataIsValid = false;}
if(!RegisterSanitize::sanitizeHtmlEntities($passwordRep)){$dataIsValid = false;}
if(!RegisterSanitize::sanitizeHtmlEntities($email)){$dataIsValid = false;}
if(!RegisterSanitize::sanitizeHtmlEntities($name)){$dataIsValid = false;}
if(!RegisterSanitize::sanitizeHtmlEntities($surname)){$dataIsValid = false;}
if(!RegisterSanitize::sanitizeHtmlEntities($adress)){$dataIsValid = false;}
if(!RegisterSanitize::sanitizeHtmlEntities($city)){$dataIsValid = false;}

if(!RegisterSanitize::cutSpacesFromString($login)){$dataIsValid = false;}
if(!RegisterSanitize::cutSpacesFromString($password)){$dataIsValid = false;}
if(!RegisterSanitize::cutSpacesFromString($passwordRep)){$dataIsValid = false;}
if(!RegisterSanitize::cutSpacesFromString($email)){$dataIsValid = false;}
if(!RegisterSanitize::cutSpacesFromString($name)){$dataIsValid = false;}
if(!RegisterSanitize::cutSpacesFromString($surname)){$dataIsValid = false;}


if(!RegisterValidator::loginLenghtIsValid($login)){$dataIsValid = false;}
if(!RegisterValidator::passwordLengthIsValid($password)){$dataIsValid = false;}
if(!RegisterValidator::emailLengthIsValid($email)){$dataIsValid = false;}
if(!RegisterValidator::nameLengthIsValid($name)){$dataIsValid = false;}
if(!RegisterValidator::surnameLengthIsValid($surname)){$dataIsValid = false;}
if(!RegisterValidator::adressLengthIsValid($adress)){$dataIsValid = false;}
if(!RegisterValidator::cityLengthIsValid($city)){$dataIsValid = false;}

if(!RegisterValidator::loginSpecialChars($login)){$dataIsValid = false;}
if(!RegisterValidator::passwordSpecialChars($password)){$dataIsValid = false;}
if(!RegisterValidator::emailSpecialChars($email)){$dataIsValid = false;}
if(!RegisterValidator::nameSpecialChars($name)){$dataIsValid = false;}
if(!RegisterValidator::surnameSpecialChars($surname)){$dataIsValid = false;}
if(!RegisterValidator::adressSpecialChars($adress)){$dataIsValid = false;}
if(!RegisterValidator::citySpecialChars($city)){$dataIsValid = false;}

if(!RegisterValidator::passwordsAreEqual($password, $passwordRep)){$dataIsValid = false;}

if(RegisterValidator::isEmpty($login)){$dataIsValid = false;}
if(RegisterValidator::isEmpty($password)){$dataIsValid = false;}
if(RegisterValidator::isEmpty($passwordRep)){$dataIsValid = false;}
if(RegisterValidator::isEmpty($email)){$dataIsValid = false;}
if(RegisterValidator::isEmpty($name)){$dataIsValid = false;}
if(RegisterValidator::isEmpty($surname)){$dataIsValid = false;}
if(RegisterValidator::isEmpty($adress)){$dataIsValid = false;}
if(RegisterValidator::isEmpty($city)){$dataIsValid = false;}

if($dataIsValid == true){
    $db = new DataBase("localhost", "root", "", "hurtownia");
    $query = 'SELECT * FROM `users` WHERE login="'.$login.'"';
    $row = $db->selectFromDatabase($query);
 
    if($row[1] > 0){
        $dataIsValid = false;
        $_SESSION['accountExists'] = '<span class="error">Użytkownik o podanym loginie już istnieje!</span>';
    }
    
    $query = 'SELECT * FROM `users` WHERE email="'.$email.'"';
    $row = $db->selectFromDatabase($query);
    if($row[1] > 0){
        $dataIsValid = false;
        $_SESSION['accountExists'] = '<span class="error">Użytkownik o podanym email już istnieje!</span>';
    }     
}



if($dataIsValid){
    $query = 'INSERT INTO users (id, login, password, name, surname, adress, city, phone, email, role) VALUES (NULL, "'.$login.'", "'.$password.'", "'.$name.'", "'.$surname.'", "'.$adress.'", "'.$city.'", 0, "'.$email.'", "Klient")';
    if($db->insertIntoDatabase($query)){
        $_SESSION['UserAddedSuccess'] = '<span style="color: green;">Konto zostało utworzone!</span>';
        header('Location: ../../pages/rejestracja');
    } else{
        $_SESSION['UserAddError'] = '<span class="error">Nie udało się dodać użytkownika!</span>';
        header('Location: ../../pages/rejestracja');
    }
} else{
    header('Location: ../../pages/rejestracja');
}


?>