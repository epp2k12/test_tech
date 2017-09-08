<?php

require 'tmhOAuth.php'; // Get it from: https://github.com/themattharris/tmhOAuth
error_reporting(E_ERROR | E_PARSE);

// Use the data from http://dev.twitter.com/apps to fill out this info
// notice the slight name difference in the last two items)

$connection = new tmhOAuth(array(
    'consumer_key' => 'EuVoqhfdGVh3oV8Oj3GulIfiS',
	'consumer_secret' => 'V5Bbg5cf8WshqdGiqdpcWK95ThsJjsIh5xwtbpdjYMYV1hOiub',
	'user_token' => '73553957-seFOKDwoF0zJjucZaywdKT4VJN9ttL3wSFT9Q9JUy', //access token
	'user_secret' => 'jArU5Ip2MbZwnoFbCQOoTVDyVfaa9FgW41fRhwqWLWAjo' //access token secret
));

// set up parameters to pass
$parameters = array('count'=>'2','screen_name'=>'epp2k4','twitter_path'=>'https://api.twitter.com/1.1/statuses/user_timeline.json');

if ($_GET['count']) {
	$parameters['count'] = strip_tags($_GET['count']);
}

if ($_GET['screen_name']) {
	$parameters['screen_name'] = strip_tags($_GET['screen_name']);
}

if ($_GET['twitter_path']) { $twitter_path = $_GET['twitter_path']; }  else {
	$twitter_path = '1.1/statuses/user_timeline.json';
}

$http_code = $connection->request('GET', $connection->url($twitter_path), $parameters );

if ($http_code === 200) { // if everything's good
	$response = strip_tags($connection->response['response']);

	if ($_GET['callback']) { // if we ask for a jsonp callback function
		echo $_GET['callback'],'(', $response,');';
	} else {
		echo $response;
	}
} else {
	echo "Error ID: ",$http_code, "<br>\n";
	echo "Error: ",$connection->response['error'], "<br>\n";
}
// You may have to download and copy http://curl.haxx.se/ca/cacert.pem