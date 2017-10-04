<?php
/**
 * Created by PhpStorm.
 * User: a.chernov
 * Date: 04.10.2017
 * Time: 18:26
 */

namespace common\classes;


class MenuList
{
	private static $contextId;

	/**
	 * @param $menu
	 * @param array $result
	 *
	 * @return array
	 */
	private static function __fillMenu($menu, &$result = [])
	{
		foreach($menu as $item)
		{
			$data = [
				'label' => $item['name'],
				'url' => empty($item['menus'])
					? '/cpanel/'.$item['code'].'/'
					: 'javascript:;',
			];

			if(false == empty($item['icon']))
				$data['icon'] = $item['icon'];

			if(empty($item['menus']) && isset(self::$contextId))
				$data['active'] = $item['code'] == self::$contextId;
			else
				$data['items'] = self::__fillMenu($item['menus'], $data['items']);

			$result[] = $data;
		}

		return $result;
	}

	/**
	 * @param null $contextId
	 *
	 * @return array
	 */
	public static function get($contextId = null)
	{
		self::$contextId = $contextId;

		$menu = \common\models\Menu::find()->alias('m')
			->joinWith('menus as m2')
			->where(array_merge([
				'm.parent_code' => null,
			], \Yii::$app->user->can('admin') ? [] : [
				'm.access' => 0,
			]))
			->orderBy('m.ord ASC')
			// ->indexBy('code')
			->asArray()
			->all();

		return self::__fillMenu($menu);
	}
}