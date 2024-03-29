<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ; 
class Tcloud extends MX_Controller {
	var $app_key ;
	var $secret_key ;
	var $app_id ;
	function __construct(){
		parent::__construct() ;

		$this->config->load('planetx',FALSE,TRUE)  ;

		$this->api_key = $this->config->item('api_key') ;
		$this->secret_key = $this->config->item('secret_key')  ;
		$this->app_id =  $this->config->item('app_id')  ;

		$this->load->library('oauth',array(
				'api_key'=>$this->api_key,
				'secret_key'=>$this->secret_key,
				'app_id' => $this->app_id,
				'callback_url'=>base_url().'admin/tcloud/callback2',
				'provider'=>'Tcloud',
				'oauth_version'=>'2.0'
		)) ;	
	}

	public function index(){

		$param = array() ;
		$param['response_type'] = 'code' ;
		$param['scope'] = 'tcloud' ;
		$param['redirect_uri'] = base_url().'admin/tcloud/callback' ;
		$param['client_id'] = $this->app_id ;

		$this->oauth->authorize($param) ;

	}

	function _make_param($param){
		$arr = array() ;
		foreach($param as $key => $val){
			$arr[] = $key.'='.$val ;
		}

	}

	function callback(){
		$param = array() ;
		$param['client_id'] = $this->app_id ;
		$param['client_secret'] = $this->secret_key ;
		$param['code'] = $this->input->get_post('code') ;
		$param['scope'] = 'tcloud' ;
		$param['redirect_uri'] = base_url().'admin/tcloud/callback' ;
		$param['grant_type'] = 'authorization_code';

		$t= $this->oauth->access_token($param) ;

		$data = array('access_token'=>$t->access_token  ,
				'token_type'=>$t->token_type ,
				'refresh_token'=>$t->refresh_token ,
				'scope'=>$t->scope ,
				'expires_in'=>$t->expires_in );

		$this->session->set_userdata($data)  ;

	}

	function getImageList() {
		$data = array('access_Token'=>$this->session->userdata('access_token')  ,
				'token_type'=>$this->session->userdata('token_type') ,
				'refresh_token'=>$this->session->userdata('refresh_token') ,
				'scope'=>$this->session->userdata('scope') ,
				'expires_in'=>$this->session->userdata('expires_in') ,
				'appKey'=> $this->api_key );
		
// 		$request_header['access_token'] = $this->session->userdata('access_token');
		$request_body = array('version'=>1,'searchtype'=>'','count'=>'','page'=>'','searchkeyword'=>'') ;
		$response = $this->oauth->api_call('getImageList',$data,$request_body,NULL) ;
		echo $response;
	}
}
