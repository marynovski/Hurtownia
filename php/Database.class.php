<?php

class DataBase{

	private $dbHost;
	private $dbUser;
	private $dbPass;
	private $dbName;
	
	public function __construct($host, $user, $pass, $name){
	
		$this->dbHost = $host;
		$this->dbUser = $user;
		$this->dbPass = $pass;
		$this->dbName = $name;
	}
	
	private function connect(){
	
		$dbConnectId = @new mysqli($this->dbHost, $this->dbUser, $this->dbPass, $this->dbName);
		
		if($dbConnectId->connect_errno != 0){
		
			echo "Błąd połaczenia z bazą";
			return false;
		}
		else{
		
			return $dbConnectId;
		}
	}
	
	
	public function selectFromDatabase($query){
	
			if($connection = $this->connect()){
			
				$result = $connection->query($query);
				$rows = $result->num_rows;
                                for($i = 0;$i<=$rows;$i++){
                                    $row[$i] = $result->fetch_assoc();                               
                                }
                                $connection->close();
                                return array($row, $rows);                                         			
			}
			else{			
				exit(1);
			}
	}
        
        public function deleteFromDatabase($table, $id){
         		if($connection = $this->connect()){
                                                                                                                                                                         
                                   $query = "DELETE FROM $table ";
                                   $query .= "WHERE id=$id";                                                            
                                   
				$result = $connection->query($query);                                      
                                echo "Pomyślnie usunięto z bazy!";
                                
			}
			else{			
                                
				exit(1);
			}
	}   
}
	

?>