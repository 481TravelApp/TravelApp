<?php
// pass in for keys and secret
return [
       'provider' => env('OPENID_PROVIDER'),
       'secret' => env('OPENID_SECRET'),
       'clientid' => env('OPENID_CLIENTID')
];
