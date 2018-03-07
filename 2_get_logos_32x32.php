<?php

// Get data for all coins from Coinmarketcap API
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, "https://api.coinmarketcap.com/v1/ticker/?limit=0"); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
$output = curl_exec($ch); 
curl_close($ch);

// Replace quotes that might break the json decode
$output = str_replace("'", "", $output);

// Decode json data to use as a php array
$outputdecoded = json_decode($output, true);

// Build CMC links for each coin
foreach ($outputdecoded as $coin) {
    $links[]="https://coinmarketcap.com/currencies/".$coin["id"];
}

// Function to get internal CMC coin ID
function getBetween($html,$start,$end){
    $r = explode($start, $html);
    if (isset($r[1])){
        $r = explode($end, $r[1]);
        return $r[0];
    }
    return '';
}


foreach ($links as $link) {

    // Get ID from the link
    $id = substr($link, strrpos($link, '/') + 1);
    
    // Get html data for the particular coin
    $html = file_get_contents($link);
    
    // Parse through html to find coin's internal CMC ID
    $start = 'coins/32x32/';
    $end = '.png';
    $cmcid = getBetween($html,$start,$end);

    // Using the internal ID build the link for logo
    $file_url = "https://files.coinmarketcap.com/static/img/coins/32x32/" . $cmcid . ".png";

    // Get file logo, rename it and save
    $image = file_get_contents($file_url);
    $img_path = "coins/32x32/" . $id . ".png";
    file_put_contents($img_path, $image);

}

?>