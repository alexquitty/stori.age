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
}