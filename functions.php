<?php

function request($brand){

		$curl = curl_init();
		// Set the api url
		curl_setopt ( $curl, CURLOPT_URL, "https://fonoapi.freshpixl.com/v1/getdevice?token=069eb19a610dee7b267b48b543d926c275239a5f76a4576f&device=".$brand );
		// use this option to save the returned data in the $phones variable instead of printing it to the screen
		curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, TRUE);
		// save response to $phones
		$phones = json_decode(curl_exec($curl), true);
		curl_close($curl);

		return $phones;	
} 

function mobileTable($data){

	return '<div class="list-group">
			  <a href="#" class="list-group-item">
			    <h4 class="list-group-item-heading">Device Name</h4>
			    <p class="list-group-item-text">'.$data['DeviceName'].'</p>
			  </a>
			  <a href="#" class="list-group-item">
			    <h4 class="list-group-item-heading">Announced</h4>
			    <p class="list-group-item-text">'.$data['announced'].'</p>
			  </a>
			  <a href="#" class="list-group-item">
			    <h4 class="list-group-item-heading">Dimensions</h4>
			    <p class="list-group-item-text">'.$data['dimensions'].'</p>
			  </a>
			</div>';
}