<?php
  //process client request (via URL)
  header("Content-Type:application/json");

  //call delivery response function
  delivery_response(200,"time of day found");

  function delivery_response($status,$status_message)
  {
      header("HTTP/1.1 $status $status_message");

      $response['time']=gettimeofday();
      $response['sofware_engineer']="Matt Googins";

      $json_response=json_encode($response);

      echo $json_response;
  }
?>
