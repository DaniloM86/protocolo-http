<?php

require __DIR__.'/vendor/autoload.php';
use App\Http\Response;
$response = new Response(200,'olá mundo');
echo '<pre>';
    print_r($response->printResponse());
echo '</pre>';