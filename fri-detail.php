<?php

$friends = [];
$dataFileName = "friend-data.json";

if (file_exists($dataFileName) && filesize($dataFileName)){
    $friends = json_decode(file_get_contents($dataFileName),true);
};

print_r($friends[$_GET["index"]]);

?>
