<?php
     // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Client.php';

  // Instantiate DB & connect
 $database = new Database();
 $db = $database->connect();
 // Instantiate blog post object
 $client = new Client($db);

 //Get id
 $client->clientID = isset($_GET['id']) ? $_GET['id'] : die();

 //Get client
 $client->read_single();

 //Client array
 $client_arr = array (
        'clientid' => $client->clientID,
        'firstName' => $client->client_fistName,
        'lastName' => $client->client_lastName,
        'company' => $client->client_company,
        'email' => $client->client_email,
        'phonenumber' => $client->client_phoneNumber,
        'age' => $client->client_age 
 );

//Make JSON 
print_r(json_encode($client_arr));
