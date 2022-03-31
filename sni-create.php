<?php
require_once ('env.php');
$data = array(
  "user_key" => $config['API_USER'],
  "user_secret" => $config['API_PASS'],
  "zone_id" => $config['ZONE_ID'],
  "public_key" => base64_decode($config['PUBLIC_KEY']),
  "private_key" => base64_decode($config['PRIV_KEY'])
);
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.medianova.com/v1/zone/sni/add",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => false,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($data),
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
