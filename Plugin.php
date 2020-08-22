<?php
if (!defined('__TYPECHO_ROOT_DIR__')) {
    exit;
}

include 'libs/setting.php';
include 'libs/header.php';
include 'libs/catch.php';
include 'libs/ico.php';

/**
 * 高德天气API
 *
 * @package Wiather
 * @author Wibus
 * @version 1.0
 * @link https://blog.iucky.cn
 */
class Wiather_Plugin implements Typecho_Plugin_Interface{
	
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     *
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate(){
        
        Typecho_Plugin::factory('Widget_Archive')->header = array(__CLASS__, 'header');
        Typecho_Plugin::factory('Widget_Archive')->footer = array(__CLASS__, 'footer');
    }

    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     *
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate(){
    
    }

    /**
     * 获取插件配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form){

        
        // 天气信息
        $form->addInput(PluginsForm::Weather());
        
        
    }
    
    /**
     * 个人用户的配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}
    

    /**
     *为header添加css文件
     * @return void
     */
    public static function footer(){
        
        // 天气信息
		PluginsHead::Weather();
    }
    
    
}
