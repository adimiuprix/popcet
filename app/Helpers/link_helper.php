<?php

if (!function_exists('link_to')) {
    function link_to(string $redirect)
    {
        return base_url($redirect);
    }
}
