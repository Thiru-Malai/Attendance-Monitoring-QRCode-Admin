<?php
require 'vendor/autoload.php';

$client = new MongoDB\Client(
    'mongodb+srv://Thirumalai:1234@lab-attendance.nv31z.mongodb.net/myFirstDatabase?retryWrites=true&w=majority'
);

$archive = $client->attendance->archive;
$session = $client->attendance->session;
$users = $client->attendance->users;

?>