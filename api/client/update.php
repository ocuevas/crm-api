<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Client.php';

  // Instantiate DB & connect
 $database = new Database();
 $db = $database->connect();

 // Instantiate blog post object
 $client = new Client($db);

 // Get raw posted data
 $data = json_decode(file_get_contents("php://input"));
 $client->clientID = $data->clientid;

 $client->client_fistName = $data->firstName;
 $client->client_lastName = $data->lastName;
 $client->client_company = $data->company;
 $client->client_email = $data->email;
 $client->client_phoneNumber = $data->phoneNumber;
 $client->client_age = $data->age;
 

 // Update post
 if($client->update()) {
    echo json_encode(
      array('message' => 'Client Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Client++- Not Updated')
    );
  }