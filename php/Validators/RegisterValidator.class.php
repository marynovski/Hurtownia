<?php
session_start();
abstract class RegisterValidator{
    
    static public function isEmpty($var){
        if(empty($var) || !isset($var)){
            $_SESSION['emptyFieldError'] = '<span class="error">Wypełnij wszystkie pola!</span>';
            return true;
        } else{
            return false;
        }
    }
    
    static public function loginLenghtIsValid($login){
        
        if(strlen($login) < 3 || strlen($login) > 30){
            $_SESSION["loginLengthError"] = '<span class="error">Login musi zawierać 3-30 znaków!</span><br>';
            return false;
        }
        else{
            return true;
        }
        
    }
    
    static public function passwordLengthIsValid($password){
        if(strlen($password) < 8 || strlen($password) > 30){
            $_SESSION["passwordLengthError"] = '<span class="error">Hasło musi zawierać 8-50 znaków!</span><br>';
            return false;
        }
        else{
            return true;
        }
    }
    
    static public function nameLengthIsValid($name){
        if(strlen($name) > 30){
            $_SESSION["nameLengthError"] = '<span class="error">Imię musi zawierać 8-50 znaków!</span><br>';
            return false;
        }
        else{
            return true;
        }
    }
    
    static public function surnameLengthIsValid($surname){
        if(strlen($surname) > 30){
            $_SESSION["surnameLengthError"] = '<span class="error">Nazwisko musi zawierać 8-50 znaków!</span><br>';
            return false;
        }
        else{
            return true;
        }
    }
    
    static public function cityLengthIsValid($city){
        if(strlen($city) > 30){
            $_SESSION["cityLengthError"] = '<span class="error">Miasto musi zawierać 8-50 znaków!</span><br>';
            return false;
        }
        else{
            return true;
        }
    }
    
    static public function adressLengthIsValid($adress){
        if(strlen($adress) > 30){
            $_SESSION["adressLengthError"] = '<span class="error">Adres musi zawierać 8-50 znaków!</span><br>';
            return false;
        }
        else{
            return true;
        }
    }
    
    static public function emailLengthIsValid($email){
        if(strlen($email) > 30){
            $_SESSION["emailLengthError"] = '<span class="error">E-mail musi zawierać 8-50 znaków!</span><br>';
            return false;
        }
        else{
            return true;
        }
    }
    
    
    
    static private function nonSpecialChars($var){
        if(preg_match('/[!@#$%\-\'\"{}\[\].,:;<>?\/+()^&*_|=]/', $var)){
            return true;
        } else{
            return false;
        }
    }
    
    static public function loginSpecialChars($login){
        
        if(self::nonSpecialChars($login)){
            $_SESSION['loginSpecialCharsError'] = '<span class="error">Niepoprawny login!</span>';
            return false;
        } else{
            return true;
        }  
    }
    
    static public function passwordSpecialChars($password){
       if(preg_match('/[#%\-\'\"{}\[\].,:;<>?\/+()^&*|=]/', $password)){
            $_SESSION['passwordSpecialCharsError'] = '<span class="error">Dozwolone znaki: ! @ $ _</span>';
            return false;
        } else{
            return true;
        } 
    }
    
    static public function nameSpecialChars($name){
        if(self::nonSpecialChars($name)){
            $_SESSION['nameSpecialCharsError'] = '<span class="error">Niepoprawne imię!</span>';
            return false;
        } else{
            return true;
        }  
    }
    
    static public function surnameSpecialChars($surname){
        if(self::nonSpecialChars($surname)){
            $_SESSION['surnameSpecialCharsError'] = '<span class="error">Niepoprawne nazwisko!</span>';
            return false;
        } else{
            return true;
        }  
    }
    
    static public function citySpecialChars($city){
        if(self::nonSpecialChars($city)){
            $_SESSION['citySpecialCharsError'] = '<span class="error">Niepoprawna miejscowośc!</span>';
            return false;
        } else{
            return true;
        } 
    }
    
    static public function emailSpecialChars($email){
        if(preg_match('/^[a-zA-Z0-9.\-_]+@[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,4}$/', $email)){
            return true;
        } else{
            $_SESSION['emailSpecialCharsError'] = '<span class="error">Niepoprawny email!</span>';
            return false;
        }
    }
    
    static public function adressSpecialChars($adress){
        if(preg_match('/[!@$_#%\-\'\"{}\[\].,:;<>?+()^&*|=]/', $adress)){
            $_SESSION['adressSpecialCharsError'] = '<span class="error">Adres jest niepoprawny!</span>';
            return false;
        } else{
            return true;
        }
    }
    
    static public function passwordsAreEqual($password, $passwordRep){
        if($password === $passwordRep){
            return true;
        } else{
            $_SESSION['passwordNotEqualError'] = '<span class="error">Hasła nie są jednakowe!</span>';
            return false;
        }
    }
    
    
}




/*
$login = '4marynovski';
$password = '4@_Honolulu';
$name = "Kamil";
$surname = "Marynowski";
$city = "Czernica";
$email = "marynovski@gmail.com";
$adress ="Wojska Polskiego 4/13";

if(!RegisterValidator::loginLenghtIsValid($login)){
    echo $_SESSION['loginLengthError'];
    unset($_SESSION['loginLengthError']);
}else{
    echo '<span style="color: green">OK!</span><br>';
}

if(!RegisterValidator::loginSpecialChars($login)){
    echo $_SESSION['loginSpecialCharsError'];
    unset($_SESSION['loginSpecialCharsError']);
}
else{
    echo '<span style="color: green">OK!</span><br>';
}

if(!RegisterValidator::passwordSpecialChars($password)){
    echo $_SESSION['passwordSpecialCharsError'];
    unset($_SESSION['passwordSpecialCharsError']);
}
else{
    echo '<span style="color: green">OK!</span><br>';
}

if(!RegisterValidator::nameSpecialChars($name)){
    echo $_SESSION['nameSpecialCharsError'];
    unset($_SESSION['nameSpecialCharsError']);
}
else{
    echo '<span style="color: green">OK!</span><br>';
}

if(!RegisterValidator::surnameSpecialChars($surname)){
    echo $_SESSION['surnameSpecialCharsError'];
    unset($_SESSION['surnameSpecialCharsError']);
}
else{
    echo '<span style="color: green">OK!</span><br>';
}

if(!RegisterValidator::citySpecialChars($city)){
    echo $_SESSION['citySpecialCharsError'];
    unset($_SESSION['citySpecialCharsError']);
}
else{
    echo '<span style="color: green">OK!</span><br>';
}

if(!RegisterValidator::emailSpecialChars($email)){
    echo $_SESSION['emailSpecialCharsError'];
    unset($_SESSION['emailSpecialCharsError']);
}
else{
    echo '<span style="color: green">OK!</span><br>';
}

if(!RegisterValidator::adressSpecialChars($adress)){
    echo $_SESSION['adressSpecialCharsError'];
    unset($_SESSION['adressSpecialCharsError']);
}
else{
    echo '<span style="color: green">OK!</span><br>';
}
*/




?>