<?php
class bulk{
    private $x_username, $x_apikey;

    public function __construct($username, $apikey){
        $this->x_username = "$username";
        $this->x_apikey   = "$apikey";
    }
    public function sendmessage($phone, $sms){

    // id of contact to delete
    $params = array(
        "phoneNumbers"=> "$phone", // phone numbers comma separated
        "message"=>      "$sms",
        "senderId"=>     "", // leave blank if you do not have a custom sender Id
    );

    $data = json_encode($params);

    // endoint
    $sendMessageURL     = "https://api.amisend.com/v1/sms/send";

    $req                  = curl_init($sendMessageURL);

    curl_setopt($req, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($req, CURLOPT_TIMEOUT, 60);
    curl_setopt($req, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($req, CURLOPT_POSTFIELDS, $data);
    curl_setopt($req, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'x-api-user: ' .$this->x_username,
        'x-api-key: ' .$this->x_apikey
    ));

    // read api response
    $res              = curl_exec($req);

    // close curl
    curl_close($req);

    // print the raw json response
    var_dump($res);
        }
    }