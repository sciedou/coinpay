<?php

/*
	CODE AUTHOR: SCIEDOU
	REDDIT: U/SCIEDOU
	INSTAGRAM: @SCIEDOU
	MAIL: SCIEDOU@PROTONMAIL.CH
	
	HTML TEMPLATE BY: COLORLIB.COM
	
	YOU ARE FREE TO MODIFY AND REDISTRIBUTE THIS
	CODE AS LONG AS YOU KEEP MY NAME IN IT
	THANKS!
	
	---------------------------------------
	
	DONATIONS ARE WELCOME
	BITCOIN: 			1ShaDoWc1i38EY6Wc5Y6YHoQZ5tTrhX5g
	ETHEREUM:			0xf87449A181C9133803dB254BA821D52aA9f93468
	BITCOIN CASH:		167wCCusrQt17zAMb6h3FZaLuk5Jvs8MXs
	STELLAR LUMENS:		GBMFS5DJXECANEWC66SOTIBBVZDGK2TVXS223NHRKPVITSKXTLESPVEV
	RAIBLOCKS:			xrb_1c8c5wfqugeoocgkppoptyepjyeu13ata9nhy81cf6ntggjtwzjjouf1tnop
	
	---------------------------------------
	
	SETTINGS
	
	ALL NOTICES AND ERRORS OFF FOR PRODUCTION
*/
error_reporting(0);



/*
	YOU CAN ADD AS MANY COINS AS YOU WANT
	PLEASE RESPECT THE ARRAY FORMAT:
	
	["name","code","address for payment"],
	
	NOTE THAT NAME AND CODE MUST BE LIKE
	"id" and "symbol"
	AS STATED IN THE COINMARKETCAP API
	https://coinmarketcap.com/api/
	
	DON'T FORGET TO REMOVE THE DEFAULT ADDRESSES!
*/
$coins = [
    ["bitcoin",			"BTC",		"1ShaDoWc1i38EY6Wc5Y6YHoQZ5tTrhX5g"],
    ["ethereum",		"ETH",		"0xf87449A181C9133803dB254BA821D52aA9f93468"],
	["ripple",			"XRP",		""],
	["bitcoin-cash",	"BCH",		"167wCCusrQt17zAMb6h3FZaLuk5Jvs8MXs"],
	["litecoin",		"LTC",		""],
	["nem",				"XEM",		""],
	["neo",				"NEO",		"AYyzeLxZvQ5dLziMBrbPQjENaZNxiWJA9k"],
	["stellar",			"XLM",		"GBMFS5DJXECANEWC66SOTIBBVZDGK2TVXS223NHRKPVITSKXTLESPVEV"],
	["dash",			"DASH",		""],
	["monero",			"XMR",		""],
	["raiblocks",		"XRB",		"xrb_1c8c5wfqugeoocgkppoptyepjyeu13ata9nhy81cf6ntggjtwzjjouf1tnop"],
	["dogecoin",		"DOGE",		""],
	["electroneum",		"ETN",		"etnk1Mqsg2bbr9ivfnQtbZGWKEdZSntnQX5hcrDzZEqN3gaTPmdwG7x7BVGmj4REGSfrGabSuhNefa5jHy8778q15QaZcj9UZc"],
	["request-network",	"REQ",		"0x25bece8e054c87c6cc53a28a444f334f6282b9a5"],
];



/*
	THIS IS YOUR PRIMARY CURRENCY
	
	SUPPORTED CURRENCIES ARE:
	AUD, BRL, CAD, CHF, CLP, CNY, CZK, DKK, EUR, GBP, HKD, HUF, IDR, ILS, INR, JPY,
	KRW, MXN, MYR, NOK, NZD, PHP, PKR, PLN, RUB, SEK, SGD, THB, TRY, TWD, USD, ZAR.
*/
$fiat = "EUR";



/*
	SPECIFY IN PIXELS THE SIZE OF THE QR CODE
	OPTIMAL SIZE IS 200 TO 300
	DO NOT APPEND "PX" SUFFIX
*/
$QRsize = "250";






/*
	!!! END OF SETTINGS!!! 
	
	FROM HERE YOU SHOULD EDIT ONLY IF YOU KNOW WHAT YOU'RE DOING
	
*/

$pay = $_GET['pay'];
$via = $_GET['via'];

$fileName = basename($_SERVER['PHP_SELF']);


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>CoinPay</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
<form class="contact100-form validate-form" action="<?php $fileName ?>" method="get">

	<div class="container-contact100">
		<div class="wrap-contact100">
		
				<span class="contact100-form-title">
					CoinPay
				</span>
<?php

if (!$pay || !$via) {

echo '
	
	<div class="wrap-input100 validate-input" data-validate="Amount is required">
		<span class="label-input100">Payment</span>
		<input class="input100" type="text" name="pay" placeholder="Amount in '.$fiat.'">
		<span class="focus-input100"></span>
	</div>
	<div class="wrap-input100 input100-select">
		<span class="label-input100">CryptoCurrency</span>
		<div>
			<select class="selection-2" name="via">';
foreach ($coins as list($a,$b,$c)) {
	if ($a && $b && $c){
		$coinName = str_replace("-"," ",$a);
		echo "<option value='".$b."'>".ucwords($coinName)." (".$b.")</option>";
	}
}
echo '
			</select>
		</div>
		</div>

		<div class="container-contact100-form-btn">
			<div class="wrap-contact100-form-btn">
				<div class="contact100-form-bgbtn"></div>
					<button class="contact100-form-btn">
						<span>Submit <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i></span>
					</button>
				</div>
			</div>
		</div>
		
	</div>';

} else {
	
	foreach ($coins as list($a,$b,$c)) {
		if ($via == $b){
			$coinID = $a;
			$coinName = str_replace("-"," ",$a);
			$coinSym = $b;
			$coinAddr = $c;
			break;
		}
	}
	
	$split = false;
	$strl = strlen($coinAddr);
	if ($strl >= 36) {
		$split = true;
		$aParts = str_split($coinAddr, 36);
	}
	
	$json = file_get_contents('https://api.coinmarketcap.com/v1/ticker/'.$coinID.'/?convert='.$fiat);
	$data = json_decode($json,true);
	$string = 'price_'.strtolower($fiat);
	$currentPrice = $data[0][$string];
	
	$convertedPrice = number_format($pay/$currentPrice,8);
	
	echo '<div style="text-align: center">
			Please send <h4 style="font-weight: bold;">'.$convertedPrice.' '.strtoupper($coinSym).'</h4>
			to this address:<br />
			<strong>';
	if ($split == true) { 
		foreach ($aParts as $i => $str) {
            echo $aParts[$i].'<br />';
        }
		//echo $addrParts; 
	}
	else { echo $coinAddr; }
	echo '</strong>
			<br /><br />
			<img src="http://chart.apis.google.com/chart?cht=qr&chs='.$QRsize.'x'.$QRsize.'&chl='.$coinAddr.'&chld=H|0">
			<br /><br />
			<div class="container-contact101-form-btn">
			<div class="wrap-contact101-form-btn">
				<div class="contact101-form-bgbtn"></div>
					<button class="contact101-form-btn" onclick="location.href='.$fileName.';" >
						<span><i class="fa fa-long-arrow-left m-l-7" aria-hidden="true"></i> Back</span>
					</button>
				</div>
			</div>
		</div>
		</div>';
	
}
?>
</form>

	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	

</body>
</html>
