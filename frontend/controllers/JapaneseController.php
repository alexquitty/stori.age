<?php
namespace frontend\controllers;

class JapaneseController extends \yii\web\Controller
{
	const PROPOSAL_LIMIT = 5;

	private $_answerAbc;
	private $_score = 0;

	public $enableCsrfValidation = false;

	private $_syllable = [
		'a', 'i', 'u', 'e', 'o', 'ya', 'yu', 'yo',
		'ka', 'ki', 'ku', 'ke', 'ko', 'kya', 'kyu', 'kyo',
		'sa', 'shi', 'su', 'se', 'so', 'sya', 'syu', 'syo',
		'ta', 'chi', 'tsu', 'te', 'to', 'cha', 'chu', 'cho',
		'na', 'ni', 'nu', 'ne', 'no', 'nya', 'nyu', 'nyo',
		'ha', 'hi', 'fu', 'he', 'ho', 'hya', 'hyu', 'hyo',
		'ra', 'ri', 'ru', 're', 'ro', 'rya', 'ryu', 'ryo',
		'wa', 'wo', 'n',
		'ga', 'gi', 'gu', 'ge', 'go', 'gya', 'gyu', 'gyo',
		'za', 'dzi', 'zu', 'ze', 'zo', 'zya', 'zyu', 'zyo',
		'da', 'dji', 'dzu', 'dze', 'dzo', 'dzya', 'dzyu', 'dzyo',
		'ba', 'bi', 'bu', 'be', 'bo', 'bya', 'byu', 'byo',
		'pa', 'pi', 'pu', 'pe', 'po', 'pya', 'pyu', 'pyo',
	];
	private $_hiragana = [
		'あ', 'い', 'う', 'え', 'お', 'や', 'ゆ', 'よ',
		'か', 'き', 'く', 'け', 'こ', 'きゃ', 'きゅ', 'きょ',
		'さ', 'し', 'す', 'せ', 'そ', 'しゃ', 'しゅ', 'しょ',
		'た', 'ち', 'つ', 'て', 'と', 'ちゃ', 'ちゅ', 'ちょ',
		'な', 'に', 'ぬ', 'ね', 'の', 'にゃ', 'にゅ', 'にょ',
		'は', 'ひ', 'ふ', 'へ', 'ほ', 'ひゃ', 'ひゅ', 'ひょ',
		'ら', 'り', 'る', 'れ', 'ろ', 'りゃ', 'りゅ', 'りょ',
		'わ', 'を', 'ん',
		'が', 'ぎ', 'ぐ', 'げ', 'ご', 'ぎゃ', 'ぎゅ', 'ぎょ',
		'ざ', 'じ', 'ず', 'ぜ', 'ぞ', 'じゃ', 'じゅ', 'じょ',
		'だ', 'ぢ', 'づ', 'で', 'ど', 'ぢゃ', 'ぢゅ', 'ぢょ',
		'ば', 'び', 'ぶ', 'べ', 'ぼ', 'びゃ', 'びゅ', 'びょ',
		'ぱ', 'ぴ', 'ぷ', 'ぺ', 'ぽ', 'ぴゃ', 'ぴゅ', 'ぴょ',
	];
	private $_katakana = [
		'ア', 'イ', 'ウ', 'エ', 'オ', 'ヤ', 'ユ', 'ヨ',
		'カ', 'キ', 'ク', 'ケ', 'コ', 'キャ', 'キュ', 'キョ',
		'サ', 'シ', 'ス', 'セ', 'ソ', 'シャ', 'シュ', 'ショ',
		'タ', 'チ', 'ツ', 'テ', 'ト', 'チャ', 'チュ', 'チョ',
		'ナ', 'ニ', 'ヌ', 'ネ', 'ノ', 'ニャ', 'ニュ', 'ニョ',
		'ハ', 'ヒ', 'フ', 'ヘ', 'ホ', 'ヒャ', 'ヒュ', 'ヒョ',
		'ラ', 'リ', 'ル', 'レ', 'ロ', 'リャ', 'リュ', 'リョ',
		'ワ', 'ヲ', 'ン',
		'ガ', 'ギ', 'グ', 'ゲ', 'ゴ', 'ギャ', 'ギュ', 'ギョ',
		'ザ', 'ジ', 'ズ', 'ゼ', 'ゾ', 'ジャ', 'ジュ', 'ジョ',
		'ダ', 'ヂ', 'ヅ', 'デ', 'ド', 'ヂャ', 'ヂュ', 'ヂョ',
		'バ', 'ビ', 'ブ', 'ベ', 'ボ', 'ビャ', 'ビュ', 'ビョ',
		'パ', 'ピ', 'プ', 'ペ', 'ポ', 'ピャ', 'ピュ', 'ピョ',
	];

	private function __checkAnswer($params)
	{
		$index = $params['index'];
		$left = $params['0'];
		$right = $params['1'];

		if($left == $index)
		{
			if($right == $index)
			{
				$msg = 'Absolutely right!';
				$this->_score++;
			}
			else
			{
				$msg = 'Right part was wrong!';
			}
		}
		elseif($right == $index)
		{
			$msg = 'Left part was wrong!';
		}
		else
		{
			$msg = 'Both parts were wrong!';
			$this->_score--;
		}

		return $msg;
	}

	private function __formQuestion()
	{
		$qAbcName = $this->__getAlphabet(); // setup random alphabet for question and others as answers
		$index = rand(0, count($this->_syllable) - 1); // question's glyph index

		$qAbc = $this->$qAbcName;
		$question = 'Find matches for `<b>'.$qAbc[$index].'</b>`';
		$answers = [];
		foreach($this->_answerAbc as $k => $abc)
		{
			// get real alphabet (not a name)
			$realAB = $this->$abc;

			// filling array with randoms
			$answers[$k] = [];
			while(count($answers[$k]) < self::PROPOSAL_LIMIT)
			{
				do
					$idx = rand(0, count($realAB) - 1);
				while(in_array($idx, array_keys($answers[$k])));

				$answers[$k][] = [
					'glyph' => $realAB[$idx],
					'index' => $idx,
				];
			}

			// rewriting random with the right answer
			$answers[$k][rand(0, self::PROPOSAL_LIMIT - 1)] = [
				'glyph' => $realAB[$index],
				'index' => $index,
			];
		}

		return [
			'question' => $question,
			'answers' => $answers,
			'index' => $index,
		];
	}

	private function __getAlphabet($index = null)
	{
		if(is_null($index))
			$index = rand(0, 2);

		switch($index)
		{
			case 1:
				$this->_answerAbc = ['_syllable', '_katakana'];

				return '_hiragana';

			case 2:
				$this->_answerAbc = ['_syllable', '_hiragana'];

				return '_katakana';

			default:
				$this->_answerAbc = ['_hiragana', '_katakana'];

				return '_syllable';
		}
	}

    public function actionIndex()
    {
    	$params = \Yii::$app->request->post();
    	if(isset($params['index']))
    		$msg = $this->__checkAnswer($params);

	    $data = $this->__formQuestion();
	    if(isset($msg))
	        $data['msg'] = $msg;

	    $data['score'] = $this->_score;

    	return $this->render('index', $data);
    }
}
