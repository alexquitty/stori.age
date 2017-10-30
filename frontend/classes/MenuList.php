<?php
/**
 * Created by PhpStorm.
 * User: a.chernov
 * Date: 23.10.2017
 * Time: 12:49
 */

namespace frontend\classes;


use common\models\Menu;
use yii\db\ActiveQuery;

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
				'url' => empty($items['menus'])
					? '/'.$item['code'].'/'
					: 'javascript:;',
			];

			// if(false == empty($item['icon']))
			// 	$data['icon'] = $item['icon'];

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

		$menu = Menu::find()->alias('m')
			->joinWith([
				'menus AS m2' => function(ActiveQuery $query)
				{
					$query->orderBy([
						'ord' => SORT_ASC,
						'name' => SORT_ASC,
					]);
				},
			])
			->where([
				'm.parent_code' => null,
				'm.content' => 1,
			])
			->orderBy('m.ord ASC')
			->asArray()
			->all();

		return self::__fillMenu($menu);
	}
}