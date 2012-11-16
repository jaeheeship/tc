<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Planetx { 
    function __construct($config=array()){
        $api_key = $config['api_key'] ;
		$secret_key = $config['secret_key'] ;
		$callback_url = $config['callback_url'] ;
		$provider = $config['provider'] ;
		$signature_method = $config['signature_method'] ;

		$oauth_config = array(
				'signature_method'=>$signature_method ,
				'oauth_version' => $config['oauth_version']
		); 
    }

    public function oauth(){
        $ci = &get_instance() ; 
    }

    public function authorize(){
        
    } 

    
}
