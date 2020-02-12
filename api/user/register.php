<?php 
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/User.php';

 // Instantiate DB & connect
$database = new Database();
$conn = $database->connect();

// Instantiate blog post object
$user = new User($conn);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

$user->firstName = $data->first_name;
$user->lastName = $data->last_name;
$user->email = $data->email;
$user->password = $data->password;

// Register user
  if($user->register()) {
    echo json_encode(
      array('message' => 'User was successfully registered.')
    );
  } else {
    echo json_encode(
      array('message' => 'Unable to register the user.')
    );
  }
                    

?>