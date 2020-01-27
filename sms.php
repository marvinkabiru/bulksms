<?php
require_once "inc.php";

$x_username = "marvocodenerd";
$x_apikey   = "ami_t5suyEF2lhMkBVYW8ju64WHsX8zIlpJZgeFe2C3aEDY6B";

$mybulk = new bulk($x_username, $x_apikey);

    $phone = "+254702056230";
    $sms   = "jackie.. yooooooooooooooh";
$mybulk->sendmessage($phone, $sms);


