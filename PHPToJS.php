<?php
namespace rOpenDev\PHPToJS;

/**
 * PHPToJS
 * PHPToJS's class convert php variable's content to js variable's content preserving javascript expression (like function)
 * This class is perfect if you were limited by php function `json_encode`, json's validity and/or `JSON.parse` when you have a function.
 *
 * @author     Robin <contact@robin-d.fr> http://www.robin-d.fr/
 * @link       https://github.com/RobinDev/curlRequest
 * @since      File available since Release 2014.10.12
 */
class PHPToJS
{

	/**
	 * Render the variable's content from PHP to Javascript
	 *
	 * @param	mixed	$mixed
	 *
	 * @return 	string	Javascript code
	 */
    public static function render($mixed)
    {

		if (!is_array($mixed)&&!is_object($mixed)) {
			return strpos(str_replace(' ', '', $mixed), 'function(') === 0 ? $mixed : json_encode($mixed);
		}

		$isNumArr = array_keys((array) $mixed) === range(0, count((array) $mixed) - 1);
		$isObject = is_object($mixed) || !$isNumArr;

		$r = array();
		$i=0;
		foreach($mixed as $k => $m) {
			if ($isObject) {
				$r[$i] = $k.': '.self::render($m);
			} elseif ($isNumArr) {
				$r[$i] = self::render($m);
			} else {
				$r[$i] = json_encode($k).': '.self::render($m);
			}
			++$i;
		}

		return  ($isObject?'{':'[').implode(',', $r).($isObject?'}':']');

    }

    public static function renderReadable($mixed)
    {

		if (!is_array($mixed)&&!is_object($mixed)) {
			return strpos(str_replace(' ', '', $mixed), 'function(') === 0 ? $mixed : json_encode($mixed);
		}

		$isNumArr = array_keys((array) $mixed) === range(0, count((array) $mixed) - 1);
		$isObject = is_object($mixed) || !$isNumArr;

		$r = array();
		$i=0;
		foreach($mixed as $k => $m) {
			if ($isObject) {
				$r[$i] = $k.': '.implode("\n\t", explode("\n", self::renderReadable($m)));
			} elseif ($isNumArr) {
				$r[$i] = implode("\n\t", explode("\n", self::renderReadable($m)));
			} else {
				$r[$i] = json_encode($k).': '.implode("\n\t", explode("\n", self::renderReadable($m)));
			}
			++$i;
		}

		return  ($isObject?'{':'[')."\n\t".implode(','."\n\t", $r)."\n".($isObject?'}':']');

    }

}
