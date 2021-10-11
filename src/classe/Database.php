<?php
namespace App\classe ;

class Database{
    private $servername;
    private $username ;
    private $password ;
    private $dbname ;
    private $db ;

    /**
     * @param string $_servername ex:(localhost)
     * @param string $_username ex:(Root)
     * @param string $_password ex:(password)
     * @param string $_dbname  le nom de la base de donne  
     */
    public function __construct($_servername,$_username,$_password,$_dbname)
    {
        $this->servername= $_servername ;
        $this->username = $_username;
        $this->password = $_password;
        $this->dbname = $_dbname;
        try {

            $_db = new \PDO("mysql:host=$this->servername; dbname=$this->dbname", $this->username, $this->password);
    
            $_db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
           
            $this->db=$_db;
     
        } catch (\PDOException $th) {
    
            die("Error: ".$th->getMessage());
    
        }
    }

   



  


}

  
   

