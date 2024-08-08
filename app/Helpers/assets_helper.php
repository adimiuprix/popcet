<?php

if (!function_exists('assets')) {
    function assets(string $file)
    {
        return base_url($file);
    }
}
