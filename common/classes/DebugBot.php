<?php
/**
 * Created by PhpStorm.
 * User: a.chernov
 * Date: 17.11.2016
 * Time: 15:25
 */

// namespace common;


class DebugBot
{
	public static $debugCode;

	/**
	 * @param null $to
	 *
	 * @return string
	 */
	private static function getChatId($to = null)
	{
	    // $req = !empty($to) ? $to : \Yii::$app->params['debugBotDefaultSender'];
		// switch($req)
		// {
			// case 'alex':
			// case 'aq':
				return '199835097';
		// }

		// return '-1001071076435';
	}

	/**
	 * @param $text
	 * @param string $to
	 * @param null $debugCode
	 *
	 * @return bool|null|string
	 */
	public static function send($text, $to = '', $debugCode = null)
	{
		if(empty(self::$debugCode) || (isset(self::$debugCode) && ($to == self::$debugCode || $debugCode == self::$debugCode)))
		{
			if(empty($text))
				$text = '/Message empty/';

			$json_text = json_encode($text, JSON_UNESCAPED_UNICODE);

			if(mb_strlen($json_text, 'utf-8') > 4096)
				$json_text = mb_substr($json_text, 0, 4090, 'utf-8').'✂';

			$chatId = self::getChatId($to);
			if(isset($chatId))
			{
				$context = stream_context_create(
					['ssl' =>
						[
							"allow_self_signed"=>true,
							"verify_peer"=>false,
							"verify_peer_name"=> false
						]
					]);

				return file_get_contents('https://px1.vozovoz.ru/bot264498281:AAGpVqga9RQBKp7umUEcZsxENMYp3Oj2RQw/sendMessage?chat_id=' . $chatId . '&text=' . $json_text, false, $context);
			}
		}

		return null;
	}
}