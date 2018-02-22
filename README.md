# Cryptocurrency logos from Coinmarketcap.com

Coinmarketcap.com (cmc) states that it is allowed to use any kind of content from their website: https://coinmarketcap.com/faq/

After the latest change, now it is particularly difficult to get coin logos from cmc.

Before all logos were named according to coin IDs. Now they are named according to the internal cmc IDs.

You can use the PHP scripts provided here to automatically download all logos from cmc (16 and 32 pixel sizes).<br>
Or just download png files directly from this repository (Latest update: 2018 Feb 22).

How does it work?
1. First get data for all coins from Coinmarketcap API to get public ID for each coin
2. Using the public ID, build cmc url links for each coin
3. Get html data from these links for each coin
4. Parse through html to find cmc coin ID
5. Download all logos using cmc ID and rename them using the public coin ID
<br>
This solution was originally built for https://coinwink.com
