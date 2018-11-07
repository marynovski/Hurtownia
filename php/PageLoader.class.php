<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PageLoader
 *
 * @author marynovski
 */
class PageLoader {
    
    public static function ModuleLoader($module){
        
        switch($module){
            case 'html_start':
                echo        '<!Doctype html>'
                        .   '<html lang="pl">'
                        .   '<head>'
                        .   '   <meta charset="utf-8"'
                        .   '   <meta name="description" content="System zarządzania zamówieniami"'
                        .   '   <meta name="keywords" content="key, words">'
                        .   '   <title>System zamówień</title>'
                        .   '   <link href="../css/style.css" rel="stylesheet">'
                        .   '</head>'
                        .   '<body>';
                break;
            
            case 'header':
                echo        '<header id="header"><h1>System zarządzania zamówieniami</h1></header>';
                break;
            
            case 'nav':
                echo        '<nav id="nav">Nawigacja:<br>'
                        .   '   <ul>'
                        .   '       <li><a href="strona-główna">Strona Główna   </a></li>'
                        .   '       <li><a href="rejestracja">  Rejestracja     </a></li>'
                        .   '       <li><a href="profil">       Profil          </a></li>'
                        .   '       <li><a href="klienci">      Klienci         </a></li>'
                        .   '       <li><a href="produkty">     Produkty        </a></li>'
                        .   '       <li><a href="zamówienia">   Zamówienia      </a></li>'
                        .   '   </ul>'
                        .   '</nav>';
                break;
             
            case 'home':
                echo        '<main>Home</main>';
                break;
            
            case 'clients':
                echo        '<main>Klienci</main>';
                break;
            
            case 'products':
                echo        '<main>Produkty</main>';
                break;
            
            case 'orders':
                echo        '<main>Zamówienia</main>';
                break;
            
            case 'profile':
                echo        '<main>Profil</main>';
                break;
            
            case 'register':
                echo        '<main>Rejestracja</main>';
                break;
            
            case 'footer':
                echo        '<footer id="footer">Kamil Marynowski FatApp &copy; 2018</footer>';
                break;
            
            case 'html_end':
                echo        '</body></html>';
                break;
        }
        
        
    }
    
}
