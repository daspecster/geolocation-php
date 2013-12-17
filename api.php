<?php
require 'vendor/autoload.php';

use GeoIp2\Database\Reader;

/*
This product includes GeoLite2 data created by MaxMind, available from
<a href="http://www.maxmind.com">http://www.maxmind.com</a>.
*/

header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");

try {
	$reader = new Reader('./GeoLite2-City.mmdb');

	$options = array(
		'options' => array(
			'regexp' => '/(?:\d{1,3}\.){3}\d{1,3}/'
			)
		);
  $ip = filter_var($_GET['ip'], FILTER_VALIDATE_REGEXP, $options);


  if ($ip !== FALSE) {
    $location = $reader->city($ip);
    $location_json = json_encode($location->raw);

    echo $location_json;

  } else {

  	echo '{"message": "Bad IPv4 address given"}';
  }
}
catch (Exception $e) {
    echo $e->getMessage();
}