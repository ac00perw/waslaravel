<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use Auth;
use Carbon;
use Log;
use DB;

class Helper
{
    public static function shout(string $string)
    {
        return strtoupper($string);
    }

    public static function tz(Carbon\Carbon $date, $format = "m/d/Y g:i a", $timezone='America/New_York')
    {
		if (Auth::check() ){
            $timezone = Auth::user()->timezone;     
            Log::info('Using user timezone: '.Auth::user()->timezone);       

        }

        return $date->setTimezone($timezone)->format($format);
    }

    public static function parseCost($amount){

    	return sprintf("$ %s", $amount);
    }

    public static function getRandomQuote(){
        $quote = DB::table('quotes')
            ->inRandomOrder()
            ->first();

            return sprintf("<blockquote>%s<br />- %s</blockquote>", $quote->quote, $quote->author);
    }


    /**
     * Function to return date as "Starts in x days" or 'x days remaining' 
     */

}