<?php
session_start();
 include_once("../php/Model/User.class.php");
 include_once("../php/Model/Product.class.php");
 include_once("../php/Model/Database.class.php");
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
                echo        '<nav id="nav">';
                            if(!isset($_SESSION['logged']) || $_SESSION['logged'] === false){ 
                echo        '       <a href="strona-główna" title="Strona główna">          <nav class="nav-tile">Strona Główna     </nav></a>';                
                            } else{
                echo        '       <a href="../php/Execute/logout.php" title="Strona główna">     <nav class="nav-tile">Wyloguj           </nav></a>';                
                            }
                echo        '       <a href="profil" title="Twój profil">                   <nav class="nav-tile">Profil            </nav></a>'
                        .   '       <a href="klienci" title="Zarządzanie klientami">        <nav class="nav-tile">Klienci           </nav></a>'
                        .   '       <a href="produkty" title="Zarządzanie produktami">      <nav class="nav-tile">Produkty          </nav></a>'
                        .   '       <a href="zamówienia" title="Zarządzanie zamówieniami">  <nav class="nav-tile">Zamówienia        </nav></a>'
                        .   '</nav>';
                break;
             
            case 'home':
                if(!isset($_SESSION['logged']) || $_SESSION['logged'] === false){ 
                echo        '<main id="content">'
                        .   '   <header><h2>Witaj w SZZ, zaloguj się, aby móc korzystać z funkcji aplikacji.</h2></header><br> '
                        .   '   <form action="../php/Execute/login.php" method="post">'
                        .   '       <label for="login">Login:</label>'
                        .   '       <input class="input-text" id="login" type="text" name="login"><br><br>'
                        .   '       <label for="password">Hasło:</label>'
                        .   '       <input class="input-text" id="password" type="password" name="password"><br><br>'
                        .   '       <input class="submit-button" type="submit" value="Zaloguj się">'
                        .   '   </form>'
                        .   '<br>'
                        .   '   <a href="rejestracja">Nie masz konta? Stwórz je!</a><br>'
                        .   '   <a href="">Zapomniałeś hasła?</a>'
                        .   '</main>';
                } else{
                
                echo        '<main id="content">'
                        .   '<header><h2>Witaj '.$_SESSION['userName'].'!</h2></header><br>'   
                        .   '</main>';    
                }
                break;
            
            case 'clients':
                echo        '<main id="content">
                                <header id="client-header">
                                    Klienci
                                </header>
                                <section id="table-header-section">
                                    <!--<table id="header-table">
                                        
                                    </table>-->
                                </section>
                                <section id="table-section">
                                    <table id="client-table">
                                       
                                        <tr class="header-table-row">
                                            <td class="client-table-first-td">Nr</td>
                                            <td class="client-table-second-td">Imię</td>
                                            <td class="client-table-third-td">Nazwisko</td>
                                            <td class="client-table-4th-td">Adres</td>
                                            <td class="client-table-5th-td">Miasto</td>
                                            <td class="client-table-6th-td">Telefon</td>
                                            <td class="client-table-7th-td">E-mail</td>
                                            <td class="client-table-8th-td">Rola</td>
                                            <td class="client-table-9th-td">Edytuj</td>
                                            <td class="client-table-10th-td">Usuń</td>
                                        </tr>';
                
                                        $db = new DataBase("localhost", "root", "", "hurtownia");
                                        $row = $db->selectFromDatabase("SELECT * FROM users");
                                        for($i = 1; $i<=$row[1]; $i++){
                                            $usr[$i] = new User($row[0][$i-1]['id'], $row[0][$i-1]['name'], $row[0][$i-1]['surname'], $row[0][$i-1]['adress'], $row[0][$i-1]['city'], $row[0][$i-1]['phone'], $row[0][$i-1]['email'], $row[0][$i-1]['role']);
                                            $usr[$i]->makeUserTableRow($i);
                                        }                                     
                                    echo '</table>
                                </section>
                                <section id="client-buttons-section">
                                    <div class="div-285">
                                        <form action="" method="post">
                                            <input class="submit-button" type="submit" value="Szukaj"><br><br>
                                            <input type="text" name="search">

                                        </form>
                                    </div>
                                    <div class="div-285">
                                        <a href="rejestracja" title="Nowy klient? Nowe konto!"><button class="submit-button" type="button">Dodaj Klienta</button></a>
                                    </div>
                                    <div class="div-285">
                                    </div>
                                    <div class="div-285">
                                    </div>
                                </section>
                            </main>';
                break;
            
            case 'products':
                echo        '<main id="content">
                                <header id="client-header">
                                    Produkty
                                </header>
                                <section id="table-header-section">
                                    <table id="header-table">
                                        <tr class="header-table-row">
                                            <td class="client-table-first-td">Nr</td>
                                            <td class="client-table-second-td">Nazwa</td>
                                            <td class="client-table-third-td">Waga</td>
                                            <td class="client-table-4th-td">Objętość</td>
                                            <td class="client-table-5th-td">Cena</td>
                                            <td class="client-table-6th-td">Kategoria</td>
                                            <td class="client-table-7th-td">Opis</td>
                                            <td class="client-table-9th-td">Edytuj</td>
                                            <td class="client-table-10th-td">Usuń</td>
                                        </tr>
                                    </table>
                                </section>
                                <section id="table-section">
                                    <table id="client-table">';
                                      
                                       $db = new DataBase("localhost", "root", "", "hurtownia");
                                        $row = $db->selectFromDatabase("SELECT * FROM products");
                                        for($i = 1; $i<=$row[1]; $i++){
                                            $usr[$i] = new Product($row[0][$i-1]['id'], $row[0][$i-1]['name'], $row[0][$i-1]['weight'], $row[0][$i-1]['volume'], $row[0][$i-1]['price'], $row[0][$i-1]['category'], $row[0][$i-1]['description']);
                                            $usr[$i]->makeProductTableRow($i);
                                        }  
                
                              echo '</table>
                                </section>
                                <section id="client-buttons-section">
                                    <div class="div-285">
                                        <form action="" method="post">
                                            <input class="submit-button" type="submit" value="Szukaj"><br><br>
                                            <input type="text" name="search">

                                        </form>
                                    </div>
                                    <div class="div-285">
                                        <a href="nowy-produkt" title="Formularz dodawania produktu"><button class="submit-button" type="button">Dodaj Produkt</button></a>
                                    </div>
                                    <div class="div-285">
                                    </div>
                                    <div class="div-285">
                                    </div>
                                </section>
                            </main>';
                break;
            
            case 'orders':
                echo        '<main id="content">
                                <header id="client-header">
                                    Zamówienia
                                </header>
                                <section id="table-header-section">
                                    <table id="header-table">
                                        <tr class="header-table-row">
                                            <td class="client-table-first-td">Nr</td>
                                            <td class="client-table-second-td">Klient</td>
                                            <td class="client-table-third-td">Produkt</td>
                                            <td class="client-table-4th-td">Ilość</td>
                                            <td class="client-table-5th-td">Waga</td>
                                            <td class="client-table-6th-td">Objętość</td>
                                            <td class="client-table-7th-td">Cena</td>
                                            <td class="client-table-9th-td">Edytuj</td>
                                            <td class="client-table-10th-td">Usuń</td>
                                        </tr>
                                    </table>
                                </section>
                                <section id="table-section">
                                    <table id="client-table">
                                        <tr class="client-table-row">
                                            <td class="client-table-first-td">999</td>
                                            <td class="client-table-second-td">Kamil Marynowski</td>
                                            <td class="client-table-third-td">Pieprz Czarny(500g)</td>
                                            <td class="client-table-4th-td">3</td>
                                            <td class="client-table-5th-td">1500g</td>
                                            <td class="client-table-6th-td">N/A</td>
                                            <td class="client-table-7th-td">77.97zł</td>
                                            <td class="client-table-9th-td"><a href="" title="Zmień dane"><button class="submit-button-client-table" type="button">Edytuj</button></a></td>
                                            <td class="client-table-10th-td"><a href="" title"Usuń"><button class="submit-button-client-table" type="button">Usuń</button></a></td>
                                        </tr>                          
                                    </table>
                                </section>
                                <section id="client-buttons-section">
                                    <div class="div-285">
                                        <form action="" method="post">
                                            <input class="submit-button" type="submit" value="Szukaj"><br><br>
                                            <input type="text" name="search"><br><br>
                                            <input type="text" name="search2">

                                        </form>
                                    </div>
                                    <div class="div-285">
                                        <a href="nowe-zamówienie" title="Stwórz nowe zamówienie"><button class="submit-button" type="button">Zamówienie</button></a>
                                    </div>
                                    <div class="div-285">
                                        <button class="submit-button" type="button">PDF</button>
                                    </div>
                                    <div class="div-285">
                                        <button class="submit-button" type="button">Excel</button>
                                    </div>
                                </section>
                            </main>';
                break;
            
            case 'profile':
                echo        '<main id="content">   
                                <section id="adress-data-form-section">
                                    <header id="adress-data-form-header">Twoje dane:</header>
                                    <form action="" method="post">
                                        <div class="adress-data-form-side">
                                            <label for="name">Imię:</label>
                                            <input class="input-text" id="name" type="text" name="name"><br><br>

                                            <label for="surname">Nazwisko:</label>
                                            <input class="input-text" id="surname" type="text" name="surname"><br><br>

                                            <label for="adress">Adres:</label>
                                            <input class="input-text" id="adress" type="text" name="adress"><br><br>

                                            <label for="city">Miejscowość</label>
                                            <input class="input-text" id="city" type="text" name="city">
                                        </div>
                                        <div class="adress-data-form-side">
                                            <label for="phone">Nr telefonu:</label>
                                            <input class="input-text" id="phone" type="number" name="phone">
                                        </div>
                                        <section id="adress-data-form-button-section">
                                            <input class="submit-button" type="submit" value="Zapisz dane">
                                        </section>
                                    </form>
                                </section>

                                <section class="data-form-section">
                                    <header class="user-data-form-header ">Zmiana hasła:</header>
                                    <form action="" method="post">
                                        <section class="user-data-form-inputs border-line">
                                            <label for="password">Twoje hasło:</label>
                                            <input class="input-text" id="password" type="password" name="password"><br><br>

                                            <label for="passwordRep">Powtórz hasło:</label>
                                            <input class="input-text" id="passwordRep" type="password" name="passwordRep"><br><br>

                                            <label for="newPassword">Nowe hasło:</label>
                                            <input class="input-text" id="newPassword" type="password" name="newPassword"><br><br>

                                            <label for="newPasswordRep">Powtórz nowe hasło:</label>
                                            <input class="input-text" id="newPasswordRep" type="password" name="newPasswordRep"><br><br>
                                        </section>
                                        <section class="user-data-form-button-section">
                                            <input class="submit-button" type="submit" value="Zmień hasło">
                                        </section>
                                    </form>
                                </section>
                                <section class="data-form-section">
                                    <header class="user-data-form-header">Zmiana E-maila:</header>
                                    <form action="" method="post">
                                        <section class="user-data-form-inputs">
                                            <label for="email">Twój aktualny e-mail:</label>
                                            <input class="input-text" id="email" type="email" name="email"><br><br>

                                            <label for="newEmail">Nowy e-mail:</label>
                                            <input class="input-text" id="newEmail" type="email" name="newEmail"><br><br>
                                        </section>
                                        <section class="user-data-form-button-section">
                                            <input class="submit-button" type="submit" value="Zmień e-mail">
                                        </section>
                                    </form>
                                </section>    
                            </main>    ';
                break;
            
            case 'register':
                echo         '<main id="content">'
                        .    '<section id="register-form-section">'
                        .    '<header id="register-form-header">Tworzenie konta</header>'
                        .    '<form action="../php/Execute/registerSanitize_Validate.php" method="post">'
                        .    '   <section id="form-side">'
                        .    '       <label for="login">Login:</label>'
                        .    '       <input class="input-text" id="login" type="text" name="login"><br>';
                
                                    if(isset($_SESSION['loginSpecialCharsError'])){
                                        echo $_SESSION['loginSpecialCharsError'];
                                        unset($_SESSION['loginSpecialCharsError']);
                                    }

                echo         '       <br>'
                        .    '       <label for="email">E-mail:</label>'
                        .    '       <input class="input-text" id="email" type="email" name="email"><br>';
                
                                    if(isset($_SESSION['emailSpecialCharsError'])){
                                        echo $_SESSION['emailSpecialCharsError'];
                                        unset($_SESSION['emailSpecialCharsError']);
                                    }

                echo         '       <br>'
                        .    '        <label for="password">Hasło:</label>'
                        .    '        <input class="input-text" id="password" type="password" name="password"><br>';
                                    if(isset($_SESSION['passwordSpecialCharsError'])){
                                        echo $_SESSION['passwordSpecialCharsError'];
                                        unset($_SESSION['passwordSpecialCharsError']);
                                    }

                echo         '       <br>'
                        .    '        <label for="passwordRep">Powtórz hasło:</label>'
                        .    '        <input class="input-text" id="passwordRep" type="password" name="passwordRep"><br>';
                                    if(isset($_SESSION['passwordNotEqualError'])){
                                        echo $_SESSION['passwordNotEqualError'];
                                        unset($_SESSION['passwordNotEqualError']);
                                    }

                echo         '       <br>'                
                        .    '    </section>'
                        .    '    <section id="form-side">'
                        .    '        <label for="name">Imię:</label>'
                        .    '        <input class="input-text" id="name" type="text" name="name"><br>';
                                    
                                        if(isset($_SESSION['nameSpecialCharsError'])){
                                        echo $_SESSION['nameSpecialCharsError'];
                                        unset($_SESSION['nameSpecialCharsError']);
                                    }

                echo         '       <br>'
                        .    '         <label for="surname">Nazwisko:</label>'
                        .    '         <input class="input-text" id="surname" type="text" name="surname"><br>';
                
                                    if(isset($_SESSION['surnameSpecialCharsError'])){
                                        echo $_SESSION['surnameSpecialCharsError'];
                                        unset($_SESSION['surnameSpecialCharsError']);
                                    }

                echo         '       <br>'
                        .    '         <label for="adress">Adres:</label>'
                        .    '         <input class="input-text" id="adress" type="text" name="adress"><br>';

                                    if(isset($_SESSION['adressSpecialCharsError'])){
                                        echo $_SESSION['adressSpecialCharsError'];
                                        unset($_SESSION['adressSpecialCharsError']);
                                    }

                echo         '       <br>'
                        .    '         <label for="city">Miejscowość</label>'
                        .    '         <input class="input-text" id="city" type="text" name="city"><br>';
                
                                    if(isset($_SESSION['citySpecialCharsError'])){
                                        echo $_SESSION['citySpecialCharsError'];
                                        unset($_SESSION['citySpecialCharsError']);
                                    }

                echo         '       <br>'
                        .    '      </section>'
                        .    '     <section id="register-form-button-section">'
                        .    '         <input class="submit-button" type="submit" value="Stwórz konto">'
                        .    '     </section>'
                        .    '</form>'
                        .    '</section>'
                        .    '</main>';
                
                               if(isset($_SESSION['loginLengthError'])){
                                   echo $_SESSION['loginLengthError'];
                                   unset($_SESSION['loginLengthError']);
                               }
                               
                               if(isset($_SESSION['passwordLengthError'])){
                                   echo $_SESSION['passwordLengthError'];
                                   unset($_SESSION['passwordLengthError']);
                               }
                               
                               if(isset($_SESSION['emailLengthError'])){
                                   echo $_SESSION['emailLengthError'];
                                   unset($_SESSION['emailLengthError']);
                               }
                               
                               if(isset($_SESSION['nameLengthError'])){
                                   echo $_SESSION['nameLengthError'];
                                   unset($_SESSION['nameLengthError']);
                               }
                               
                               if(isset($_SESSION['surnameLengthError'])){
                                   echo $_SESSION['surnameLengthError'];
                                   unset($_SESSION['surnameLengthError']);
                               }
                               
                               if(isset($_SESSION['adressLengthError'])){
                                   echo $_SESSION['adressLengthError'];
                                   unset($_SESSION['adressLengthError']);
                               }
                               
                               if(isset($_SESSION['cityLengthError'])){
                                   echo $_SESSION['cityLengthError'];
                                   unset($_SESSION['cityLengthError']);
                               }
                               
                               if(isset($_SESSION['emptyFieldError'])){
                                   echo $_SESSION['emptyFieldError'];
                                   unset($_SESSION['emptyFieldError']);
                               }
                               
                               if(isset($_SESSION['accountExists'])){
                                   echo $_SESSION['accountExists'];
                                   unset($_SESSION['accountExists']);
                               }
                               if(isset($_SESSION['UserAddedSuccess'])){
                                   echo $_SESSION['UserAddedSuccess'];
                                   unset($_SESSION['UserAddedSuccess']);
                               }
                               if(isset($_SESSION['UserAddedError'])){
                                   echo $_SESSION['UserAddedError'];
                                   unset($_SESSION['UserAddedError']);
                               }
                               
                
                break;
            
            case 'addProduct':
                echo         '<main id="content">'
                        .    '<section id="register-form-section">'
                        .    '<header id="register-form-header">Dodawanie nowego produktu:</header>'
                        .    '<form action="" method="post">'
                        .    '   <section id="form-side">'
                        .    '       <label for="productName">Nazwa:</label>'
                        .    '       <input class="input-text" id="productName" type="text" name="productName"><br><br>'

                        .    '       <label for="productWeight">Waga(g):</label>'
                        .    '       <input class="input-text" id="productWeight" type="number" name="productWeight"><br><br>'

                        .    '        <label for="productVolume">Objętość(ml):</label>'
                        .    '        <input class="input-text" id="productVolume" type="number" name="productVolume"><br><br>'

                        .    '        <label for="productPrice">Cena:</label>'
                        .    '        <input class="input-text" id="productPrice" type="number" name="productPrice">'
                        .    '    </section>'
                        .    '    <section id="form-side">'
                        .    '        <label for="productCategory">Kategoria:</label>'
                        .    '        <input class="input-text" id="productCategory" type="text" name="productCategory"><br><br>'

                        .    '         <label for="productDescription">Opis:</label>'
                        .    '         <input class="input-text" id="surname" type="text" name="surname"><br><br>'
                        .    '     </section>'
                        .    '     <section id="register-form-button-section">'
                        .    '         <input class="submit-button" type="submit" value="Dodaj">'
                        .    '     </section>'
                        .    '</form>'
                        .    '</section>'
                        .    '</main>';
                break;
            case 'newOrder':
                echo         '<main id="content">'
                        .    '<section id="register-form-section">'
                        .    '<header id="register-form-header">Nowe zamówienie:</header>'
                        .    '<form action="" method="post">'
                        .    '   <section id="form-side">'
                        .    '       <label for="client">Klient:</label>'
                        .    '       <select id="client">'
                        .    '          <option>Kamil Marynowski(Czernica)</option>'
                        .    '       </select>   '
                        .    '       <br><br>'

                        .    '       <label for="product">Produkt:</label>'
                        .    '       <select id="product">'
                        .    '          <option>Pieprz Czarny(500g)</option>'
                        .    '       </select>   '
                        .    '       <br><br>'

                        .    '        <label for="count">Ilość:</label>'
                        .    '        <input class="input-text" id="count" type="number" name="count"><br><br>'

                        .    '    </section>'
                        .    '    <section id="form-side">'

                        .    '      </section>'
                        .    '     <section id="register-form-button-section">'
                        .    '         <input class="submit-button" type="submit" value="Zamów">'
                        .    '     </section>'
                        .    '</form>'
                        .    '</section>'
                        .    '</main>';
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
