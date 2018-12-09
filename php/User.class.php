<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author marynovski
 */
class User {
    
    private $id;
    private $name;
    private $surname;
    private $adress;
    private $city;
    private $phone;
    private $email;
    private $role;
    
    public function __construct($id, $name, $surname, $adress, $city, $phone, $email, $role){
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->adress = $adress;
        $this->city = $city;
        $this->phone = $phone;
        $this->email = $email;
        $this->role = $role;
    }
    
    public function makeUserTableRow($rows){
        
        echo    '<tr class="client-table-row">'
            .   '   <td class="client-table-first-td">'.$rows.'</td>'
            .   '   <td class="client-table-second-td">'.$this->name.'</td>'
            .   '   <td class="client-table-third-td">'.$this->surname.'</td>'
            .   '   <td class="client-table-4th-td">'.$this->adress.'</td>'
            .   '   <td class="client-table-5th-td">'.$this->city.'</td>'
            .   '   <td class="client-table-6th-td">'.$this->phone.'</td>'
            .   '   <td class="client-table-7th-td">'.$this->email.'</td>'
            .   '   <td class="client-table-8th-td">'.$this->role.'</td>'
            .   '   <td class="client-table-9th-td"><a href="" title="Zmień dane"><button class="submit-button-client-table" type="button">Edytuj</button></a></td>'
            .   '   <td class="client-table-10th-td"><a href="../php/deleteFromDatabase.php?id='.$this->id.'&table=users&page=clients" title"Usuń"><button class="submit-button-client-table" type="button">Usuń</button></a></td>'
            .   '</tr>';         
    }
    
    
    
}
