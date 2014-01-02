<?php
// Example of how to use the GeoIp2 library

// Include autoloader
require 'vendor/autoload.php';

// Grab the library namespace
use GeoIp2\Database\Reader;

try {
  $ip = '74.125.225.133' // Google.com

  // Load the geo database  
  $reader = new Reader('./GeoLite2-City.mmdb');

  // search for IP
  $location = $reader->city($ip);
  
  // All done, here's the location object!
  print_r($location);

  } else {
    echo '{"message": "Bad IPv4 address given"}';
  }
}
catch (Exception $e) {
    echo $e->getMessage();
}
