<?php
namespace Sm;
defined( 'ABSPATH' ) || exit;

/**
 * Class SmFakeApi
 * @package Sm
 */
class SmFakeApi{

    /**
     * Generate random user IDs array
     * @param $max
     * @return mixed
     */
    protected function randomUserId($max){
        $userIdArray = array(rand(1,$max), SmUser::getUserId(), rand(1,$max+10), rand(1,$max+20));
        shuffle($userIdArray);
        return $userIdArray[0];
    }

    /**
     * Return fake data array
     * @return array[]
     */
    protected function getDataApi(){
        return array(
            0 => array(
                'user_id' => self::randomUserId(50),
                'data' => array(
                    "between", "situation", "it", "flew", "sum", "last", "her", "smooth", "positive", "grown", rand(1,100), rand(1,100)
                )
            ),
            1 => array(
                'user_id' => self::randomUserId(30),
                'data' => array(
                    rand(1,100), rand(1,100), "Detail", "shaking", "slight", "weigh", "pool", "dry", "terrible", "joined", "official", "front"
                )
            ),
            2=> array(
                'user_id' => self::randomUserId(40),
                'data' => array(
                    rand(1,100), rand(1,100), "Fire", "sleep", "worth", "prove", "column", "enough", "early", "bear", "other", "position"
                )
            ),
            3 => array(
                'user_id' => self::randomUserId(20),
                'data' => array(
                    rand(1,100), rand(1,100), "Yet", "period", "cheese", "copper", "run", "theory", "spring", "worker", "paid", "drop"
                )
            ),
            4 => array(
                'user_id' => self::randomUserId(60),
                'data' => array(
                    rand(1,100), rand(1,100), "Ship", "took", "forest", "ground", "property", "flat", "circle", "strong", "husband", "useful",
                )
            ),
        );
    }

    /**
     * Function generate random data fake API response and add them to transient
     * @return array[]
     */
    public static function getData(){
        $cache_name = 'sm_woo_user_data';
        if(get_transient($cache_name)){
            $output = get_transient($cache_name);
        }
        else{
            $tmpData = SmFakeApi::getDataApi();
            delete_transient($cache_name);
            set_transient($cache_name, $tmpData, 900);
            $output = $tmpData;
        }
        return $output;
    }

    /**
     * Return data for selected user ID
     * @param $userId
     * @return array|false|mixed
     */
    public function getDataByUserId($userId){
        $data = self::getData();
        $tmpArray = [];
        if(is_array($data)){
            foreach ($data as $item){
                if($item['user_id'] == $userId){
                    $tmpArray = $item['data'];
                }
            }
            $output = $tmpArray;
            if(!$tmpArray){
                $output = false;
            }
        }
        else{
            $output = false;
        }

        return $output;
    }
}