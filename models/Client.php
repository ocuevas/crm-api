<?php 
    class Client {
        //DB Properties
        private $conn;
        private $table ='client';
        //Client Properties
        public $clientID;
        public $client_fistName;
        public $client_lastName;
        public $client_email;
        public $client_company;
        public $client_age;
        public $user_id;
        public $client_phoneNumber;
        // Constructor with DB
        public function __construct($db) {
            $this->conn = $db;
        }

      public function read() {
        // Create query
        $query = 'SELECT * FROM client';
        // Prepare statement
        $stmt = $this->conn->prepare($query);
        // Execute query
        $stmt->execute();
        return $stmt;
      }
      // Get Single Post
    public function read_single() {
      // Create query
      $query = 'SELECT * FROM client WHERE ClientID = ?';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $this->clientID);

      // Execute query
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // Set properties
      $this->clientID = $row['ClientID'];
      $this->client_fistName = $row['Client_FirstName'];
      $this->client_lastName = $row['Client_LastName'];
      $this->client_email = $row['Client_Email'];
      $this->client_company = $row['Company'];
      $this->client_age = $row['Client_Age'];
      $this->user_id = $row['UserID'];
      $this->client_phoneNumber = $row['PhoneNumber'];
}
      // Create client
    public function create() {
        // Create query
        $query = 'INSERT INTO ' . $this->table . '(Client_FirstName, Client_LastName, Client_Email, Company, Client_Age, UserID, PhoneNumber) VALUES (:first_name, :last_name, :email, :company, :clientAge, :userid, :phoneNumber )';
        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->client_fistName = htmlspecialchars(strip_tags($this->client_fistName));
        $this->client_lastName = htmlspecialchars(strip_tags($this->client_lastName));
        $this->client_email = htmlspecialchars(strip_tags($this->client_email));
        $this->client_company = htmlspecialchars(strip_tags($this->client_company));
        $this->client_age = htmlspecialchars(strip_tags($this->client_age));
        $this->client_phoneNumber = htmlspecialchars(strip_tags($this->client_phoneNumber));
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
        

        // Bind data
        $stmt->bindParam(':first_name', $this->client_fistName);
        $stmt->bindParam(':last_name', $this->client_lastName);
        $stmt->bindParam(':email',   $this->client_email);
        $stmt->bindParam(':company', $this->client_company);
        $stmt->bindParam(':clientAge', $this->client_age);
        $stmt->bindParam(':userid', $this->user_id);
        $stmt->bindParam(':phoneNumber',  $this->client_phoneNumber);
        

        // Execute query
        if($stmt->execute()) {
          return true;
          }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
  }

  // Delete Post
  public function delete() {
    // Create query
    $query = 'DELETE FROM ' . $this->table . ' WHERE ClientID = :ClientID';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->clientID = htmlspecialchars(strip_tags($this->clientID));

    // Bind data
    $stmt->bindParam(':ClientID', $this->clientID);

    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
}

 // Update client
 public function update() {
  // Create query
  $query = 'UPDATE ' . $this->table . '
                        SET Client_FirstName = :first_name, Client_LastName = :last_name, Client_Email = :email, Company = :company, Client_Age = :clientAge, PhoneNumber = :phoneNumber
                        WHERE ClientID = :id';

  // Prepare statement
  $stmt = $this->conn->prepare($query);

  // Clean data
  $this->client_fistName = htmlspecialchars(strip_tags($this->client_fistName));
  $this->client_lastName = htmlspecialchars(strip_tags($this->client_lastName));
  $this->client_email = htmlspecialchars(strip_tags($this->client_email));
  $this->client_company = htmlspecialchars(strip_tags($this->client_company));
  $this->client_age = htmlspecialchars(strip_tags($this->client_age));
  $this->client_phoneNumber = htmlspecialchars(strip_tags($this->client_phoneNumber));
  $this->user_id = htmlspecialchars(strip_tags($this->user_id));
  $this->clientID = htmlspecialchars(strip_tags($this->clientID));

  // Bind data
  $stmt->bindParam(':first_name', $this->client_fistName);
  $stmt->bindParam(':last_name', $this->client_lastName);
  $stmt->bindParam(':email',   $this->client_email);
  $stmt->bindParam(':company', $this->client_company);
  $stmt->bindParam(':clientAge', $this->client_age);
  $stmt->bindParam(':phoneNumber',  $this->client_phoneNumber);
  $stmt->bindParam(':id', $this->clientID);

  // Execute query
  if($stmt->execute()) {
    return true;
    }

  // Print error if something goes wrong
  printf("Error: %s.\n", $stmt->error);

  return false;
}

        
}