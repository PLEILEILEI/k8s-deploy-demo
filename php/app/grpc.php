<?php
require 'vendor/autoload.php';
require 'Helloworld/GreeterClient.php';
require 'helloworld.pb.php';
class Grpc {
    function getWelcome($name) {
        $client = new \Helloworld\GreeterClient('grpc-server:80', [
            'credentials' => Grpc\ChannelCredentials::createInsecure(),
        ]);

        $req = new \Helloworld\HelloRequest();
        $req->setName($name);

        $resp = $client->SayHello($req);
        list($resp, $status) = $client->SayHello($req)->wait();
        return $resp->getMessage();
    }
}

