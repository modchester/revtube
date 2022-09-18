<?php

$webhookurl = "https://discord.com/api/webhooks/1020876390301700159/zPC-pJlefZ974cClid_IzzdpkbLL3dUxigsJSIZQGSMoHm2JUDfnmsaDyjgF24X0nkeW";

$msg = "**ipod** just uploaded **doin your mom 4k remaster**";
$json_data = array ('content'=>"$msg");
$make_json = json_encode($json_data);
$ch = curl_init( $webhookurl );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $make_json);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec( $ch );
?>