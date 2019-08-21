<?php
define( 'API_ACCESS_KEY', 'AAAAKz-GYXk:APA91bH_-IVpODC8-I2d7_cJSQmr6j1jYeJOuAanwlwx9XOQpksUOgxAa9ujnML7nIvB_sUpBX28mhJ-pGt2CEu6S0ZeYQC9qJS8_fOVEVgF2gbjXXMDtkF5ex2KP5lNL573Ob1DNiv2' );
define( 'FIREBASE_SEND_URL', 'https://fcm.googleapis.com/fcm/send' );
class FirebaseNotificationClass {
	function __construct() {

	}
    /**
     * Sending Push Notification
     */
    public function send_notification($registratoin_ids, $message) {
    	$msg = array
    	(
    		'title'		=> 'Firebase Notification',
    		'message'	=> $message,
    		'type'		=> 'message'
    	);
    	$fields = array
    	(
    		'registration_ids' 	=> array($registratoin_ids) ,
    		'data'			=> $msg
    	);

    	$headers = array
    	(
    		'Authorization: key=' . API_ACCESS_KEY,
    		'Content-Type: application/json'
    	);
    	$ch = curl_init();
    	curl_setopt( $ch,CURLOPT_URL, FIREBASE_SEND_URL );
    	curl_setopt( $ch,CURLOPT_POST, true );
    	curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
    	curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
    	curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
    	curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
    	$result = curl_exec($ch );
    	curl_close( $ch );
    }
}
?>