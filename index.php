<?php

require_once __DIR__ . '/vendor/autoload.php'; 

$fb = new \Facebook\Facebook([
  'app_id' => $id,
  'app_secret' => $secret,
  'default_graph_version' => 'v2.10',
]);

$linkData = [
 'link' => 'www.fflch.usp.br',
 'message' => 'FFLCH teste '
];
$pageAccessToken = $access_token;

try {
 $response = $fb->post('/me/feed', $linkData, $pageAccessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
 echo 'Graph returned an error: '.$e->getMessage();
 exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
 echo 'Facebook SDK returned an error: '.$e->getMessage();
 exit;
}
$graphNode = $response->getGraphNode();

print_r($graphNode);
