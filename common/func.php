<?php
/**
 * Created by PhpStorm.
 * User: a.chernov
 * Date: 26.09.2016
 * Time: 10:43
 */

namespace common;

/**
 * Class func
 *
 * @package common
 */
class func
{
	/**
	 * Returns array, that contains only one key pair, defined by $key
	 *
	 * @param $key
	 * @param array $sourceArray
	 *
	 * @return array
	 */
	public static function array_extract($key, array $sourceArray)
	{
		return [ $key => $sourceArray[$key] ];
	}

	/**
	 * Recursive search of array key.
	 *
	 * @param $key
	 * @param array $search
	 *
	 * @return bool
	 */
	public static function array_key_exists_r($key, array $search)
	{
		if(array_key_exists($key, $search))
			return true;

		foreach($search as $subSearch)
			if(is_array($subSearch) && self::array_key_exists_r($key, $subSearch))
				return true;

		return false;
	}

	/**
	 * @param array $input
	 * @param mixed|null $search_value
	 * @param bool|null $strict
	 * @param int $depth
	 * @param bool $include_only_array
	 *
	 * @return array
	 */
	public static function array_keys_r(array $input, $search_value = null, $strict = null, $depth = INF, $include_only_array = false)
	{
		$result = null;
		if($depth > 0)
		{
			$keys = isset($search_value) ? array_keys($input, $search_value, $strict) : array_keys($input);
			foreach($keys as $key)
				if(is_array($input[$key]))
					$result[$key] = self::array_keys_r($input[$key], $search_value, $strict, --$depth);
				else if(false == $include_only_array)
					$result[$key] = null;
		}
		return $result;
	}

    /**
     * @return string
     */
    public static function getBrowserName()
    {
        $user_agent = $_SERVER["HTTP_USER_AGENT"];
        if (strpos($user_agent, "Firefox") !== false) $browser = "firefox";
        elseif (strpos($user_agent, "Opera") !== false) $browser = "opera";
        elseif (strpos($user_agent, "Chrome") !== false) $browser = "chrome";
        elseif (strpos($user_agent, "MSIE") !== false) $browser = "ie";
        elseif (strpos($user_agent, "Safari") !== false) $browser = "safari";
        else $browser = "ie";
        return $browser;
    }

	/**
	 * @param $dateString
	 * @param bool $humanized
	 *
	 * @return false|string
	 */
	public static function dateString($dateString, $humanized = false)
	{
		return date(boolval($humanized) ? 'd.m.Y' : 'Y-m-d', strtotime($dateString));
	}

	/**
	 * @param $number
	 *
	 * @return string
	 */
	public static function formatThousand($number)
	{
		return number_format($number, 0, '.', ' ');
	}

    /**
     * @return array|bool
     */
    public static function getBrowser()
    {
        if(empty($_SERVER['HTTP_USER_AGENT']))
            return false;

        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        $bname = 'Unknown';
        $platform = 'Unknown';
        $version= "";

        //First get the platform?
        if (preg_match('/linux/i', $u_agent)) {
            $platform = 'linux';
        }
        elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
            $platform = 'mac';
        }
        elseif (preg_match('/windows|win32/i', $u_agent)) {
            $platform = 'windows';
        }

        // Next get the name of the useragent yes seperately and for good reason
        if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
        {
            $bname = 'Internet Explorer';
            $ub = "MSIE";
        }
        elseif(preg_match('/Firefox/i',$u_agent))
        {
            $bname = 'Mozilla Firefox';
            $ub = "Firefox";
        }
        elseif(preg_match('/Chrome/i',$u_agent))
        {
            $bname = 'Google Chrome';
            $ub = "Chrome";
        }
        elseif(preg_match('/Safari/i',$u_agent))
        {
            $bname = 'Apple Safari';
            $ub = "Safari";
        }
        elseif(preg_match('/Opera/i',$u_agent))
        {
            $bname = 'Opera';
            $ub = "Opera";
        }
        elseif(preg_match('/Netscape/i',$u_agent))
        {
            $bname = 'Netscape';
            $ub = "Netscape";
        }

        // finally get the correct version number
        $known = array('Version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) .
            ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($pattern, $u_agent, $matches)) {
            // we have no matching number just continue
        }

        // see how many we have
        $i = count($matches['browser']);
        if ($i != 1) {
            //we will have two since we are not using 'other' argument yet
            //see if version is before or after the name
            if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
                $version= $matches['version'][0];
            }
            else {
                $version= $matches['version'][1];
            }
        }
        else {
            $version= $matches['version'][0];
        }

        // check if we have a number
        if ($version==null || $version=="") {$version="?";}

        return [
            'userAgent' => $u_agent,
            'name'      => $bname,
            'version'   => $version,
            'platform'  => $platform,
            'pattern'    => $pattern
        ];
    }

	/**
	 * @param $someClass
	 *
	 * @return string
	 */
	public static function classAsType($someClass)
	{
		$classPath = get_class($someClass);
		return strtolower(substr($classPath, -1 * (strlen($classPath) - mb_strrpos($classPath, '\\') - 1)));
	}

	/**
	 * @param $taintedAction
	 *
	 * @return string
	 */
	public static function compileYiiAction($taintedAction)
	{
		$words = explode('-', $taintedAction);
		$result = 'action';
		foreach($words as $word)
			$result .= ucfirst($word);
		return $result;
	}

	/**
	 * @param $message
	 *
	 * @return string
	 */
	public static function concon($message)
	{
		return mb_convert_encoding($message, \Yii::$app->params['consoleEncoding'], 'UTF-8');
	}

    /**
     * @param $var
     * @param bool $bReturn
     * @param bool $asArray
     * @return mixed
     */
	public static function d($var, $bReturn = false, $asArray = false)
	{
		$result = $asArray ? print_r($var,true) : var_export($var, true);
		if(!$bReturn)
			echo '<pre>', $result, '</pre>';
		return $result;
	}

	/**
	 * Custom recursive in_array.
	 *
	 * @param $needle
	 * @param array $haystack
	 * @param bool $strict
	 *
	 * @return bool
	 */
	public static function in_array_r($needle, array $haystack, $strict = false)
	{
		foreach($haystack as $item)
			if(($strict ? $item === $needle : $item == $needle) || (is_array($item) && self::in_array_r($needle, $haystack, $strict)))
				return true;

		return false;
	}

	/**
	 * @param mixed $value
	 * @param int $defaultValue
	 * @param string|null $defaultValueCond
	 *
	 * @return int
	 */
	public static function intvalEx($value, $defaultValue = 0, $defaultValueCond = null)
	{
		$value = intval($value);

		if('max' == $defaultValueCond && $value > $defaultValue)
			$value = $defaultValue;
		if('min' == $defaultValueCond && $value < $defaultValue)
			$value = $defaultValue;

		return $value ?: $defaultValue;
	}

	/**
	 * @param $string
	 *
	 * @return bool
	 */
	public static function is_guid($string)
	{
		return preg_match('/^[0-9a-f]{8}[-]?([0-9a-f]{4}[-]?){3}[0-9a-f]{12}$/', $string);
	}

	/**
	 * @return bool
	 */
	public static function isEnvProd()
	{
		return defined('YII_ENV') && 'prod' == YII_ENV;
	}

	/**
	 * @param $string
	 * @param string $enc
	 *
	 * @return string
	 */
	public static function mb_ucfirst($string, $enc = 'UTF-8')
	{
		return mb_strtoupper(mb_substr($string, 0, 1, $enc), $enc).mb_substr($string, 1, mb_strlen($string, $enc), $enc);
	}

	/**
	 * @return bool|string
	 */
	public static function now()
	{
		return date('Y-m-d H:i:s');
	}

	/**
	 * @param int $pass_len
	 * @param bool $pass_chars
	 * @return string
	 */
	public static function randString($pass_len=10, $pass_chars=false)
	{
		$allchars = 'abcdefghijklnmopqrstuvwxyzABCDEFGHIJKLNMOPQRSTUVWXYZ0123456789';
		$string = '';
		if(is_array($pass_chars))
		{
			while(strlen($string) < $pass_len)
			{
				if(function_exists('shuffle'))
					shuffle($pass_chars);
				foreach($pass_chars as $chars)
				{
					$n = strlen($chars) - 1;
					$string .= $chars[mt_rand(0, $n)];
				}
			}
			if(strlen($string) > count($pass_chars))
				$string = substr($string, 0, $pass_len);
		}
		else
		{
			if($pass_chars !== false)
			{
				$chars = $pass_chars;
				$n = strlen($pass_chars) - 1;
			}
			else
			{
				$chars = $allchars;
				$n = 61; //strlen($allchars)-1;
			}
			for ($i = 0; $i < $pass_len; $i++)
				$string .= $chars[ mt_rand(0, $n) ];
		}
		return $string;
	}

	/**
	 * Makes standard strval if not boolean. If boolean returns string 'true' or 'false', depending on value
	 *
	 * @param $value
	 *
	 * @return string
	 */
	public static function strval($value)
	{
		return is_bool($value)
			? ($value ? 'true' : 'false')
			: strval($value);
	}

	/**
	 * @param $dateString
	 * @param bool $alreadyDate
	 *
	 * @return false|string
	 */
	public static function timeString($dateString, $alreadyDate = false)
	{
		return empty($dateString) ? '' : date('H:i', $alreadyDate ? $dateString : strtotime($dateString));
	}

    /**
     * Outputs referrer in the script
     *
     * @return string
     */
    public static function gaReferrer()
    {
        return self::isReferred() ? 'ga("BaseTracker.set", "dimension3", "'.$_SERVER['HTTP_REFERER'].'");' : '';
    }

    /**
     * @return bool
     */
    public static function isReferred()
    {
        return false !== strpos('vozovoz', $_SERVER['HTTP_REFERER']);
    }

    /**
     * @param $st
     * @return string
     */
    public static function transliterate($st) {
        $st = strtr($st,
            "абвгдежзийклмнопрстуфыэАБВГДЕЖЗИЙКЛМНОПРСТУФЫЭ",
            "abvgdegziyklmnoprstufieABVGDEGZIYKLMNOPRSTUFIE"
        );
        $st = strtr($st, array(
            'ё'=>"yo",    'х'=>"h",  'ц'=>"ts",  'ч'=>"ch", 'ш'=>"sh",
            'щ'=>"shch",  'ъ'=>'',   'ь'=>'',    'ю'=>"yu", 'я'=>"ya",
            'Ё'=>"Yo",    'Х'=>"H",  'Ц'=>"Ts",  'Ч'=>"Ch", 'Ш'=>"Sh",
            'Щ'=>"Shch",  'Ъ'=>'',   'Ь'=>'',    'Ю'=>"Yu", 'Я'=>"Ya",
        ));
        return $st;
    }
}