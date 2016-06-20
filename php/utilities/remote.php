<?php

/* 	This script contains some functions to perform remote connections
	(i.e. by URL). */

// Connection through CURL
function connect_curl($sURL)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $sURL);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 60); //timeout in seconds
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
	
	$aReturn = array();
	$aReturn['response'] = curl_exec($ch);
	$aReturn['http_info'] = curl_getinfo($ch);
	$aReturn['correct_location'] = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
	if(strpos($aReturn['correct_location'], "missingurl="))
		$aReturn['correct_location'] = null;
	
	return $aReturn;
}

// Connection to a DOM document (XML or HTML)
function fConnectDom($sURL, $sXPATH = false, $sType = "XML")
{
	// rimuovo tutti i caratteri che danno problemi
	strip_tags(preg_replace("/&/", "",$sURL));
				
	$oDOM = new DOMDocument();
	if($sType == "HTML")
		@$oDOM->loadHTML($sURL);
	else
		@$oDOM->load($sURL);
	if(!$sXPATH)
		return $oDOM;
	$oDomXPATH = new DOMXPath($oDOM);
	$oNodeList = $oDomXPATH->query( $sXPATH );
	return $oNodeList;
}

// Run a XPATH query
function fXPATH($oDOM, $sXPATH)
{
	$oDomXPATH = new DOMXPath($oDOM);
	$oNodeList = $oDomXPATH->query( $sXPATH );
	return $oNodeList;
}
?>