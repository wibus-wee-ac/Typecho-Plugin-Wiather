<?php	

/*
 * 作者：wibus
 * 地址：https://blog.iucky.cn
 */
 
class PluginsHead{
	
	// 天气信息
	static function Weather(){
	    
	    // 获取配置信息
		$type = Typecho_Widget::widget('Widget_Options')->plugin('Wiather')->Weather;
		
		if(!empty($type)){
		    
		    // 定位 
		    $location = ClientInfo::Location($type);
		    
		    echo '<style>
    		        div#Weather{
    		            height: 30px;
    		        }
    		        div#Weather>div {
                        display: inline-block;
                        font-size: 1.1em;
                        margin: 0 5px;
                    }
                    .w-ico>svg {
                        margin: -5px 0;
                    }
                    .w-weather {
                        background-color: #5dbfe7;
                        color: white;
                        width: 46px;
                        border-radius: 50px;
                    }
                    .w-info {
                        color: white;
                        background-color: #5dbfe7;
                        border-radius: 3px;
                    }
		        </style>';
		        
		    if($location -> status == 1){
		        
		        // 天气 
		        $weather = ClientInfo::Weather($type);
		    
    		    // 获取地理位置并截取余两位
    		    $city = mb_substr($location->city,0,2);
    		    
    		    $temperature = $weather->temperature.'°';
    		    
    		    $weatherInfo = $weather->weather;
    		    
    		    $arrIco = [
    		        'sunny'       =>    ['晴'],
    		        
    		        'cloud'       =>    ['少云','晴间多云','多云'],
    		        
    		        'cloudy'      =>    ['阴'],
    		      
    		        'gale'        =>    ['有风','平静','微风','和风','清风','强风/劲风','疾风','大风','烈风','风暴','狂爆风','飓风','热带风暴'],
    		        
    		        'smog'        =>    ['霾','中度霾','重度霾','严重霾'],
    		      
    		        'rain'        =>    ['阵雨','小雨','中雨','大雨','毛毛雨/细雨','雨','小雨-中雨'],
    		        
    		        'thunderRain' =>    ['雷阵雨','雷阵雨并伴有冰雹'],

                    'rainStorm'   =>    ['暴雨','大暴雨','特大暴雨','强阵雨','强雷阵雨','极端降雨','大雨-暴雨','暴雨-大暴雨','大暴雨-特大暴雨'],
                    
                    'sleet'       =>    ['雨雪天气','雨夹雪','阵雨夹雪','冻雨'],
                    
                    'snow'        =>    ['雪','阵雪','小雪','中雪','大雪','暴雪','小雪-中雪','中雪-大雪','大雪-暴雪'],
                    
                    'dust'        =>    ['浮尘','扬沙','沙尘暴','强沙尘暴'],
                    
                    'tornado'     =>    ['龙卷风'],
                    
                    'fog'         =>    ['雾','浓雾','强浓雾','轻雾','大雾','特强浓雾'],
                    
                    'heat'        =>    ['热'],
                    
                    'cold'        =>    ['冷'],
                    
                    'unknown'     =>    ['未知'],
    		        ];
    		    
    		    if(in_array($weatherInfo,$arrIco['sunny'])){
    		        
    		        $ico = Ico::Weather("sunny");
    		        
    		    }elseif(in_array($weatherInfo,$arrIco['cloud'])){
    		        
    		        $ico = Ico::Weather("cloud");
    		        
    		    }elseif(in_array($weatherInfo,$arrIco['cloudy'])){
    		        
    		        $ico = Ico::Weather("cloudy");
    		        
    		    }elseif(in_array($weatherInfo,$arrIco['gale'])){
    		        
    		        $ico = Ico::Weather("gale");
    		        
    		    }elseif(in_array($weatherInfo,$arrIco['smog'])){
    		        
    		        $ico = Ico::Weather("smog");
    		        
    		    }elseif(in_array($weatherInfo,$arrIco['rain'])){
    		        
    		        $ico = Ico::Weather("rain");
    		        
    		    }elseif(in_array($weatherInfo,$arrIco['thunderRain'])){
    		        
    		        $ico = Ico::Weather("thunderRain");
    		        
    		    }elseif(in_array($weatherInfo,$arrIco['rainStorm'])){
    		        
    		        $ico = Ico::Weather("rainStorm");
    		        
    		    }elseif(in_array($weatherInfo,$arrIco['sleet'])){
    		        
    		        $ico = Ico::Weather("sleet");
    		        
    		    }elseif(in_array($weatherInfo,$arrIco['snow'])){
    		        
    		        $ico = Ico::Weather("snow");
    		        
    		    }elseif(in_array($weatherInfo,$arrIco['dust'])){
    		        
    		        $ico = Ico::Weather("dust");
    		        
    		    }elseif(in_array($weatherInfo,$arrIco['tornado'])){
    		        
    		        $ico = Ico::Weather("tornado");
    		        
    		    }elseif(in_array($weatherInfo,$arrIco['fog'])){
    		        
    		        $ico = Ico::Weather("fog");
    		        
    		    }elseif(in_array($weatherInfo,$arrIco['heat'])){
    		        
    		        $ico = Ico::Weather("heat");
    		        
    		    }elseif(in_array($weatherInfo,$arrIco['cold'])){
    		        
    		        $ico = Ico::Weather("cold");
    		        
    		    }else{
    		        
    		        $ico = Ico::Weather("unknown");
    		    }
    		    echo '<script type="text/javascript" src="/usr/plugins/Wiather/static/libs/jquery-3.5.1.min.js"></script>';
    		    echo '<script type="text/javascript">
    		        $(function(){
    		        
		                    $(".dropdown.wrapper").after("<div id=\"Weather\"><div class=\"w-city\">'. $city .'</div><div class=\"w-ico\">'. $ico .'</div><div class=\"w-temperature\">'. $temperature .'</div><div class=\"w-weather\">'. $weatherInfo .'</div></div>");
		                    
		                    if($(".app-aside-folded").length>0){
                                 $("div#Weather").css("display","none");
                            }
                            
                            $("div#Weather").click(function(){
                                    alert("\n您的IP是：'.ClientInfo::GetUserIP().'\n\n您的操作系统是：'.ClientInfo::GetOS().'\n\n您使用的浏览器是：'.ClientInfo::GetUserBrowser().'\n\n您所在的位置是：'.$location->province.$location->city.'\n\n当前天气情况：'.$weatherInfo.$weather->winddirection.'风'.$temperature.'C");
                            })
                      });
    				</script>';
    			echo '<script type="text/javascript">
    			        console.log("\n %c Wiather天气插件 - by Wibus https://iucky.cn","color:#fff; background: linear-gradient(to right , #7A88FF, #d27aff); padding:5px; border-radius: 10px;");
    			        </script>';
    				
		    }else{
		        
		        $info = '错误，天气信息！您的API配置有误，请确认API是否正确！';
		        
		        echo '<script type="text/javascript">
    		        $(function(){
    		                
                            $(".dropdown.wrapper.vertical-wrapper").after("<div id=\"Weather\"><div class=\"w-info\">'. $info .'</div></div>");
                      });
    				</script>';
		    }
		}
	}
	
	
	// END
}





