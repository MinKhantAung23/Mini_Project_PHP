<?php 

$friends = [];
$dataFileName = "friend-data.json";

 if(file_exists($dataFileName) && filesize($dataFileName)){
    $friends = json_decode(file_get_contents($dataFileName),true);
 }

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if($_FILES["fri_photo"]["error"] === 0 ){
        $dir = "fri-zone";
        $newName = $dir."/".uniqid()."-".".".
            pathinfo($_FILES["fri_photo"]["name"])["extension"];

        move_uploaded_file($_FILES["fri_photo"]["tmp_name"],$newName);

        $info = $_POST;
        $info["photo"] = $newName;

        array_push($friends,$info);

        $fdata = fopen($dataFileName,"w");

        fwrite($fdata, json_encode($friends));

        fclose($fdata);

        // $friData = fopen("friData.json","a");
        // $info = $_POST;
        // $info["photo"] = $newName;

        // $friInfo = json_encode($info);
        // fwrite($friData,$friInfo);
        // echo "$friInfo";

        // fclose($friData);
        header("Location:friend-card.php");
    }
   

    
    // $nameArr = explode(".",$_FILES["fri_photo"]["name"]);
    // print_r(end($nameArr));
}