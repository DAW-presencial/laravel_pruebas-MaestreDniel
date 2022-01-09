<?php
// used to get mysql database connection
class Database{
 
    // Las credenciales de la base de datos que tengo en remoto
    private $host = "51.178.152.213";
    private $db_name = "agenda_bd_maestre_hermoso_daniel";
    private $username = "dmaestre_usr";
    private $password = "abc123.";
    public $conn;
 
    // get the database connection
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("pgsql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>

