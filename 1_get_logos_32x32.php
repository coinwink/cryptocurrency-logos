<?php

// Get data for all coins from Coinmarketcap API
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, "https://files.coinmarketcap.com/generated/search/quick_search.json"); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
$output = curl_exec($ch); 
curl_close($ch);

// Replace quotes that might break the json decode
$output = str_replace("'", "", $output);

// Decode json data to use as a php array
$outputdecoded = json_decode($output, true);


foreach ($outputdecoded as $coin) {

    // Get CMC ID
    $cmcid = $coin["id"];

    // Get public ID
    $pubid = $coin["slug"];

    echo($cmcid);
    echo($pubid);

    // Using the CMC ID build the link for logo
    $file_url = "https://files.coinmarketcap.com/static/img/coins/32x32/" . $cmcid . ".png";

    // Get file logo, rename it and save
    $image = file_get_contents($file_url);
    $img_path = "coins/32x32/" . $pubid . ".png";
    file_put_contents($img_path, $image);
}

?>