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
	public static function stress($string, $wrapTag = 'b', $stressSymbol = '_', $wrapTagUpperCase = null)
	{
		// compiling $wrapTag
		$wrapTagArr = explode(' ', $wrapTag);
		$wrapTagEnd = reset($wrapTagArr);

		if(!empty($wrapTagUpperCase))
		{
			$wrapTagArr = explode(' ', $wrapTagUpperCase);
			$wrapTagUpperCaseEnd = reset($wrapTagArr);
		}
		else
		{
			$wrapTagUpperCase = $wrapTag;
			$wrapTagUpperCaseEnd = $wrapTagEnd;
		}

		// for UTF symbols it's 2 symbols
		$string = preg_replace('/('.$stressSymbol.'([аеиоуыэюя]{2}))/', '<'.$wrapTag.'>$2</'.$wrapTagEnd.'>', $string);
		$string = preg_replace('/('.$stressSymbol.'([АЕИОУЫЭЮЯ]{2}))/', '<'.$wrapTagUpperCase.'>$2</'.$wrapTagUpperCaseEnd.'>', $string);

		return $string;
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
	 * @param $asArray
	 *
	 * @return string
	 */
	public static function wordCase($number, $arCase, $asArray = false)
	{
		$number = $number % 100;
		if($number > 19)
			$number = $number % 10;

		switch($number)
		{
			case 1:
				$result = $arCase[0];
				break;
			case 2: case 3: case 4:
				$result = $arCase[1];
				break;
			default:
				$result = $arCase[2];
		}

		return boolval($asArray)
			? [$number => strval($result)]
			: (string)$result;
	}

	/**
	 * @param $number
	 * @param $string
	 *
	 * @return string
	 */
	public static function wordCaseEx($number, $string)
	{
		$femaleHard = ['а'];
		$femaleSoft = ['ь', 'я'];
		$maleSoft = ['ж', 'г'];
		$maleMedium = ['ц'];
		$medium = ['е'];
		$middle = ['о'];

		$preFemale = ['т', 'с'];
		$preMale = ['д'];
		$preMedium = ['м'];

		$transcript = [ 'г' => 'з' ];


		$result = strval($string);
		$lastSyllable = mb_substr($string, mb_strlen($string)-1, 1);
		$preSyllable = mb_substr($string, mb_strlen($string)-2, 1);

		switch($number)
		{
			case 1:
				break;
			case 2: case 3: case 4:
				if(in_array($lastSyllable, $femaleSoft))
					$result = in_array($preSyllable, $preMedium)
						? mb_substr($result, 0, mb_strlen($result)-1).'ени'
						: (
							/* in_array($preSyllable, $preMale)
								? mb_substr($result, 0, mb_strlen($result)-1).'ей'
								:*/ mb_substr($result, 0, mb_strlen($result)-1).'и'
						);
				elseif(in_array($lastSyllable, $femaleHard))
					$result = mb_substr($result, 0, mb_strlen($result)-1).'ы';
				elseif(in_array($lastSyllable, $medium))
					$result = mb_substr($result, 0, mb_strlen($result)-1).'я';
				elseif(in_array($lastSyllable, $middle))
					$result = mb_substr($result, 0, mb_strlen($result)-1).'а';
				else
					$result .= 'а';
				break;
			default:
				if(in_array($lastSyllable, $femaleSoft))
					$result = in_array($preSyllable, $preMedium)
						? mb_substr($result, 0, mb_strlen($result)-1).'ён'
						: ( in_array($preSyllable, $preMale) || in_array($preSyllable, $preFemale)
							? mb_substr($result, 0, mb_strlen($result)-1).'ей'
							: mb_substr($result, 0, mb_strlen($result)-1).'й'
						);
				elseif(in_array($lastSyllable, $femaleHard))
					$result = mb_substr($result, 0, mb_strlen($result)-1);
				elseif(in_array($lastSyllable, $maleSoft))
				{
					if(array_key_exists($lastSyllable, $transcript))
						$result = mb_substr($result, 0, mb_strlen($result) - 1).$transcript[$lastSyllable];
					$result .= 'ей';
				}
				elseif(in_array($lastSyllable, $maleMedium))
					$result .= 'ев';
				elseif(in_array($lastSyllable, $medium))
					$result = mb_substr($result, 0, mb_strlen($result)-1).'й';
				elseif(in_array($lastSyllable, $middle))
					$result = mb_substr($result, 0, mb_strlen($result)-1);
				else
					$result .= 'ов';
		}

		return $result;
	}
}