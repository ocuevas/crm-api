<?php 
 // Headers
 header('Access-Control-Allow-Origin: *');
 header('Content-Type: application/json');
 header('Access-Control-Allow-Methods: POST');
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

 $client->client_fistName = $data->client_fistName;
 $client->client_lastName = $data->client_lastName;
 $client->client_email = $data->client_email;
 $client->client_company = $data->client_company;
 $client->client_age = $data->client_age;
 $client->user_id = $data->user_id;
 $client->client_phoneNumber = $data->phoneNumber;

 if($client->create()) {
    echo json_encode(
        array('message' => 'Client Created')
      );
 }else {
    echo json_encode(
        array('message' => 'Client Not Created')
      );
 }


