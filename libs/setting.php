<?php

class PluginsForm{

	// 天气信息
	static function Weather(){
		
		$result = new Typecho_Widget_Helper_Form_Element_Text('Weather', NULL, _t('a03c706da9ec87d07b6b2d2684ac94e3'), _t('天气信息'), _t('填写申请了的高德API（默认的API也可以用）'));
		
		return $result;
	}
}