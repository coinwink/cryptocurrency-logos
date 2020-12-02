<?php

set_time_limit(3600);

$i = 1;
// $i = 7700;

$files = scandir('coins/32x32/', SCANDIR_SORT_DESCENDING);
if (sizeof($files) > 2) {
    foreach ($files as $file) {
        if ((int)$file > $i) {
            $i = (int)$file;
        }
    }
    $i = $i - 10;
}

$errors = 0;
while ($i < 9000) {

    // Using the CMC ID build the link for logo
    $file_url = "https://s2.coinmarketcap.com/static/img/coins/32x32/" . $i . ".png";

    // Get file logo, rename it and save
    $image = file_get_contents($file_url);

    // Save logo
    $img_path = "coins/32x32/" . $i . ".png";
    file_put_contents($img_path, $image);

    // Check saved logo size
    $file = 'coins/32x32/' . $i . '.png';
    if (filesize($file) == 0) {
        $image = file('coins/dummy/coin_32x32.png');
        file_put_contents($file, $image);
        $errors++;
    }
    else {
        $errors = 0;
    }
    
    if ($errors == 10) {
        $i = 10000;
    }
    else {
        $i++;   
    }
    
}


?>