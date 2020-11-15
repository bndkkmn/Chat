<?php
$message = $_GET['m'];

$path = '../resources/chat.txt';
$chatFile = fopen($path,"a");
fwrite($chatFile, $message."\n");
fclose($chatFile);