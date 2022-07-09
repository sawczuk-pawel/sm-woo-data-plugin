<?php
namespace Sm;
defined( 'ABSPATH' ) || exit;

/**
 * Class SmTemplate
 * @package Sm
 */
class SmTemplate{

    /**
     * Render widget if data exists
     * @param $data
     * @return false|string
     */
    public function renderWidget($data){
        $themeName = 'no-data-widget';
        if($data){
            $themeName = 'data-widget';
        }
        if(!SmUser::getUserId()){
            $themeName = 'no-login-widget';
        }
        ob_start();
        echo self::renderTheme($themeName, $data);
        return ob_get_clean();
    }

    /**
     * Render panel form
     * @return false|string
     */
    public function renderPanel(){
        ob_start();
        echo self::renderTheme('form');
        return ob_get_clean();
    }

    /**
     * Render template from file, we could overwrite plugin templates by coping folder 'templates' to our theme root and modify files
     * @param string $template_name
     * @param array $data
     * @return false|string
     */
    public static function renderTheme($template_name = 'data-widget', $data = array()){
        $theme_uri = '/templates/' . $template_name . '.php';
        if(file_exists(get_template_directory() . $theme_uri)){
            $theme_url = get_template_directory() . $theme_uri;
        }
        else{
            $theme_url = SM_PLUGIN_DIR . $theme_uri;
        }
        ob_start();
        include($theme_url);
        $include = ob_get_contents();
        ob_get_clean();
        ob_end_clean();
        return $include;
    }
}