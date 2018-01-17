# coinpay
Payment QR-Code generator for multi cryptocurrencies

CoinPay is a simple PHP script for stores or freelancers accepting cryptocurrencies as a payment.

##############################

HOW IT WORKS - SERVER SIDE
In the coinpay.php file, set up the cryptocurrencies you wish to receive payments in the PHP array such as:

  ["bitcoin","BTC","1ShaDoWc1i38EY6Wc5Y6YHoQZ5tTrhX5g"],

repeat for as many cryptocurrencies you want.

Enter the currency in which you bill your customers. It can be one of these:

  AUD, BRL, CAD, CHF, CLP, CNY, CZK, DKK, EUR, GBP, HKD, HUF, IDR, ILS, INR, JPY,
  KRW, MXN, MYR, NOK, NZD, PHP, PKR, PLN, RUB, SEK, SGD, THB, TRY, TWD, USD, ZAR.
  
Enter the size in pixels of the QR-Code that the script will generate.
I suggest a value between 150 and 300 - do not append the "px" suffix.

##############################

HOW IT WORKS - CLIENT SIDE
Input a payable amount in the first box and select a cryptocyrrency among those listed.
Click Submit.

The page will pull request the current ratio from CoinMarketCap.com and do the math.
The Google charts QR API will then generate the code for you.

##############################

WHAT THE SCRIPT DOES NOT DO
I made this script because I needed some easy way for my customers to pay me in Crypto.
Obviously, the script does NOT handle any payment nor it check for any transactions.
It will be entirely up to you to check payments and transactions through the various block explorers.

Also, please note that the Google Charts API for generating QR Codes was deprecated, but still working.
Although I'm fine with that, you may not be, so please consider checking from time to time if the script works well (read: converting your wallet address to the correct QR Code.)

##############################

YOU ARE FREE TO EDIT AND REDISTRIBUTE THIS CODE AS LONG AS YOU KEEP MY NAME AND REPOSITORY IN IT!

!!! REMEMBER TO REMOVE THE DEFAULT WALLET ADDRESSES FROM IT !!!

Thanks.
