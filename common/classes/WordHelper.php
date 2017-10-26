<?php
/**
 * Created by PhpStorm.
 * User: a.chernov
 * Date: 23.10.2017
 * Time: 12:24
 */

namespace common\classes;


use yii\helpers\StringHelper;
use yii\helpers\Url;

class WordHelper extends StringHelper
{
	private static function getProperCase($number, $string)
	{
		$femaleHard = ['а'];
		$femaleSoft = ['ь'];
		$maleSoft = ['ж'];
		$maleMedium = ['ц'];


		$result = strval($string);
		$lastSyllable = mb_substr($string, mb_strlen($string)-1, 1);

		switch($number)
		{
			case 1:
				break;
			case 2: case 3: case 4:
				if(in_array($lastSyllable, $femaleSoft))
					$result = mb_substr($result, 0, mb_strlen($result)-1).'и';
				elseif(in_array($lastSyllable, $femaleHard))
					$result = mb_substr($result, 0, mb_strlen($result)-1).'ы';
				else
					$result .= 'а';
				break;
			default:
				if(in_array($lastSyllable, $femaleSoft))
					$result .= mb_substr($result, 0, mb_strlen($result)-1).'и';
				elseif(in_array($lastSyllable, $femaleHard))
					$result = mb_substr($result, 0, mb_strlen($result)-1);
				elseif(in_array($lastSyllable, $maleSoft))
					$result .= 'ей';
				elseif(in_array($lastSyllable, $maleMedium))
					$result .= 'ев';
				else
					$result .= 'ов';
		}

		return $result;
	}

	/**
	 * @param string $string
	 * @param int $length
	 * @param string $suffix
	 * @param null $encoding
	 * @param bool $asHtml
	 * @param bool $prettyCut
	 *
	 * @return string
	 */
	public static function truncate($string, $length, $suffix = '...', $encoding = null, $asHtml = false, $prettyCut = true)
	{
		$customSuffix = is_array($suffix)
			? (empty($suffix['prefix']) ? '... ' : $suffix['prefix']).'<a href="'.Url::to($suffix['href']).'">'.$suffix['text'].'</a>'
			: null;

		$result = parent::truncate($string, $length, isset($customSuffix) ? null : $suffix, $encoding, $asHtml);

		if(false == empty($result) && $prettyCut && $length <= strlen($result))
			$result = trim(substr($result, 0, strrpos($result, ' ')), ',.').$customSuffix;

		return $result;
	}

	/**
	 * @param $number
	 * @param $arCase
	 * @param $complex
	 *
	 * @return string
	 */
	public static function wordCase($number, $arCase, $complex = false)
	{
		$number = $number % 100;
		if($number > 19)
			$number = $number % 10;

		switch($number)
		{
			case 1:
				$result = boolval($complex) ? self::getProperCase($number, $arCase) : $arCase[0];
				break;
			case 2: case 3: case 4:
				$result = boolval($complex) ? self::getProperCase($number, $arCase) : $arCase[1];
				break;
			default:
				$result = boolval($complex) ? self::getProperCase($number, $arCase) : $arCase[2];
		}

		return (string)$result;
	}
}