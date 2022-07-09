<?php
namespace Sm;
defined( 'ABSPATH' ) || exit;

/**
 * Class SmUser
 * @package Sm
 */
class SmUser{
    /**
     * @var
     */
    public static $user_id;

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



}