<?php

  //process client request (via URL)

  header("Content-Type:application/json");
  include 'functions.php';

  // if not empty
  if(!empty($_GET['name'])) {
    //
    $name=$_GET['name'];
    $price=get_price($name);

    //if empty
    if(empty($price))
        // book not found
        delivery_response(200,"book not found",NULL);
     else
       //return book price
       delivery_response(200,"book found",$price);

  }
  else
  {
    // throw invaid request
    delivery_response(400,"Invalid Request",NULL);
  }

  function delivery_response($status,$status_message,$data)
  {
      header("HTTP/1.1 $status $status_message");

      $response['status']=$status;
      $response['status_message']=$status_message;
      $response['data']=$data;
      $response['sofware_engineer']="Matt Googins";

      $json_response=json_encode($response);

      echo $json_response;
  }

?>
