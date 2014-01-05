<?php
// Filename: tmtopup_simulate.php
// Part of lion328's TMTOPUP API server simulator.
// Copyright (C) 2014 lion328. Any rights allowed except change product name.

require_once 'AES.php';

// Check if debug mode allowed.
if(isset($_TMTOPUP_DEBUG)){
	$_SERVER['REMOTE_ADDR'] = '203.146.127.115';
	
	function TMTOPUP_SERVER_ENCODE_DATA($arr,$key){
		foreach($arr as $k => $v){
			$temp .= "{$k}=".urlencode($v)."&";
		}
		$temp = substr($temp,0,strlen($temp) - 2);
		$aes = new Crypt_AES();
		$aes->setKey($key);
		return strtr(base64_encode($aes->encrypt($temp)),'+/=','-_,');
	}
}
?>