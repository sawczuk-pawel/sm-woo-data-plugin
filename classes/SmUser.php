<?php


namespace Sm;
defined( 'ABSPATH' ) || exit;

class SmUser{

    /**
     * SmUser constructor.
     */
    public function __construct(){
        add_action('init', array($this, 'setUserId'));
    }

    /**
     * @return mixed
     */
    public static function getUserId()
    {
        return self::$user_id;
    }

    /**
     * @param mixed $user_id
     */
    public static function setUserId(): void
    {
        self::$user_id = get_current_user_id();
    }
    public static $user_id;



}