<?php
require 'grpc.php';
require 'pdo.php';
error_init();

$name = $_GET["name"];
if(empty($name)) {
    die("error param");
}

$welcome = (new Grpc())->getWelcome($name);
$message = (new Db())->getUser($name);
echo $welcome."<br>".$message;


function error_init() {
    register_shutdown_function( "fatal_handler" );
    set_error_handler("error_handler");

    define('E_FATAL',  E_ERROR | E_USER_ERROR |  E_CORE_ERROR |
        E_COMPILE_ERROR | E_RECOVERABLE_ERROR| E_PARSE );

    ini_set("display_errors","On");
    error_reporting(E_ALL);
}

function fatal_handler() {
    $error = error_get_last();
    if($error && ($error["type"]===($error["type"] & E_FATAL))) {
        $errno   = $error["type"];
        $errfile = $error["file"];
        $errline = $error["line"];
        $errstr  = $error["message"];
        error_handler($errno,$errstr,$errfile,$errline);
    }
}

function error_handler($errno,$errstr,$errfile,$errline){
    echo json_encode(
        [
             "errno" => $errno,
             "errstr" => $errstr,
             "errfile"=> $errfile,
             "errline" => $errline,
        ]
    );
}
die;

