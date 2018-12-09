<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Product
 *
 * @author marynovski
 */
class Product {
    
    private $id;
    private $name;
    private $weight;
    private $volume;
    private $price;
    private $category;
    private $description;
    
    public function __construct($id, $name, $weight, $volume, $price, $category, $description){
        
        $this->id = $id;
        $this->name = $name;
        $this->weight = $weight;
        $this->volume = $volume;
        $this->price = $price;
        $this->category = $category;
        $this->description = $description;
    }
    
    
    public function makeProductTableRow($rows){
        
        echo    '<tr class="client-table-row">'
            .   '   <td class="client-table-first-td">'.$rows.'</td>'
            .   '   <td class="client-table-second-td">'.$this->name.'</td>'
            .   '   <td class="client-table-third-td">'.$this->weight.'g</td>'
            .   '   <td class="client-table-4th-td">'.$this->volume.'ml</td>'
            .   '   <td class="client-table-5th-td">'.$this->price.'zł</td>'
            .   '   <td class="client-table-6th-td">'.$this->category.'</td>'
            .   '   <td class="client-table-7th-td">'.$this->description.'</td>'
            .   '   <td class="client-table-9th-td"><a href="" title="Zmień dane"><button class="submit-button-client-table" type="button">Edytuj</button></a></td>'
            .   '   <td class="client-table-10th-td"><a href="../php/deleteFromDatabase.php?id='.$this->id.'&table=products&page=products" title"Usuń"><button class="submit-button-client-table" type="button">Usuń</button></a></td>'
            .   '</tr>';         
    }
    
    
}
