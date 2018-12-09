<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RegisterSanitize
 *
 * @author marynovski
 */
abstract class RegisterSanitize {
    
    static public function sanitizeHtmlEntities($var){
        $trueVar = $var;
        $var = htmlentities($var, ENT_QUOTES);

        if($trueVar === $var){
            return true;
        } else{
            return false;
        }
    }
    
    static public function cutSpacesFromString($string){
        $trueString = $string;
        $string = str_replace(' ', '', $string);
        
        if($trueString === $string){
            return true;
        } else{
            return false;
        }
    }
    
}

