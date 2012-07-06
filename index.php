<?php
/**
 * @copyright 2012 Insecure Lab.
 * @company Insecure Lab
 * @author Prabhakar Ram <onlineprabhakar@gmail.com>,<admin@insecurelab.com>
 * @Website http://www.insecurelab.com 
 * 
 */
 
require_once "lib/facebook.php";



//Example 1

$fb = new Facebook();

$config = array(
    'instance' => array(
                    'appId'=>'319587084799135',
                    'secret'=>'96f52058655e3c8fb8e2c6e9c3b635b7',
                    'cookie' => true
                    ),
    'login' => array(
                'fbconnect' => 0,
	            'canvas' => 1,
                'scope'=>'read_stream,email,publish_stream',
                'redirect_uri'=>'http://apps.facebook.com//',
                'cancel_url'  =>'http://apps.facebook.com//',
                ),
    'logout' => array(),
);


$user_id = $fb->login($config);

$user_profile = $fb->getFBProfile();


echo '<pre>';
print_r($user_profile);

?>