<?php
use App\Models\SettingModel;

if (!function_exists('sitename')) {
    function sitename() {
        $setting = (new SettingModel())->first();
        $sitename = $setting['sitename'];
        return $sitename;
    }
}
