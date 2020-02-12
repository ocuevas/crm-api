<?php 
    class User 
    {
    // DB Stuff
    private $conn;
    private $table = 'user';

    // Properties
    public $firstName;
    public $lastName;
    public $email;
    public $password;

    //Constructor with DB
    public function __construct($db){
        $this->conn = $db;
    }

    //Register user 
    public function register() {
        //Create Query 
        $query = "INSERT INTO " . $this->table . "
                SET First_Name = :firstname,
                    Last_Name = :lastname,
                    Password = :password,
                    Email = :email";
        // Prepare Statement
        $stmt = $this->conn->prepare($query);            
        //Clean data
        $this->firstName = htmlspecialchars(strip_tags($this->firstName));
        $this->lastName = htmlspecialchars(strip_tags($this->lastName));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
        //Bind data 
        $stmt->bindParam(':firstname', $this->firstName);
        $stmt->bindParam(':lastname', $this->lastName);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $password_hash);
        //Execute query 
        if($stmt->execute()) {
            return true;
        }
        // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }
    

    }
    