<?php
/**
 * @copyright 2012 Insecure Lab.
 * @company Insecure Lab
 * @author Prabhakar Ram <onlineprabhakar@gmail.com>,<admin@insecurelab.com>
 * @Website http://www.insecurelab.com 
 * 
 */

require_once "base_facebook.php";


class Facebook {

    var $fb = NULL;
    public function setInstance($config = NULL)
    {
        $this->fb = new Facebook_lib($config);
    }
    
    public function getFBAccessToken()
    {
       return $this->fb->getAccessToken();        
    }
    
    public function setFBAccessToken($access_tocken)
    {
       return $this->fb->setAccessToken($access_tocken);        
    }
    
    
    public function getFBLoginUrl($params = NULL)
    {
        return $this->fb->getLoginUrl($params);
    }
    
    
    
    public function getFBUser()
    {
       return $this->fb->getUser();        
    }
    public function getFBLogoutUrl($params = NULL)
    {
       return $this->fb->getLogoutUrl($params);        
    }
    
    
    public function login($config)
    { 
        $this->setInstance($config['instance']);
        $user_id = $this->getFBUser();
       
        if(!$user_id)
        {
            $redirect = $this->getFBLoginUrl($config['login']);
            echo("<script> top.location.href='" . $redirect . "'</script>");
            exit;
        }
        
        return $user_id;
    }
     
    
    public function getFBProfile($access_token = NULL)
    {
       try{
            if($access_token == NULL)
                $user_profile = $this->fb->api('/me','GET');
            else
                $user_profile = $this->fb->api('/me','GET',array('access_token'=>$access_token));
           
              return $user_profile;   
        }
        catch(Exception $e){
           //print_r($e);
        }
        
        return NULL;       
    }
    
    
    
    public function post($params)
    {
        try{
            return $this->fb->api($params);
           }
          catch(Exception $e){
           // echo $e;
           }      
    }
    
    
    
    
    
    public function getSourcePageId()
    {
        echo 'hh';
       /*$decodedSignedRequest = $this->parse_signed_request($_REQUEST['signed_request'],$this->config->item('fb_app_secret'));
        if(array_key_exists('page',$decodedSignedRequest))
        {
           return $decodedSignedRequest['page']['id'];
        }
        else
           return 0;*/        
    }
    
    
}
