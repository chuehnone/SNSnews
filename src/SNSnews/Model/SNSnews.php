<?php
namespace SNSnews\Model;

use SNSnews\Model\FB\Facebook;

class SNSnews{
    public function showFB(){
        $facebook = new Facebook(array(
            'appId'  => '209052405827379', //344617158898614
            'secret' => '38b2a9e7c0803d7f1138d8c26c362908', //6dc8ac871858b34798bc2488200e503d
        ));

        $user_fb_id = '/zuck';
        $fb_info = array();

        // This call will always work since we are fetching public data.
        $fb_info['likes'] = $facebook->api($user_fb_id . '/likes');

        return $fb_info;
    }
}