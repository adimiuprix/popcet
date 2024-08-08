<?php
use Carbon\Carbon;

if (!function_exists('hmn_time')) {
    function hmn_time($unixtime)
    {
        $carbonDate = Carbon::createFromTimestamp($unixtime, env('TIME_ZONE'));
        $humanTime = $carbonDate->diffForHumans();

        return $humanTime;
    }
}
