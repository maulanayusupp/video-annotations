<?php

namespace App\Libraries;

use DateTime;

/**
* Global Helper
*/
class Helper
{
	function __construct()
	{
		# code...
	}

	// To Title Case
	public static function toTitleCase($text)
	{
		$text = str_replace('_', ' ', $text);
		$text = ucwords(strtolower($text));
		return $text;
	}

	public static function uploadErrorToMessage($code)
	{
		switch ($code) {
			case UPLOAD_ERR_INI_SIZE:
				// $message = "The uploaded file exceeds the upload_max_filesize directive in php.ini";
				$message = "The uploaded file size exceeds the max limit of 2GB";
				break;
			case UPLOAD_ERR_FORM_SIZE:
				// $message = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
				$message = "The uploaded file size exceeds the max limit";
				break;
			case UPLOAD_ERR_PARTIAL:
				$message = "The uploaded file was only partially uploaded";
				break;
			case UPLOAD_ERR_NO_FILE:
				$message = "No file was uploaded";
				break;
			case UPLOAD_ERR_NO_TMP_DIR:
				$message = "Missing a temporary folder";
				break;
			case UPLOAD_ERR_CANT_WRITE:
				$message = "Failed to write file to disk";
				break;
			case UPLOAD_ERR_EXTENSION:
				$message = "File upload stopped by extension";
				break;

			default:
				$message = "Unknown upload error";
				break;
		}
		return $message;
	}

	// Get Currency Symbol
	public static function getCurrencySymbol($currency = 'USD')
	{
		return ( isset(Helper::$CURRENCY_SYMBOLS[$currency]) ) ? Helper::$CURRENCY_SYMBOLS[$currency] : $currency;
	}

	// Version File
	public static function version($path)
	{
		return asset($path) . '?ver=' . filesize($path);
	}

	public static function elixir($file, $buildDirectory = 'build')
	{
		$env = config('app.env');
		$asset_url = '';
		if ($env === 'production') {
			try {
				$asset_url = asset('/public' . elixir($file, $buildDirectory));
			} catch (InvalidArgumentException $error) {
				$asset_url = asset('/public/' . $file);
			}

		} else {
			$asset_url = asset('/public/' . $file);
		}
		return $asset_url;
	}

	/* upload file */
	public static function uploadFile($file, $type, $path) 
	{
        $upload_file = $file;
        $extension = $upload_file->getClientOriginalExtension();
        $file_name = $upload_file->getClientOriginalName();
        $string_name = str_random(4) . strtolower($file_name);
        $picture_name = preg_replace("/[\s-]+/", "_", $string_name);
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'uploads/' . $type . '/'. $path .'/';
        $upload_file->move($destinationPath, $picture_name);
        $images_file = 'uploads/' . $type . '/' . $path . '/' . $picture_name;
        return $images_file;
	}
	
	/**
	 * Time Elapsed String
	 * 
	 * @param String $datetime
	 * @param Boolean $full
	 * 
	 * @return String $elapsed
	 * 
	 * @see https://stackoverflow.com/a/18602474/5627904
	 */
	public static function time_elapsed_string($datetime, $full = false) {
		$now = new DateTime;
		$ago = new DateTime($datetime);
		$diff = $now->diff($ago);

		$diff->w = floor($diff->d / 7);
		$diff->d -= $diff->w * 7;

		$string = array(
			'y' => 'year',
			'm' => 'month',
			'w' => 'week',
			'd' => 'day',
			'h' => 'hour',
			'i' => 'minute',
			's' => 'second',
		);
		foreach ($string as $k => &$v) {
			if ($diff->$k) {
				$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
			} else {
				unset($string[$k]);
			}
		}

		if (!$full) $string = array_slice($string, 0, 1);
		return $string ? implode(', ', $string) . ' ago' : 'just now';
	}

}
