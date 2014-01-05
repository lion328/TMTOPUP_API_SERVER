<?php
// Filename: tmtopup_simulate_cp.php
// Part of lion328's TMTOPUP API server simulator.
// Copyright (C) 2014 lion328. Any rights allowed except change product name.

$_TMTOPUP_DEBUG = 1;
require_once 'tmtopup_simulate.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<h1>lion328's TMTOPUP server simulator</h1>
<?php
if($_POST){
	$target = $_POST['target'];
	$key = $_POST['apikey'];
	unset($_POST['target']);
	unset($_POST['apikey']);
	$_POST['Ref1'] = base64_encode($_POST['Ref1']);
	$_POST['Ref2'] = base64_encode($_POST['Ref2']);
	$_POST['Ref3'] = base64_encode($_POST['Ref3']);
	
	echo "<p>RECEIVED: ";
	echo file_get_contents($target.'?request='.TMTOPUP_SERVER_ENCODE_DATA($_POST,$key));
	echo "<p>";
}
?>
<form method="post">
Target: <input type="text" name="target"><br>
Transaction ID: <input type="text" name="TXID" value="<?php echo substr(strtoupper(md5(time())),0,5); ?>"><br>
Ref1: <input type="text" name="Ref1"><br>
Ref2: <input type="text" name="Ref2"><br>
Ref3: <input type="text" name="Ref3"><br>
Truemoney password: <input type="text" name="cardcard_password" value="<?php echo rand(10000,32767).rand(10000,32767).rand(1000,9999); ?>"><br>
Truemoney amount: <input type="text" name="cardcard_amount"><br>
Client IP: <input type="text" name="client_ip" value="127.0.0.1"><br>
TMTOPUP API key: <input type="text" name="apikey"><br>
<input type="submit" value="Send">
</form>
</body>
</html>