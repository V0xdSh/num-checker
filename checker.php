<?php
error_reporting(-0);

$input = readline("File .txt : ");
$lines = file($input);



function curl_post_request($url, $data) 
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $content = curl_exec($ch);
    curl_close($ch);
    return $content;
}
 
 
while(1){



 $postData = array(
    "user-id" => "stopban",
    "api-key" => "fqMclEutze1MhbwoaT9pVY4zFmggw42XzEgmm4wesGHXRnZL",
    "number" => $lines[array_rand($lines)]
);
 

$json = curl_post_request("https://neutrinoapi.net/phone-validate", $postData); 
$result = json_decode($json, true);


if($postData["number"])
{
sleep(5);
 echo "\n";
 echo "--------------------------------";
 echo "--------------------------------";
 echo "\n";
 echo "Carrier:". ' '.$result['prefix-network']."\n";
 echo "Country Code:". ' ' .$result['international-calling-code']."\n";
 echo "Location:". ' ' .$result['location']."\n";
 echo "Country Name:". ' ' .$result['country']."\n";
 echo "Line Type:". ' ' .$result['type']."\n";
 echo "Number Phone:". ' ' .$result['international-number']."\n";
 echo "\n";
 echo "--------------------------------";
 echo "--------------------------------";
 echo "\n";
 sleep(5);
}
}
?>
