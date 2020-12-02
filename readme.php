<?php

// Build images array for the README.md

$i = 1;
$string = "";
while ($i < 7849) {
    $string .= "![".$i."](coins/16x16/".$i.".png) ";
    $i++;
}

echo($string);



// // Get data for all coins from Coinmarketcap API
// $ch = curl_init(); 
// curl_setopt($ch, CURLOPT_URL, "https://files.coinmarketcap.com/generated/search/quick_search.json"); 
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
// $output = curl_exec($ch); 
// curl_close($ch);

// // Replace quotes that might break the json decode
// $output = str_replace("'", "", $output);

// // Decode json data to use as a php array
// $outputdecoded = json_decode($output, true);

// // Build CMC links for each coin
// foreach ($outputdecoded as $coin) {
//     $string .= "![". $coin["slug"] ."](https://raw.githubusercontent.com/dziungles/cryptocurrency-logos/master/coins/16x16/" . $coin["slug"] . ".png) ";
// }

// echo($string);

?>