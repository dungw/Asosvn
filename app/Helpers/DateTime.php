<?php namespace App\Helpers;

use App;

class DateTime
{
	public static function gmDate($time)
	{
		$dayEn = array(
			'Monday',
			'Tuesday',
			'Wednesday',
			'Thursday',
			'Friday',
			'Saturday',
			'Sunday'
		);
		$datVi = array (
			'Thứ hai',
			'Thứ ba',
			'Thứ tư',
			'Thứ năm',
			'Thứ sáu',
			'Thứ bảy',
			'Chủ nhật',
		);

		switch(App::getLocale()) {
			case 'en':
				$gmDate = gmdate('l, d/m/Y | h:i A', strtotime($time));
				break;
			case 'vi':
				$gmDate = gmdate('l, d/m/Y | h:i A', strtotime($time));
				$gmDate = str_replace( $dayEn, $datVi, $gmDate);
				break;
			default:

				break;
		}

		return $gmDate;
	}

}
