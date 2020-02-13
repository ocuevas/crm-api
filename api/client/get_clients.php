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

  // Blog post query
  $result = $client->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any posts
  if($num > 1) {
    // Post array
    $client_arr = array();
    // $posts_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $client_item = array(
        'clientid' => (int)$ClientID,
        'firstName' => $Client_FirstName,
        'lastName' => $Client_LastName,
        'company' => $Company,
        'email' => $Client_Email,
        'phoneNumber' => $PhoneNumber,
        'age' => $Client_Age
      );

      // Push to "data"
      array_push($client_arr, $client_item);
      // array_push($posts_arr['data'], $post_item);
    }

    // Turn to JSON & output
    echo json_encode($client_arr);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Posts Found')
    );
  }