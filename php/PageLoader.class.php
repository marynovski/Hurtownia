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
                        .   '       <li><a href="strona-główna" title="Strona główna">          Strona Główna   </a></li>'
                        .   '       <li><a href="profil" title="Twój profil">                   Profil          </a></li>'
                        .   '       <li><a href="klienci" title="Zarządzanie klientami">        Klienci         </a></li>'
                        .   '       <li><a href="produkty" title="Zarządzanie produktami">      Produkty        </a></li>'
                        .   '       <li><a href="zamówienia" title="Zarządzanie zamówieniami">  Zamówienia      </a></li>'
                        .   '   </ul>'
                        .   '</nav>';
                break;
             
            case 'home':
                echo        '<main>'
                        .   '   <header><h2>Witaj w SZZ</h2></header>'
                        .   '   <h3>Zaloguj się, aby móc korzystać z funkcji aplikacji!</h3>'
                        .   '   <form action="" method="post">'
                        .   '       <label for="login">Login:</label>'
                        .   '       <input id="login" type="text" name="login"><br><br>'
                        .   '       <label for="password">Hasło:</label>'
                        .   '       <input id="password" type="password" name="password"><br><br>'
                        .   '       <input type="submit" value="Zaloguj się">'
                        .   '   </form>'
                        .   '   <a href="rejestracja">Nie masz konta? Stwórz je!</a><br>'
                        .   '   <a href="">Zapomniałeś hasła?</a>'
                        .   '</main>';
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
                echo        '<main>'
                        .   '   <header><h2>Tworzenie konta</h2></header>'
                        .   '   <form action="" method="post">'
                        
                        .   '       <label for="login">Login:</label>'
                        .   '       <input id="login" type="text" name="login"><br><br>'
                        
                        .   '       <label for="password">Hasło:</label>'
                        .   '       <input id="password" type="password" name="password"><br><br>'
                       
                        .   '       <label for="passwordrep">Powtórz hasło:</label>'
                        .   '       <input id="passwordrep" type="password" name="password"><br><br>'
                        
                        .   '       <label for="name">Imię:</label>'
                        .   '       <input id="name" type="text" name="name"><br><br>'
                        
                        .   '       <label for="surname">Nazwisko:</label>'
                        .   '       <input id="surname" type="text" name="surname"><br><br>'
                       
                        .   '       <label for="adress">Adres:</label>'
                        .   '       <input id="adress" type="text" name="adress"><br><br>'
                        
                        .   '       <label for="mailcode">Kod pocztowy:</label>'
                        .   '       <input id="mailcode" type="text" name="mailcode"><br><br>'
                        
                        .   '       <label for="city">Miejscowość:</label>'
                        .   '       <input id="city" type="text" name="city"><br><br>'
                        
                        .   '       <input type="submit" value="Utwórz konto">'
                        .   '   </form>'
                        .   '</main>';
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
