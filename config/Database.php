<?php 
    class Database {
        //DB Params
        private $host = 'localhost';
        private $db_name = 'crm_db';
        private $username = 'root';
        private $password = '';
        private $conn;

        //Database Connection
        public function connect() {
            try {
        $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e) {
                echo 'Connection Error: ' . $e->getMessage();
            }
            return $this->conn;
        }
    }