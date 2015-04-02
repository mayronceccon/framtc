<?php 

namespace Encryption;

class Encrypter 
{
	public static function encrypt($value = null)
	{
		if (!is_null($value)) {
			return base64_encode(gzcompress(serialize($value)));
		}
	}
	
	public static function decrypt($value = null)
	{
		if (!is_null($value)) {
			return unserialize(gzuncompress(base64_decode($value)));
		}
	}
}