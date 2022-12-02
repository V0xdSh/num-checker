<?php
error_reporting(-0);

$input = readline("File .txt : ");
$lines = file($input);

if(file_exists($input)){
echo "Good!". "\n";
}

else{
echo "Bad!!!". "\n";
exit;
}


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

//$arr = array( "a"=>"+330761755621", "b"=>"+330617288484", "c"=>"+330679477835", "d"=>"+330677987689", "e"=>"+330784930729", "j"=>"+330780798781", "h"=>"+330756982044", "w"=> "+330688997653");
 
//$arr = array( "+330761755621", "+330617288484", "+330617288484", "+330679477835", "+330677987689", "+330784930729", "+330780798781", "+330756982044", "+330688997653", "+330630354470", "+330630483375", "+330630277870", "+330630318322", "+330630347332", "+330630857682", "+330630701287", "+330630786006");
 
 
 
// Use array_rand function to returns random key
//$key = array_rand($arr);

//$test = $arr[$key];



//$phptest = file_get_contents("list.txt");



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