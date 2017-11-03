/**
 * Created by a.chernov on 03.11.2017.
 */
$(document).on('keyup', 'textarea', function($e)
{
	switch($e.keyCode)
	{
		case 13:
			var v = $e.target.value;
			var posStart = $e.target.selectionStart;
			var posEnd = $e.target.selectionEnd;

			var s = '<p></p>';

			var before = v.substring(0, posStart);
			var after = v.substring(posEnd, v.length);

			$e.target.value = before + s + after;
			$e.target.selectionStart = posStart + 3;
			$e.target.selectionEnd = posStart + 3;

			return false;
		case 109:
			if(Boolean($e.ctrlKey))
			{
				var v = $e.target.value;
				var posStart = $e.target.selectionStart;
				var posEnd = $e.target.selectionEnd;

				var s = Boolean($e.altKey)
					? '—'
					: '–';

				var before = v.substring(0, posStart);
				var after = v.substring(posEnd, v.length);

				$e.target.value = before + s + after;
				$e.target.selectionStart = posStart + 1;
				$e.target.selectionEnd = posStart + 1;
			}
			return false;
	}
});