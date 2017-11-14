<?php
/**
 * Created by PhpStorm.
 * User: a.chernov
 * Date: 14.11.2017
 * Time: 17:09
 */

namespace backend\models\wow;


class WowLib
{
	public static function fraction($alliance, $size = 30)
	{
		return '<img height="'.$size.'" src="https://worldofwarcraft.akamaized.net/static/components/Logo/Logo-'.(0 == $alliance ? 'horde' : 'alliance').'.png" alt="'.(0 == $alliance ? 'Horde' : 'Alliance').'"/>';
	}
}