<?php
$path = '../resources/chat.txt';
$chatFile = fopen($path,"r");
$linesRead = $_GET['l'];

for($i = 0; $i < $linesRead; $i++){
    fgets($chatFile);
}

$outputXML = "";
while(!feof($chatFile)){
    $line = fgets($chatFile);
    $columnPos = strpos($line, ":");
    if($columnPos){
        if($line[0] != "%"){
            $userName = substr($line, 0, $columnPos);
            $message = substr($line, $columnPos + 1, strlen($line) - $columnPos);
            $outputXML .= '<div class="messageDiv"><div class="userNameTag">'.$userName.'</div><div class="messageTag">'.$message.'</div></div>';
        }else{
            $userName = substr($line, 1, $columnPos);
            $imageName = substr($line, $columnPos + 1, strlen($line) - $columnPos);
            $outputXML .= '<div class="messageDiv"><div class="userNameTag">'.$userName.'</div><div class="messageTag"><img width=400 src="getImage.php?id='.$imageName.'"></div></div>';
        }
    }
}
echo $outputXML;
fclose($chatFile);
