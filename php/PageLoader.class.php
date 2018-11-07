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
                echo        '<header><h1>System zarządzania zamówieniami</h1></header>';
                break;
            
            case 'nav':
                echo        '<nav>Nawigacja</nav>';
                break;
             
            case 'home':
                echo        '<main>Home</main>';
                break;
            
            case 'clients':
                echo        '<main>Klienci</main>';
                break;
             
            case 'footer':
                echo        '<footer>Kamil Marynowski FatApp &copy; 2018</footer>';
                break;
            
            case 'html_end':
                echo        '</body></html>';
                break;
        }
        
        
    }
    
}
