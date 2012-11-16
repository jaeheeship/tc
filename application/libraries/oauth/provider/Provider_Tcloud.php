<?php 
class Provider_Tcloud extends Provider {

	function __construct($provider,$oauth_config){
		parent::__construct($provider,$oauth_config);
	}

	function _getRequestTokenURL(){
		return $url = $this->url_prefix.'request_token' ;
	}

	function _getAccessTokenURL(){
		return 'https://oneid.skplanetx.com/oauth/token' ; 
	}


	function _getAuthorizeURL(){
		return $url = 'https://oneid.skplanetx.com/oauth/authorize' ;
	}

	function _getAPIUrl($api_name){
		if($api_name == 'getImageList'){
			$url = 'https://apis.skplanetx.com/tcloud/images' ;
		}

		return $url ;
	}

	public function api_call(& $consumer,$api_name,$request_header,$request_body,$method='GET'){
		$param = array() ;
		$url = $this->_getAPIUrl($api_name);
		get_instance()->load->helper('string');

		
		$response = OAuthUtil::new_call($url,$method,$request_header,$request_body) ;

		return $response ;
	}

	public function getRequestToken(& $consumer,$params,$method='GET'){
		$param = array() ;
		$url = $this->_getRequestTokenURL();
		get_instance()->load->helper('string');

		$param['oauth_callback'] = $consumer->get('callback_url') ;
		$param['oauth_consumer_key'] = $consumer->get('api_key') ;
		$param['oauth_nonce'] = random_string('alnum', 32);
		$param['oauth_signature_method'] = $this->getSignatureMethod() ;
		$param['oauth_timestamp'] = time();
		$param['oauth_version'] =  $this->getOAuthVersion() ;

		$base_string = OAuthUtil::base_string($method,$url,$param ) ;

		$key_arr = array($consumer->get('secret_key'),'' )  ;

		$key = OAuthUtil::urlencode($key_arr) ;
		$key = implode('&',$key) ;

		$param['oauth_signature'] = OAuthUtil::make_signature($base_string,$key) ;

		$response = OAuthUtil::call($url,$method,$param) ;

		return OAuthUtil::parse_param($response) ;
	}

	public function getAccessToken(& $consumer,$params=array(),$method='GET'){
		$param = array() ;
		$url = $this->_getAccessTokenURL();
		get_instance()->load->helper('string');

		$param['oauth_callback'] = $consumer->get('callback_url') ;
		$param['oauth_consumer_key'] = $consumer->get('api_key') ;
		$param['oauth_nonce'] = random_string('alnum', 32);
		$param['oauth_signature_method'] = $this->getSignatureMethod() ;
		$param['oauth_timestamp'] = time();
		$param['oauth_version'] =  $this->getOAuthVersion() ; 

		$response = OAuthUtil::call($url,$method,$param,$params) ;
		//$response = OAuthUtil::parse_param($response) ;
		//$response['api_token'] = $this->getAPIToken($consumer->get('api_key'),$consumer->get('secret_key')) ;

        return json_decode($response) ;

	}

	public function getAPIToken($api_key,$secret_key){
		$ts = time() ;
		$base_string = $api_key.';'.$ts ;

		$signature=base64_encode(hash_hmac('sha1', $base_string, $secret_key, TRUE));
		return OAuthUtil::urlencode(base64_encode($api_key.';'.$ts.';'.$signature));
	}

    

	public function authorize($param){
		get_instance()->load->helper('url') ;
        $str = '' ; 
        $arr = array() ; 
        foreach($param as $key => $val){
            $arr[] = $key.'='.$val  ; 
        }

        $str = implode('&',$arr) ; 

		redirect($this->_getAuthorizeUrl().'?'.$str ); 
	}
}
/* end of Provider_Ucloud.php */
