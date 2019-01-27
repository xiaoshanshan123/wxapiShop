<?php

//  +---------------------------------
//  微信相关配置
//  +---------------------------------

return [
			        // 小程序app_id
					'app_id'=>'wx235f19d754a40e18',
				    // 小程序app_secret
					'secret'=>'098aa32adb7e1b640721dd371b1737d3',
		    		// 微信使用code换取用户openid及session_key的url地址
					'login'=>'https://api.weixin.qq.com/sns/jscode2session?appid=APPID&secret=SECRET&js_code=JSCODE&grant_type=authorization_code'
		];