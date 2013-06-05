<?php
namespace SNSnews\Model;

use SNSnews\Model\FB\Facebook;

class SNSnews{
    //Facebook object
    protected $facebookObj;
    //Set logout folder
    public $logout_folder = 'logout';

    public function __construct(){
        $this->facebookObj = new Facebook(array(
            'appId'  => '209052405827379', //344617158898614
            'secret' => '38b2a9e7c0803d7f1138d8c26c362908', //6dc8ac871858b34798bc2488200e503d
        ));
    }

    /**
     * Get facebook personal info
     *
     * @return array
    **/
    public function getFbSelfLikeInfo(){
        $fb_info = array();

        if(self::getLogoutFlag()){
            self::setLogoutFlag(false);
            $fb_info['url'] = $this->facebookObj->getLoginUrl();
            $fb_info['url_name']  = 'Login';
            return $fb_info;
        }

        $fb_info['user'] = $this->facebookObj->getUser();

        if ($fb_info['user']) {
            try {
                // Proceed knowing you have a logged in user who's authenticated.
                $fb_info['user_likes'] = $this->facebookObj->api('/me/likes');
            } catch (FacebookApiException $e) {
                error_log($e);
                $fb_info['user'] = null;
            }
        }

        // Login or logout url will be needed depending on current user state.
        if ($fb_info['user']) {
            //logout fb will turn back this uri
            $_SERVER['REQUEST_URI'] .= $this->logout_folder;
            $fb_info['url'] = $this->facebookObj->getLogoutUrl();
            $fb_info['url_name']  = 'Logout';
        } else {
            $fb_info['url'] = $this->facebookObj->getLoginUrl();
            $fb_info['url_name']  = 'Login';
        }

        // This call will always work since we are fetching public data.
        //$fb_info['naitik'] = $facebook->api('/zurk');

        //This check user logout flag, if flag is true, clear fb info.
        return $fb_info;
    }

    /**
     * Set logout flag in session
    **/
    public static function setLogoutFlag($flag){
        if (!session_id())  session_start();
        $_SESSION['snsnews_logout'] = $flag;
    }

    /**
     * Get logout flag from session
    **/
    public static function getLogoutFlag(){
        if (!session_id())  session_start();
        if(isset($_SESSION['snsnews_logout']))
            return $_SESSION['snsnews_logout'];
        return false;
    }
}