/**
 * Created by a.chernov on 02.08.2016.
 */
var func = {

	/**
	 * Sub-function to create an object with hierarchy
	 * @param $target
	 * @param $extension
	 * @private
	 */
	__extendWithHierarchy: function($target, $extension)
	{
		if(this.is_object($target) && this.is_object($extension))
		{
			for(var key in $extension)
			{
				if($target.hasOwnProperty(key))
				{
					if(this.is_object($target[key]))
						this.__extendWithHierarchy($target[key], $extension[key]);

					else
						$.extend($target[key], $extension[key]);
				}

				else if(this.is_object($extension[key]))            // $target should have no link with $extension
					$target[key] = $.extend({}, $extension[key]);   // when extending is finished

				else if(this.isset($extension[key]))
					$target[key] = $extension[key];
			}
		}
		else
			$.extend($target, $extension);
	},

	/**
	 * Formats normalized date (YYYY-MM-DD) to pretty one (DD.MM.YYYY)
	 * @param $date
	 * @returns {string}
	 */
	dateFormat: function($date)
	{
		if(!this.empty($date))
		{
			var _date = $date.split('-');
			if(3 == _date.length)
				return _date[2] + '.' + _date[1] + '.' + _date[0];
		}
	},

	/**
	 * Transforms '16.08.2001' to '2001-08-16' as string or Date JS object
	 *
	 * @param $date String
	 * @param $returnDateObject Set to TRUE to get Date JS object instead of string.
	 * @returns {*}
	 */
	dateNormalize: function($date, $returnDateObject)
	{
		if(!this.empty($date))
		{
			$returnDateObject = Boolean($returnDateObject);

			// check points
			var _date = $date.split('.');
			if(3 == _date.length)
			{
				var _result = _date[2] + '-' + _date[1] + '-' + _date[0];
				return $returnDateObject ? new Date(_result) : _result;
			}
		}
	},
	/**
	 * php-like `empty` function
	 * @param variable
	 * @param $debug
	 * @returns {boolean|*}
	 */
	empty: function(variable, $debug)
	{
		if(Boolean($debug))
		{
			console.log(typeof(variable) === 'undefined');
			console.log(variable === '');
			console.log(variable === '0');
			console.log(variable === 0);
			console.log(variable === false);
			console.log(variable === null);
			console.log(typeof(variable) === 'number' && isNaN(variable));
			console.log(this.is_array(variable) && variable.length === 0);
			console.log(this.is_object(variable) && this.size(variable) === 0);
		}
		return !this.is_function(variable) && ( // not a function
			typeof(variable) === 'undefined' ||
			variable === '' ||
			variable === '0' ||
			variable === 0 ||
			variable === false ||
			variable === null ||
			(typeof(variable) === 'number' && isNaN(variable)) ||
			(this.is_array(variable) && variable.length === 0) ||
			(this.is_object(variable) && this.size(variable) === 0)
		);
	},
	/**
	 * @param $object
	 * @returns {*}
	 */
	end: function($object)
	{
		if(!this.is_object($object) && !this.is_array($object))
		{
			console.error('Reset function can be used only with objects or arrays!');
			return null;
		}
		if(this.empty($object))
			return null;

		if(this.is_array($object))
			return $object[$object.length-1];
		else
			return $object[Object.keys($object)[this.size($object)-1]];
	},
	/**
	 * @param $variable
	 */
	exists: function($variable)
	{
		return window.hasOwnProperty($variable);
	},
	/**
	 * Merge the contents of two or more objects together into the first object maintaining hierarchy intact.
	 *
	 * @param $target
	 * @param $object_1 .. $object_n
	 */
	extend: function($target, $object_1)
	{
		for(var i = 1; i < arguments.length; i++)
			this.__extendWithHierarchy($target, arguments[i]);

		return $target;
	},
	/**
	 * @param $var
	 * @returns {Number|number}
	 */
	floatval: function($var)
	{
		return (parseFloat($var) || 0);
	},
	/**
	 * Правильная форма cуществительного рядом с числом (счетная форма).
	 *
	 * @param _number integer Число
	 * @param _case1 string Единственное число именительный падеж
	 * @param _case2 string Единственное число родительный падеж
	 * @param _case3 string Множественное число родительный падеж
	 * @return string
	 */
	getCase: function (_number, _case1, _case2, _case3)
	{
		var base = _number - Math.floor(_number / 100) * 100;
		var result;

		if (base > 9 && base < 20) {
			result = _case3;

		} else {
			var remainder = _number - Math.floor(_number / 10) * 10;

			if (1 == remainder) result = _case1;
			else if (0 < remainder && 5 > remainder) result = _case2;
			else result = _case3;
		}

		return result;
	},
	/**
	 * Returns object|subObject|value via $keys array
	 * FOR EXAMPLE
	 *      $obj = {test: {inside: {deep: value}}}
	 *      $keys = ['test', 'inside']
	 *      Returns $obj['test']['inside'] (in this case as object, if u need value then add 'deep' to $keys array)
	 * @param $obj
	 * @param $keys
	 * @param $index
	 * @param $forceCreation
	 * @param $data
	 * @returns {*}
	 */
	getObjectByKeys: function($obj, $keys, $forceCreation, $index, $data)
	{
		if(this.empty($index))
			$index = 0; // making index 0 if none was placed

		$forceCreation = Boolean($forceCreation); // force creating of the node ($obj[$keys[$index]]) if it wasn't found

		if(false == this.is_array($keys)) // if $keys not array or $keys[$index] not exists returns $obj as it is
		{
			this.error('Keys for getObjectByKeys are not array!');
			return $obj;
		}

		else if(this.empty($keys[$index]))
		{
			this.error('Keys for getObjectByKeys are empty!');
			return $obj;
		}

		else if($obj.hasOwnProperty($keys[$index]) || $forceCreation) // if we have such key in $obj or force to create one
		{
			if(false == $obj.hasOwnProperty($keys[$index]) && $forceCreation)
				$obj[$keys[$index]] = {};

			if($keys.hasOwnProperty($index+1)) // and we have next index for $keys
				// here was `return` but don't know what for
				this.getObjectByKeys($obj[$keys[$index]], $keys, $forceCreation, $index + 1, $data); // go further
			else if(this.isset($data))
			{
				if(empty($obj[$keys[$index]]))
					$obj[$keys[$index]] = $data;
				else
					$obj[$keys[$index]] = $.extend($obj[$keys[$index]], $data);
			}
			else
				return $obj[$keys[$index]];

			return $obj; // if no next index or final recursive callback returned then returns what we've found
		}
		else
			return undefined; // returns as it is
	},
	/**
	 *
	 * @param $needle
	 * @param $haystack
	 * @returns {boolean|null}
	 */
	in_array: function($needle, $haystack)
	{
		if(this.is_array($haystack) && this.isset($needle))
			return $haystack.indexOf($needle) > -1;
		else
			return null;
	},
	/**
	 *
	 * @param $var
	 */
	intval: function($var)
	{
		return this.isset($var) ? Number(this.strval($var).replace(/[^0-9]+/g,'')) : 0;
	},
	/**
	 *
	 * @param variable
	 * @returns {boolean}
	 */
	is_array: function(variable)
	{
		return ( variable instanceof Array && variable instanceof Object );
	},
	/**
	 *
	 * @param variable
	 * @returns {boolean}
	 */
	is_bool: function(variable)
	{
		return this.isset(variable) && 'boolean' == typeof(variable);
	},
	/**
	 *
	 * @param $variable
	 * @returns {*|boolean}
	 */
	is_function: function($variable)
	{
		return this.isset($variable) && 'function' == typeof($variable);
	},
	/**
	 * @param $string
	 */
	is_guid: function($string)
	{
		return is_string($string)
			? false == empty($string.match(/^[0-9a-f]{8}[-]?([0-9a-f]{4}[-]?){3}[0-9a-f]{12}$/))
			: false;
	},
	/**
	 *
	 * @param variable
	 * @returns {boolean}
	 */
	is_object: function(variable)
	{
		return ( variable instanceof Object && !(variable instanceof Array) );
	},
	/**
	 *
	 * @param $variable
	 * @returns {boolean}
	 */
	is_string: function($variable)
	{
		return 'string' == typeof($variable);
	},
	/**
	 * @param $variable
	 * @returns {boolean}
	 */
	isset: function($variable)
	{
		return typeof($variable) != 'undefined' && (typeof($variable) != 'object' || $variable !== null);
	},
	/**
	 * Checks whether object exists in DOM (by selector or jQuery object)
	 * @param $jQueryObj
	 * @returns {boolean}
	 */
	jempty: function($jQueryObj)
	{
		return this.empty($jQueryObj) || !(
			// check jQuery loaded
			window.jQuery && (
				// already is object
				(this.is_object($jQueryObj) && $jQueryObj.hasOwnProperty('length') && $jQueryObj.length > 0)
				||
				// or is string (selector then)
				(this.is_string($jQueryObj) && $($jQueryObj).length > 0)
			)
		);
	},
	/**
	 * Opposite of `jempty()`
	 * @param $jQueryObj
	 * @returns {boolean}
	 */
	jexists: function($jQueryObj)
	{
		return false == this.jempty($jQueryObj);
	},
	/**
	 * Analogue of PHP's key()
	 * @param $variable
	 */
	key: function($variable)
	{
		return this.is_array($variable)
			? 0
			: (
				this.is_object($variable)
					? Object.keys($variable)[0]
					: null
			);
	},
	/**
	 *
	 * @param $variableArray
	 * @param $valueArray
	 * @returns {{}}
	 */
	list: function($variableArray, $valueArray)
	{
		var _result = {};
		if(this.is_array($variableArray) && this.is_array($valueArray))
			for(var i = 0; i < $valueArray.length; i++)
				_result[$variableArray[i]] = $valueArray[i];
		return _result;
	},
	/**
	 * Returns first element of array or object (assoc.array)
	 * @param $object
	 * @returns {*}
	 */
	reset: function($object)
	{
		if(!this.is_object($object) && !this.is_array($object))
		{
			console.error('Reset function can be used only with objects or arrays!');
			return null;
		}
		if(this.empty($object))
			return null;

		if(this.is_array($object))
			return $object[0];
		else
			return $object[Object.keys($object)[0]];
	},
	/**
	 *
	 * @param $obj
	 * @param $keys
	 * @param $data
	 * @returns {*}
	 */
	setObjectByKeys: function($obj, $keys, $data)
	{
		return this.getObjectByKeys($obj, $keys, true, 0, $data);
	},
	/**
	 * Returns actual keys(index) quantity in the object (no matter empty they or not)
	 *
	 * @param $obj
	 * @returns {number}
	 */
	size: function($obj)
	{
		var result = 0;
		if(this.is_object($obj))
			result = Object.keys($obj).length;
		return result;
	},
	/**
	 *
	 * @param $needle
	 * @param $replacement
	 * @param $haystack
	 * @returns {string}
	 */
	str_replace: function($needle, $replacement, $haystack)
	{
		return $haystack.split($needle).join($replacement);
	},
	/**
	 * @param $string
	 * @returns {*}
	 */
	strval: function($string)
	{
		if(false == this.isset($string) || ('number' == typeof($string) && isNaN($string)))
			return '';
		else
			return String($string);
	},
	/**
	 * Заменяет первую букву на заглавную
	 * @param $string
	 * @returns {string}
	 */
	ucfirst: function($string)
	{
		return $string.charAt(0).toUpperCase() + $string.slice(1);
	},
	/**
	 *
	 * @param array
	 * @returns {*}
	 */
	unique: function(array){
		return array.filter(function(el, index, arr) {
			return index == arr.indexOf(el);
		});
	},
	/**
	 *
	 */
	notify: {
		show: function (code, message){
			var icon ="";
			if(code=="8100"){
				icon = '<i class="material-icons red-text iconleft-to-text">warning</i>';
			}else if(code=="200" || code=="2000"){
				icon = '<i class="material-icons green-text iconleft-to-text">thumb_up</i>';
			}else{
				icon = '<i class="material-icons  yellow-text normal iconleft-to-text">info</i>';
			}
			if(typeof code == "object"){
				message = code;
			}

			var text = "";
			var desc = "";
			if(typeof message == "object"){
				text = message.message;
				desc = message.description;
			}else if (typeof message != "undefined"){
				text = message
			}else{
				text = code;
			}

			$("#mainNotify").remove();
			var content = "";

			content += '<div id="mainNotify" style="display: none" class="lighten-3 marg-v0">';
			content += '    <div class="container">';
			content += '        <div class="col-xs-11 pad-v15">';
			content += '            <div class="col-xs-12 text-notify">';
			content += icon + text;
			content += '            </div>';
			if(desc != ""){
				content += '        <div class="col-xs-12 text-notify marg-left-40">';
				content += '            <span class="grey">'+desc+'</span>';
				content += '        </div>';
			}
			content += '        </div>';
			content += '        <div class="col-xs-1 pad-v10">';
			content += '            <a href="javascript:void(0)" onclick="func.notify.close()" class="close-notify right">';
			content += '                <i class="grey-text material-icons pad-v5">close</i>';
			content += '            </a>';
			content += '        </div>';
			content += '    </div>';
			content += '</div>';

			$("main").prepend(content);
			$("#mainNotify").fadeIn(250);
			setTimeout(function(){$("#mainNotify").fadeOut(600);},10000);
		},

		close: function (){
			$("#mainNotify").fadeOut(100, function(){
				$("#mainNotify").remove();
			});
		}
	},
	/**
	 *
	 * @param $container
	 * @returns {boolean}
	 */
	checkError: function($container)
	{
		var err = false;
		var errText = [];
		$('.check-input:not(.ignored-input)', $container).each(function (i, input)
		{
			var selectorForm = $(".error-message[data-from='" + ($(input).data('error')) + "']", $container);
			/* скрываем ошибки */
			$(input).removeClass('error');
			selectorForm.slideUp(100);

			/* если пустой - обрабатываем ошибки */
			if ($(input).val().trim().length === 0) {
				$(input).addClass('error');
				selectorForm.slideDown(200);

				if(!func.in_array(selectorForm.text(),errText))
					errText.push(selectorForm.text());
				err = true;
			}

			if(err){
				func.notify.show(errText.join("<br/>"));
			}
		});
		return err;
	},
//preloader
	preloader: {
		input: {
			_selector: '.input-preload-block',

			show: function(block)
			{
				if(func.is_array(block))
				{
					for(var key in block)
						this.show(block[key]);
					return false;
				}

				if(false == func.is_object(block))
					block = $(block);

				if(func.jempty($(block).find('>' + this._selector)))
				{
					if($(block).height() >= 100)
					{
						var loaderImg = $('body').hasClass('svetlana-class') ? '-s' : '';

						var content =
							'<div class="input-preload-block">' +
								'<div class="loader">' +
									'<div class="element-animation">' +
										'<img src="/assets/build/images/loader'+loaderImg+'.png" width="1180" height="70">' +
									'</div>' +
								'</div>' +
							'</div>';

						$(block).prepend(content);
					}
					else
						func.preloader.circle.show(block, true);
				}
			},
			hide: function(block)
			{
				if(func.empty(block))
				{
					$(this._selector).remove();
					return true;
				}

				if(func.is_array(block))
				{
					for(var key in block)
						this.hide(block[key]);
					return false;
				}

				if(false == func.is_object(block))
					block = $(block);


				$(block).find(this._selector).remove();
				func.preloader.circle.hide(block);
			}
		},
		isPreloaded: function()
		{
			return false == func.jempty(this.input._selector);
		},
		progress: {
			show: function($block, $needBottom)
			{
				var content = '';
				$('#progressBar').remove();
				if(Boolean($needBottom))
					content+='<div class="progress progressBar-bottom" id="progressBar">';
				else
					content+='<div class="progress" id="progressBar">';

				content+='<div class="indeterminate"></div>';
				content+='</div>';
				$($block).append(content);
			},
			hide: function()
			{
				$("#progressBar").fadeOut(100, function()
				{
					$(this).remove();
				});
			}
		},
		circle: {
			show: function(block,center){
				if($(block).find('.hiddenContent').length <= 0) {
					$(block).addClass("preloaderShow");

					var content = "";
					content += '<div class="hiddenContent"></div>';
					if (center)
						content += '<div class="preloader-wrapper active centerPreloader">';
					else
						content += '<div class="preloader-wrapper active">';

					content += '  <div class="spinner-layer spinner-red-only">';
					content += '      <div class="circle-clipper left">';
					content += '          <div class="circle"></div>';
					content += '      </div>';
					content += '      <div class="gap-patch">';
					content += '          <div class="circle"></div>';
					content += '      </div>';
					content += '      <div class="circle-clipper right">';
					content += '          <div class="circle"></div>';
					content += '      </div>';
					content += '  </div>';
					content += '</div>';
					$(block).prepend(content);
				}
			},
			hide: function(block)
			{
				if(!func.empty(block))
				{
					$(block).find(".preloader-wrapper").remove();
					$(block).find(".hiddenContent").remove();
					$(block).removeClass("preloaderShow");
				}
				else
				{
					$("body").find(".preloader-wrapper").fadeOut(100, function()
					{
						$(this).parents(".preloaderShow").removeClass("preloaderShow");
						$(this).remove();
						$(".hiddenContent").remove();
					});
				}
			}
		}
	},
	/**
	 *
	 * @param ms
	 */
	sleep: function(ms)
	{
		ms += new Date().getTime();
		while (new Date() < ms){}
	},
	/**
	 * Makes an array of one-dimension key-pair object's values
	 *
	 * @param $object
	 * @returns {Array}
	 */
	values: function($object)
	{
		if(Object.hasOwnProperty('values'))
			return Object.values($object);

		var _result = [];
		if(this.is_object($object))
			for(var k in $object)
				_result.push($object[k]);

		return _result;
	}
};

/**
 * GLOBAL FUNCTIONS
 */

var
	empty =
		function($variable, $debug)
		{
			return func.empty($variable, $debug);
		},

	end =
		function($object)
		{
			return func.end($object);
		},

	error =
		function($message)
		{
			console.error($message);
		},

	exists =
		function($variable)
		{
			return func.exists($variable);
		},

	in_array =
		function($needle, $haystack)
		{
			return func.in_array($needle, $haystack);
		},

	is_array =
		function($variable)
		{
			return func.is_array($variable);
		},

	is_bool =
		function($variable)
		{
			return func.is_bool($variable);
		},

	is_function =
		function($variable)
		{
			return func.is_function($variable);
		},

	is_guid =
		function($string)
		{
			return func.is_guid($string);
		},

	is_string =
		function($variable)
		{
			return func.is_string($variable);
		},

	is_object =
		function($variable)
		{
			return func.is_object($variable);
		},

	isset =
		function($variable)
		{
			return func.isset($variable);
		},

	jempty =
		function($jQueryObj)
		{
			return func.jempty($jQueryObj);
		},

	jexists =
		function($jQueryObj)
		{
			return func.jexists($jQueryObj);
		},

	key =
		function($variable)
		{
			return func.key($variable);
		},

	log =
		function($message)
		{
			console.log($message);
		},

	reset =
		function($object)
		{
			return func.reset($object);
		},

	strval =
		function($string)
		{
			return func.strval($string);
		},

	ucfirst =
		function($string)
		{
			return func.ucfirst($string);
		},

	values =
		function($object)
		{
			return func.values($object);
		},

	warn =
		function($message)
		{
			console.warn($message);
		};