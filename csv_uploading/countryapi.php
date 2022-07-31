<?php
// API CALL ENDPOINT
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost/api.php/countries/list?limit=20',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'api_token: rOjItvltJcRD8RuMVaz1RmMoc9OlW1AgeihXXUbztaVrsMc881dJGhNfGJbU'
  ),
));

$response = curl_exec($curl);

curl_close($curl);

// Convert JSON string to Array
$countryArray = json_decode($response, true);
// print_r($someArray);        // Dump all data of the Array
// echo $someArray; // Access Array data

?>