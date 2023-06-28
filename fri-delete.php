<?php

$friends = [];
$dataFileName = "friend-data.json";

if (file_exists($dataFileName) && filesize($dataFileName)){
    $friends = json_decode(file_get_contents($dataFileName),true);
};

array_splice($friends,$_GET["index"],1);

file_put_contents($dataFileName, json_encode($friends));

header("Location:friend-card.php");