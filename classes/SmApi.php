<?php
namespace Sm;
defined( 'ABSPATH' ) || exit;

class SmApi{

    protected $data;
    protected static $requestUrl = 'https://httpbin.org/post';

    public function sendRequest(){
        $post = json_encode($this->data);
        $ch = curl_init($this::$requestUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        $response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $status = false;
        if($status_code == 200){
            $status = true;
        }
        return $status;
    }

    public function loadData($data){
        $this->data = $data;
    }

}