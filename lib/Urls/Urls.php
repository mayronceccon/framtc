<?php
namespace Urls;

use \Exception\ExceptionFramtc;

class Urls
{	
	public static function asset($path = '/')
	{		
		if (!is_null($path)) {
			switch ($path) {
				case '/':
					return __SITE__;
					break;
				case 'js':
					return __JS__ ; 
					break;
				case 'css':
					return __CSS__ ; 
					break;
				case 'img':
					return __IMG__ ; 
					break;
				default:
					return __SITE__;
					break;
			}
		}
	}
	
	public static function assetJs($files = array())
	{		
		if (is_array($files)) {
			if (count($files) > 0) {			
				foreach ($files as $file) {				
					echo '<script src="' . __JS__  . $file . '"></script>';
				}
			}
		}else{
			throw new ExceptionFramtc('Informe um array de arquivos');
		}	
	}
	
	public static function assetCss($files = array())
	{
		if (is_array($files)) {
			if (count($files) > 0) {
				foreach ($files as $file) {				
					echo '<link href="' . __CSS__ . $file .'" rel="stylesheet">';				
				}
			}
		}else{
			throw new ExceptionFramtc('Informe um array de arquivos');
		}
	}
}