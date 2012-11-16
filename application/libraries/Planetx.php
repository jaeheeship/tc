<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Planetx {
    
    function __construct($config=array()){
        $api_key = $config['api_key'] ;
		$secret_key = $config['secret_key'] ;
		$callback_url = $config['callback_url'] ;
		$provider = $config['provider'] ;
		$signature_method = $config['signature_method'] ;

		include_once('oauth/Consumer.php') ;
		include_once('oauth/provider/Provider_Factory.php') ;

		$oauth_config = array(
				'signature_method'=>$signature_method ,
				'oauth_version' => $config['oauth_version']
		);

		$this->consumer = new Consumer($config,$oauth_config) ;
		$this->provider = Provider_Factory::factory($provider,$oauth_config);
    }
}
