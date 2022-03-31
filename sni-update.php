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
  CURLOPT_URL => "https://api.medianova.com/v1/zone/sni/update",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "PUT",
  CURLOPT_POSTFIELDS => json_encode($data),
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "Postman-Token: 1eff0b26-7f4c-4bb6-8ff9-e64f680f2c74",
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
